<?php

namespace App\Http\Controllers\SupportTeam; // અહીં SupportTeam ઉમેરવું જરૂરી છે

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
        public function index()
    {
        $books = DB::table('books')
            ->leftJoin('my_classes', 'books.my_class_id', '=', 'my_classes.id')
            ->select('books.*', 'my_classes.name as class_name')
            ->get();

        return view('pages.librarian.books.index', compact('books'));
    }

    // ૨. નવું પુસ્તક ઉમેરવા માટેનું ફોર્મ
 // BookController.php માં આ મેથડ અપડેટ કરો
public function create()
{
    // નવી બુક એડ કરવા માટે ક્લાસની જરૂર પડશે
    $my_classes = DB::table('my_classes')->get(); 

    // અહીં સાચો પાથ આપો (pages.librarian.books.create)
    return view('pages.librarian.books.create', compact('my_classes'));
}
    // ૩. ડેટાબેઝમાં બુક સેવ કરવા માટે
    public function store(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'total_copies' => 'required|integer',
        ]);

        $data = $req->except('_token');
        $data['created_at'] = now();
        $data['updated_at'] = now();

        DB::table('books')->insert($data);

        return redirect()->route('books.index')->with('flash_success', 'Book Created Successfully');
    }
    // સ્ટુડન્ટ માટે: લાઈબ્રેરીની બધી બુક્સ જોવા માટે
public function student_index()
{
    $books = DB::table('books')->get();
    return view('pages.student.books.index', compact('books'));
}

// સ્ટુડન્ટ માટે: પોતાની ઈશ્યૂ થયેલી બુક્સ જોવા માટે
public function my_books()
{
    $my_id = auth()->user()->id;
    $requests = DB::table('book_requests')
        ->join('books', 'book_requests.book_id', '=', 'books.id')
        ->where('book_requests.user_id', $my_id)
        ->select('book_requests.*', 'books.name as book_name', 'books.author')
        ->orderBy('book_requests.created_at', 'desc')
        ->get();

    return view('pages.student.books.my_books', compact('requests'));
}
public function edit($id)
{
    // બુકનો ડેટા લાવો
    $book = DB::table('books')->where('id', $id)->first();
    
    if (!$book) {
        return back()->with('flash_danger', 'Book not found!');
    }

    // ક્લાસનું લિસ્ટ લાવો (ડ્રોપડાઉન માટે)
    $my_classes = DB::table('my_classes')->get();

    return view('pages.librarian.books.edit', compact('book', 'my_classes'));
}
public function update(Request $req, $id)
{
    $req->validate([
        'name' => 'required',
        'total_copies' => 'required|integer',
    ]);

    $data = $req->except(['_token', '_method']);
    $data['updated_at'] = now();

    DB::table('books')->where('id', $id)->update($data);

    return redirect()->route('books.index')->with('flash_success', 'Book Updated Successfully');
}
public function destroy($id)
{
    // ૧. પહેલા ચેક કરો કે આ બુક અત્યારે કોઈ સ્ટુડન્ટ પાસે ઈશ્યૂ થયેલી તો નથી ને?
    $is_issued = DB::table('book_requests')
                    ->where('book_id', $id)
                    ->where('status', 'issued')
                    ->exists();

    if ($is_issued) {
        return back()->with('flash_danger', 'Cannot delete! This book is currently issued to a student.');
    }

    // ૨. જો ઈશ્યૂ ન હોય તો જ ડિલીટ કરો
    DB::table('books')->where('id', $id)->delete();

    return redirect()->route('books.index')->with('flash_success', 'Book Deleted Successfully');
}
}

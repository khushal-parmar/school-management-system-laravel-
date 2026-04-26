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
   public function create()
{
    // પેલા બધી જ બુક્સ લાવો ચેક કરવા માટે
    $books = DB::table('books')->get(); 
    
    // યુઝર ટાઈપ ચેક કરો (તમારા DB માં 'student' અથવા 'Student' હોઈ શકે)
    $students = DB::table('users')->where('user_type', 'student')->get();

    return view('pages.librarian.book_requests.create', compact('books', 'students'));
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
}

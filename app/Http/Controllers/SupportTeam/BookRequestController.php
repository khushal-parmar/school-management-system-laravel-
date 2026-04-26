<?php
 namespace App\Http\Controllers\SupportTeam;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use App\Helpers\Qs;

class BookRequestController extends Controller
{
    // બધી રિક્વેસ્ટ જોવા માટે
 public function index()
{
    // કોઈ JOIN વગર સીધો ડેટા લો
    $requests = DB::table('book_requests')->orderBy('id', 'desc')->get();
    return view('pages.librarian.book_requests.index', compact('requests'));
}
 public function return_book()
{
    // ડાયરેક્ટ રિક્વેસ્ટમાંથી ID લો
    $req_id = request('id');

    if (!$req_id) {
        return back()->with('flash_danger', 'Error: ID parameter is missing in URL.');
    }

    $bookRequest = DB::table('book_requests')->where('id', $req_id)->first();

    if ($bookRequest) {
        // ૧. Status Update
        DB::table('book_requests')->where('id', $req_id)->update([
            'status' => 'returned',
            'returned' => 1,
            'updated_at' => now()
        ]);

        // ૨. Stock Update
        DB::table('books')->where('id', $bookRequest->book_id)->decrement('issued_copies');

        return back()->with('flash_success', 'Book returned successfully for Request #' . $req_id);
    }

    return back()->with('flash_danger', "Error: No record found for ID #$req_id");
}
   // પુસ્તક ઈશ્યૂ કરવા માટેનું ફોર્મ (Direct Issue)
   public function create()
{
    // અહીં COALESCE વાપરવાથી જો issued_copies NULL હશે તો તેને 0 ગણશે
    $books = DB::table('books')
        ->whereRaw('total_copies > COALESCE(issued_copies, 0)')
        ->get();

    $students = DB::table('users')->where('user_type', 'student')->get();

    return view('pages.librarian.book_requests.create', compact('books', 'students'));
}
    // ડેટાબેઝમાં એન્ટ્રી કરવી
  public function store(Request $req)
{
    $req->validate([
        'book_id' => 'required',
        'user_id' => 'required',
        'start_date' => 'required',
        'end_date' => 'required',
    ]);

    // ૧. પહેલા ચેક કરો કે બુક અવેલેબલ છે કે નહીં
    $book = DB::table('books')->where('id', $req->book_id)->first();

    // જો issued_copies NULL હોય તો તેને 0 ગણો
    $current_issued = $book->issued_copies ?? 0;

    if ($book->total_copies > $current_issued) {
        
        // ૨. રિક્વેસ્ટ ટેબલમાં એન્ટ્રી કરો
        DB::table('book_requests')->insert([
            'book_id' => $req->book_id,
            'user_id' => $req->user_id,
            'start_date' => $req->start_date,
            'end_date' => $req->end_date,
            'status' => 'issued',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // ૩. Books ટેબલમાં issued_copies અપડેટ કરો
        // અહીં આપણે મેન્યુઅલી +1 કરીશું જેથી NULL નો પ્રોબ્લેમ ન આવે
        DB::table('books')->where('id', $req->book_id)->update([
            'issued_copies' => $current_issued + 1,
            'updated_at' => now()
        ]);

        return redirect()->route('book_requests.index')->with('flash_success', 'Book Issued Successfully');
    }

    return back()->with('flash_danger', 'This book is out of stock!');
}
  
}


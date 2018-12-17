<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use Entrust ;

class GuestController extends Controller
{
    
    public function index(){
    	// $books = Book::with('authors');
    	$no = 1;
    	 $books = Book::all();
    	// $books = \DB::table('books')
     //        ->join('borrow_logs', 'borrow_logs.book_id', '=', 'books.id')
     //        ->where('borrow_logs.book_id', '=' ,null)
     //        ->get();
    	return view('guest.index' ,compact('books', 'no'));


    }
}

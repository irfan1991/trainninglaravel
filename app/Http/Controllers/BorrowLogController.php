<?php

namespace App\Http\Controllers;

use App\BorrowLog;
use Illuminate\Http\Request;
use App\Book;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BorrowLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $no = 1;
        $books = \DB::table('borrow_logs')
            ->join('books', 'books.id', '=', 'borrow_logs.book_id')
            ->join('users', 'users.id', '=', 'borrow_logs.user_id')
            
            ->select('borrow_logs.id as id','borrow_logs.is_returned as is_returned','books.cover as cover','books.title as title','users.name as name', 'books.amount as amount' )
            // borrow_logs.is_returned as is_returned, books.cover as cover, books.title as title, users.name as name ')
            ->get();

        //var_dump($books);die();
        return view('borrow.index' ,compact('books', 'no'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BorrowLog  $borrowLog
     * @return \Illuminate\Http\Response
     */
    public function show(BorrowLog $borrowLog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BorrowLog  $borrowLog
     * @return \Illuminate\Http\Response
     */
    public function edit(BorrowLog $borrowLog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BorrowLog  $borrowLog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $borrowLog = BorrowLog::findOrFail($id);
        $borrowLog->is_returned = 1 ;
         return redirect('/borrow')->with('succes', 'Book Peminjaman data has been updated');
    }

    public function updateKembalian($id)
    {
                 
         try{
        $borrowLog = BorrowLog::findOrFail($id);
        $borrowLog->is_returned = 1 ;
        $borrowLog->save();

        $book = Book::findOrFail($borrowLog->book_id);
        $book->is_borrow = null ;
        $book->save();
            return redirect('/borrow')->with('succes', 'Buku Telah Dikembalikan ');

        } catch(ModelNotFoundException $e) {
            return redirect('/borrow')->with('succes', 'Data buku tidak ditemukan');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BorrowLog  $borrowLog
     * @return \Illuminate\Http\Response
     */
    public function destroy(BorrowLog $borrowLog)
    {
        //
    }
}

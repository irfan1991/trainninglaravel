<?php

namespace App\Http\Controllers;

use App\Book;
use App\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\BorrowLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        $no = 1;
    
        return view('book.index', compact('books','no'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('book.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         // mendefinisikan validasi
        $this->validate( $request, [
                'title' => 'required|unique:books,title',
                'author_id' => 'required|exists:authors,id',
                'amount' => 'required|numeric', 
                'cover' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048'

        ]);


        
        $books = Book::create($request->except('cover'));

        //isi field cover jika ada cover yang diupload
        if($request->hasFile('cover')){
            $uploaded_cover = $request->file('cover');

            //mengambil extension file
            $extension = $uploaded_cover->getClientOriginalExtension();

            //membuat nama file random dengan extension
            $filename = md5(time()).'.'.$extension;

            //memindahkan file ke folder public/img
            $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'img';
            $uploaded_cover->move($destinationPath, $filename);

            //mengisi field databse cover dengan filename yang dibuat
            $books->cover = $filename;
            $books->save();
        } else {
             
             // $books = new Book([
             //    'title' => $request->get('title'),
             //    'author_id' => $request->get('author_id'),
             //    'amount' => $request->get('amount'),
             //    ]);
              $books->save();
        }
       
     
        return redirect('/book')->with('succes', 'Book data has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::find($id);
        return view('book.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $book = Book::find($id);
        //jika tidak ada update
        if(!$book->update($request->all())) return redirect()->back();

        if($request->hasFile('cover')){
            $filename = null ;
            $uploaded_cover = $request->file('cover');
            $extension = $uploaded_cover->getClientOriginalExtension();

            // membuat nama file random dengan extension
            $filename = md5(time()) . '.' . $extension;
            $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'img';

            // memindahkan file ke folder public/img
            $uploaded_cover->move($destinationPath, $filename);

            // hapus cover lama, jika ada
            if ($book->cover) {
                $old_cover = $book->cover;
                $filepath = public_path() . DIRECTORY_SEPARATOR . 'img'
                    . DIRECTORY_SEPARATOR . $book->cover;

                try {
                    File::delete($filepath);
                } catch (FileNotFoundException $e) {
                    // File sudah dihapus/tidak ada
                }
            }

            // ganti field cover dengan cover yang baru
            $book->cover = $filename;
            $book->save();
        }

         return redirect('/book')->with('succes', 'Book data has been updated');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);
        $cover = $book->cover;
        if(!$book->delete()) return redirect()->back();

        // hapus cover lama, jika ada
        if ($cover) {
            $old_cover = $book->cover;
            $filepath = public_path() . DIRECTORY_SEPARATOR . 'img'
                . DIRECTORY_SEPARATOR . $book->cover;

            try {
                File::delete($filepath);
            } catch (FileNotFoundException $e) {
                // File sudah dihapus/tidak ada
            }
        }

        return redirect('/book')->with('succes', 'Book data has been deleted');

    }

    public function borrow($id){
        try{
            $book = Book::findOrFail($id);
            BorrowLog::create([
                'user_id' => Auth::user()->id,
                'book_id' => $id
            ]);

            $book->is_borrow = $id ;
            $book->save();

            return redirect('/')->with('succes', 'Berhasil Meminjam '.$book->title);
        } catch(ModelNotFoundException $e) {
            return redirect('/')->with('succes', 'Data buku tidak ditemukan');
        }
    }
}

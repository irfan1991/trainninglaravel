<?php

use Illuminate\Database\Seeder;
use App\Author;
use App\Book;
use App\BorrowLog;
use App\User;
class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //sample penulis
    	$author1 = Author::create(['name'=>'Rakyan Dwi Ardiyanto']);
    	$author2 = Author::create(['name'=>'Iqbal Syantiq']);
    	$author3 = Author::create(['name'=>'Mirly Wibowo']);
    	$author4 = Author::create(['name'=>'Nanda Septiani']);

    	// sample book 
    	$book1 = Book::create(['title'=>'Kupinang Kau di Tiang Listrik', 'amount'=>3, 'author_id'=>$author1->id]);
    	$book2 = Book::create(['title'=>'Azab Selfie Pagi Hari', 'amount'=>2, 'author_id'=>$author2->id]);
    	$book3 = Book::create(['title'=>'Beranak Dalam Buah Nangka', 'amount'=>4, 'author_id'=>$author3->id]);
    	$book4 = Book::create(['title'=>'Si Kambing Tangvan', 'amount'=>5, 'author_id'=>$author4->id]);

        //Sampel data peminjaman buku
    $member = User::where('email','member@gmail.com')->first();

    BorrowLog::create(['user_id' => $member->id, 'book_id' => $book1->id , 'is_returned' => 0]);
    BorrowLog::create(['user_id' => $member->id, 'book_id' => $book2->id , 'is_returned' => 0]);
    BorrowLog::create(['user_id' => $member->id, 'book_id' => $book3->id , 'is_returned' => 1]);

    }
}

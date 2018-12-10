<?php

use Illuminate\Database\Seeder;
use App\Author;
use App\Book;

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



    }
}

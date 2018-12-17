<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/test', function () {
    return view('test');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>['auth', 'role:admin']], function(){
Route::resource('/book', 'BookController');
Route::resource('/author', 'AuthorController');
Route::resource('/user', 'UserController') ;
Route::resource('/borrow', 'BorrowLogController') ;
Route::get('kembalian/{borrow}', 'BorrowLogController@updateKembalian')->name('borrow.kembalian');

});

Route::get('/', 'GuestController@index')->name('guest');
Route::get('book/{book}/borrow',
	['middleware' =>['auth', 'role:member'],
	'as' => 'book.borrow',
	'uses' => 'BookController@borrow'
	]);

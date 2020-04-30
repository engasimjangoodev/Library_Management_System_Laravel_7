<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/','BookController@index');

Route::get('/show_books','BookController@load_books_ajax_call')->name('load_books_ajax_call');
Route::post('/load_dropdown_lists','BookController@load_dropdown_lists')->name('load_dropdown_lists');
Route::post('/create','BookController@create')->name('create');
Route::get('/creat_respos_val','BookController@creat_respos_val')->name('creat_respos_val');
Route::Post('/book_edit','BookController@edit')->name('book_edit');
Route::post('/book_update','BookController@update')->name('book_update');
Route::POST('/book_destroy','BookController@destroy')->name('book_destroy');


//Book_Issue
Route::get('/issue_book','Book_IssueController@index')->name('issue_book');
Route::post('/get_Book_Members_List','Book_IssueController@get_Book_Members_List')->name('get_Book_Members_List');
Route::Post('/get_Members_data_By_ID','Book_IssueController@get_Members_data_By_ID')->name('get_Members_data_By_ID');
Route::get('/save','Book_IssueController@save')->name('save');




Route::get('/book', 'BookController@index')->name('book.index');
Route::get('/add_book_page', 'BookController@add_book_page')->name('add_book_page');
//Route::Post('/bookdata', 'BookController@book_data')->name('bookdata');
//Route::resource("books" ,'BookController');







Route::get('/product', 'ProductController@index')->name('product.index');



Route::get('/ajax_upload', 'AjaxUploadController@index');

Route::post('/ajax_upload/action', 'AjaxUploadController@action')->name('ajaxupload.action');


Route::get('photo', 'ImageController@index');
Route::post('photo', 'ImageController@save');

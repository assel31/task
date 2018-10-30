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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/language/{lang}', 'HomeController@setLanguage')->name('language');
Route::post('/invoices', 'InvoiceController@create')->name('invoices');
Route::post('/invoices/{id}', 'InvoiceController@update')->name('update.invoice');
Route::post('/invoices/{id}/remove', 'InvoiceController@remove')->name('remove.invoice');

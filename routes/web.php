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
Route::get('/','HomeController@index');
Route::get('add-form','HomeController@addForm')->name('add-form');
Route::get('update-form/{id}/{status}','HomeController@updateForm')->name('update-form');
Route::post('save-form','HomeController@saveForm')->name('save-form');

// Messages
Route::get('/messages','MessageController@index')->name('message');

Route::get('/admin/user','AdminController@viewUser')->name('admin-list-user');
Route::get('/admin/user/{id}/{active}','AdminController@updateUserStatus')->name('admin-update-user-status');

// Admin Messages
Route::get('/admin/messages','MessageController@add')->name('add-message');
Route::post('/admin/messages','MessageController@insert')->name('insert-message');
Route::get('/admin/messages/{id}','MessageController@delete')->name('delete-message');
Auth::routes();
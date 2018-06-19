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
Route::get('/','HomeController@index')->name('home');
Route::get('add-form','HomeController@addForm')->name('add-form');
Route::get('detail-form/{id}','HomeController@detailForm')->name('detail-form');
Route::get('accept-form/{id}/{status}','HomeController@acceptForm')->name('accept-form');
Route::post('update-accept-form/{id}/{status}','HomeController@updateAcceptForm')->name('update-accept-form');
Route::get('update-reject-form/{id}/{status}','HomeController@updateRejectForm')->name('update-reject-form');
Route::post('save-form','HomeController@saveForm')->name('save-form');

// Edit Profile
Route::get('profile/{id}','HomeController@detailProfile')->name('detail-profile');
Route::get('edit-profile/{id}','HomeController@editProfile')->name('edit-profile');
Route::post('profile/{id}','HomeController@updateProfile')->name('update-profile');

// Form Pengunduran Diri
Route::get('add-pengunduran-diri-form','FormPengunduranDiriController@addForm')->name('add-pengunduran-diri-form');
Route::get('detail-pengunduran-diri-form/{id}','FormPengunduranDiriController@detailForm')->name('detail-pengunduran-diri-form');
Route::post('save-pengunduran-diri-form','FormPengunduranDiriController@saveForm')->name('save-pengunduran-diri-form');

// Messages
Route::get('/messages','MessageController@index')->name('message');

Route::get('/admin/user','AdminController@viewUser')->name('admin-list-user');
Route::get('/admin/user/{id}/{active}','AdminController@updateUserStatus')->name('admin-update-user-status');

// Admin Messages
Route::get('/admin/messages','MessageController@add')->name('add-message');
Route::post('/admin/messages','MessageController@insert')->name('insert-message');
Route::get('/admin/messages/{id}','MessageController@delete')->name('delete-message');
Auth::routes();
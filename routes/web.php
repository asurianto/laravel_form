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
Route::get('history-form','HomeController@historyForm')->name('history-form');

Route::get('accept-form/{id}/{status}/{type_form}','HomeController@acceptForm')->name('accept-form');
Route::post('update-accept-form/{id}/{status}/{type_form}','HomeController@updateAcceptForm')->name('update-accept-form');
Route::get('update-reject-form/{id}/{status}/{type_form}','HomeController@updateRejectForm')->name('update-reject-form');
Route::get('report-peminjaman-form','HomeController@excelReportPeminjamanForm')->name('report-peminjaman-form');
Route::post('save-form','HomeController@saveForm')->name('save-form');

// Edit Profile
Route::get('profile/{id}','HomeController@detailProfile')->name('detail-profile');
Route::get('edit-profile/{id}','HomeController@editProfile')->name('edit-profile');
Route::post('profile/{id}','HomeController@updateProfile')->name('update-profile');

// Form Pengunduran Diri
Route::get('add-pengunduran-diri-form','FormPengunduranDiriController@addForm')->name('add-pengunduran-diri-form');
Route::get('detail-pengunduran-diri-form/{id}','FormPengunduranDiriController@detailForm')->name('detail-pengunduran-diri-form');
Route::post('save-pengunduran-diri-form','FormPengunduranDiriController@saveForm')->name('save-pengunduran-diri-form');

// Simpanan 
Route::get('list-simpanan','SimpananController@index')->name('list-simpanan');
Route::get('add-simpanan','SimpananController@add')->name('add-simpanan');
Route::get('edit-simpanan/{id}','SimpananController@edit')->name('edit-simpanan');
Route::post('save-simpanan','SimpananController@save')->name('save-simpanan');
Route::post('update-simpanan/{id}','SimpananController@update')->name('update-simpanan');

// Messages
Route::get('/messages','MessageController@index')->name('message');

Route::get('/admin/user','AdminController@viewUser')->name('admin-list-user');
Route::get('/admin/user-status/{id}/{active}','AdminController@updateUserStatus')->name('admin-update-user-status');
Route::get('/admin/user-role/{id}/{role_id}','AdminController@updateUserRole')->name('admin-update-user-role');

// Admin Messages
Route::get('/admin/messages','MessageController@add')->name('add-message');
Route::post('/admin/messages','MessageController@insert')->name('insert-message');
Route::get('/admin/messages/{id}','MessageController@delete')->name('delete-message');


// Admin Banner
Route::get('/admin/banner','AdminController@indexBanner')->name('admin-list-banner');
Route::get('/admin/add-banner','AdminController@addBanner')->name('admin-add-banner');
Route::post('/admin/banner','AdminController@insertBanner')->name('admin-insert-banner');
Route::get('/admin/edit-banner/{id}','AdminController@editBanner')->name('admin-edit-banner');
Route::post('/admin/banner/{id}','AdminController@updateBanner')->name('admin-update-banner');
Route::get('/admin/banner/{id}','AdminController@deleteBanner')->name('admin-delete-banner');

Auth::routes();
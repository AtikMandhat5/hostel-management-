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
Route::get('/','LoginController@index');
Route::post('/login','LoginController@login')->name('login');
Route::get('/dashboard','DashboardController@index')->name('dashboard');
Route::get('/logout','DashboardController@logout')->name('logout');


//userss
Route::get('/view_user','UsersController@index')->name('view_users');
Route::get('/view_user/add_user','UsersController@add_user')->name('add_user');
Route::post('/view_user/save_user','UsersController@save_user')->name('save_user');
Route::get('/view_user/edit_user/{id}','UsersController@edit_user')->name('edit_user');
Route::post('/view_user/update_user','UsersController@update_user')->name('update_user');
Route::post('/view_user/delete_user','UsersController@delete_user')->name('delete_user');

//check in out
Route::get('/view_checkinout','Checkinout@index')->name('view_checkinouts');
Route::get('/view_checkinout/add_checkinout','Checkinout@add_checkinout')->name('add_checkinout');
Route::post('/view_checkinout/save_checkinout','Checkinout@save_checkinout')->name('save_checkinout');
Route::get('/view_checkinout/edit_checkinout/{id}','Checkinout@edit_checkinout')->name('edit_checkinout');
Route::post('/view_checkinout/update_checkinout','Checkinout@update_checkinout')->name('update_checkinout');
Route::post('/view_checkinout/delete_checkinout','Checkinout@delete_checkinout')->name('delete_checkinout');
Route::post('/view_checkinout/add_checkinout/get_detail','Checkinout@get_detail')->name('get_detail');

// productss 
// Route::get('products/view_products','ProductController@index')->name('view_products');
// Route::get('products/add_product','ProductController@add_product')->name('add_product');
// Route::post('products/save_product','ProductController@save_product')->name('save_product');

// Route::get('product/edit_product/{id}','ProductController@edit_product')->name('edit_product');
// Route::post('product/update_product','ProductController@update_product')->name('update_product');
// Route::post('delete_product','ProductController@delete_product')->name('delete_product');


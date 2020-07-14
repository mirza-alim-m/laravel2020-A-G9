<?php

use Illuminate\Support\Facades\Auth;
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

// use Illuminate\Routing\Route;

//admin
Route::get('/', 'HomeController@index');

// Route::get('/', function () {
//     return view('auth.login');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

//Buku
Route::resource('buku', 'BukuController');

//Member
Route::resource('member', 'MemberController');

//Peminjam

Route::resource('peminjaman', 'PeminjamanController');

//Category

Route::resource('category', 'CategoryController');

Route::get('change-password', 'ChangePasswordController@index')->name('change');
Route::post('change-password', 'ChangePasswordController@store')->name('change.password');

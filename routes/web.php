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

// use Illuminate\Routing\Route;

//Buku
Route::get('/', function () {
    return view('buku.layout');
});
Route::resource('buku', 'SiswaController');

//Member
Route::get('/', function () {
    return view('member.layout');
});
Route::resource('member', 'MemberController');

//Peminjam
Route::get('/', function () {
    return view('peminjaman.layout');
});
Route::resource('peminjaman', 'PeminjamanController');

//Category
Route::get('/', function () {
    return view('category.layout');
});
Route::resource('category', 'CategoryController');

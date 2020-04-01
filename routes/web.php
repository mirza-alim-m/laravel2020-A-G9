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

<<<<<<< HEAD
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
=======
Route::get('/', function () {
    return view('buku.layout');
});

Route::resource('buku', 'SiswaController');

Route::get('/', function () {
    return view('member.layout');
});

Route::resource('member', 'MemberController');
>>>>>>> f337601f1e8c7590cda0e88e3312c9426c02b689


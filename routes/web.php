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

Route::get('/', function () {
    return view('admin/layout/index');
});
Route::get('/kategori', function () {
    return view('admin/kategori/index');
});
Route::get('/produk', function () {
    return view('admin/produk/index');
});

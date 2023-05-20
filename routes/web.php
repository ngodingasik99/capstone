<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
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

// Route::get('/', function () {
//     return view('admin/layout/index');
// });
Route::get('/',function(){
    return redirect('/login');
});

Route::middleware(['guest'])->group(function () {
Route::get('/kategori', [CategoryController::class, 'index']);
Route::post('/kategori/store', [CategoryController::class, 'store']);
Route::put('/kategori/{id}', [CategoryController::class, 'action']);
Route::get('/kategori/{id}', [CategoryController::class, 'destroy']);

Route::get('/produk', [ProductController::class, 'index']);
Route::post('/produk/store', [ProductController::class, 'store']);
Route::put('/produk/{id}', [ProductController::class, 'action']);
Route::get('/produk/{id}', [ProductController::class, 'destroy']);

Route::get('/', [SesiController::class, 'index']);
Route::post('/', [SesiController::class, 'login']);
});

// Route::get('/admin',[AdminController::class, 'index']);
// Route::get('/logout',[SesiController::class,'logout']);

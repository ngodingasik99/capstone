<?php

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AkunkasirController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

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

Route::middleware(['guest'])->group(function () {
    Route::get('/', [SesiController::class, 'index'])->name('login');
    Route::post('/', [SesiController::class, 'login']);
});

Route::get('/home', function(){
    return redirect('/admin');
});

Route::group(['middleware' => ['userAkses:admin', 'auth']], function () {
    Route::get('/admin',[AdminController::class, 'index'])->name('dashboard.admin');

    Route::get('/kategori', [CategoryController::class, 'index']);
    Route::post('/kategori/store', [CategoryController::class, 'store']);
    Route::put('/kategori/{id}', [CategoryController::class, 'action']);
    Route::get('/kategori/{id}', [CategoryController::class, 'destroy']);

    Route::get('/produk', [ProductController::class, 'index']);
    Route::post('/produk/store', [ProductController::class, 'store']);
    Route::put('/produk/{id}', [ProductController::class, 'action']);
    Route::get('/produk/{id}', [ProductController::class, 'destroy']);

    //kelola akun
    Route::get('/akun', [AccountController::class, 'index']);
    Route::post('/akun/store', [AccountController::class, 'store']); 
    Route::put('/akun/{id}', [AccountController::class, 'update']);
    Route::get('/akun/{id}', [AccountController::class, 'destroy']);
    
    //manajemen modal








});

Route::group(['middleware' => ['userAkses:kasir', 'auth']], function () {
    Route::get('/kasir',[KasirController::class, 'index'])->name('dashboard.kasir');
    Route::get('/kasir/transaction',[KasirController::class, 'transaction'])->name('transaction.kasir');
    Route::get('/kasir/listtansaction',[KasirController::class, 'listtransaction'])->name('listtransaction.kasir');
});

Route::get('/logout',[SesiController::class,'logout'])->name('logout');

Route::get('/dashboard',[AdminController::class, 'dashboard'])->name('dashboard');


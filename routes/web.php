<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ManagefinancesController;
use App\Http\Controllers\PengeluaranAdminController;

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
    Route::get('/dashboard',[AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/kategori', [CategoryController::class, 'index']);
    Route::post('/kategori/store', [CategoryController::class, 'store']);
    Route::put('/kategori/{id}', [CategoryController::class, 'action']);
    Route::get('/kategori/{id}', [CategoryController::class, 'destroy']);
    //kelola produk
    Route::get('/produk', [ProductController::class, 'index']);
    Route::post('/produk/store', [ProductController::class, 'store']);
    Route::put('/produk/{id}', [ProductController::class, 'action']);
    Route::get('/produk/{id}', [ProductController::class, 'destroy']);
    //kelola akun
    Route::get('/akun', [AccountController::class, 'index']);
    Route::post('/akun/store', [AccountController::class, 'store']); 
    Route::put('/akun/{id}', [AccountController::class, 'update']);
    Route::get('/akun/{id}', [AccountController::class, 'destroy']);
    //Kelola keuangan
    Route::get('/kelolakeuangan', [ManagefinancesController::class, 'index']);
    Route::post('/kelolakeuangan/store', [ManagefinancesController::class, 'store']);
    Route::put('/kelolakeuangan/{id}', [ManagefinancesController::class, 'update']);
    Route::get('/kelolakeuangan/{id}', [ManagefinancesController::class, 'destroy']);
    //list transaksi admin
    Route::get('/transaksi', [TransactionController::class, 'index']);
    Route::get('/transaksi/detailtrasaction/{id}', [TransactionController::class, 'detailtrasaction']);
    //pengeluaran
    Route::get('/pengeluaran', [PengeluaranAdminController::class, 'index']);
});

Route::group(['middleware' => ['userAkses:kasir', 'auth']], function () {
    //transaksi
    Route::get('/kasir/transaction',[KasirController::class, 'transaction'])->name('transaction.kasir');
    Route::get('/kasir/listtansaction',[KasirController::class, 'listtransaction'])->name('listtransaction.kasir');
    Route::get('/kasir/detailtrasaction/{id}',[KasirController::class, 'detailtrasaction'])->name('detailtrasaction.kasir');
    //closing
    Route::post('/kasir/closing', [KasirController::class, 'closing']);
    //pengeluaran
    Route::get('/kasir/pengeluaran',[PengeluaranController::class, 'index']);
    Route::post('/kasir/pengeluaran/store', [PengeluaranController::class, 'store']);
    Route::get('/kasir/pengeluaran/{id}', [PengeluaranController::class, 'destroy']);
    Route::put('/kasir/pengeluaran/{id}', [PengeluaranController::class, 'update']);
    //add to cart
    Route::post('/add-to-cart/{id}', [KasirController::class, 'addtocart']);
    Route::get('/kasir/checkout', [KasirController::class, 'checkout'])->name('checkout.kasir');
    Route::get('/kasir/delete-cart/{id}', [KasirController::class, 'deletecart']);
});

Route::get('/logout',[SesiController::class,'logout'])->name('logout');


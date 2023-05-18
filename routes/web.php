<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\SesiController;
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
//     return view('layout/index');
// });
// Route::get('/layout/index-2', function () {
//     return view('layout/index-2');
// });

Route::middleware(['guest'])->group(function () {
    Route::get('/', [SesiController::class, 'index']);
    Route::post('/', [SesiController::class, 'login']);
});
Route::get('/home',function(){
    return redirect('/admin');
});


Route::get('/admin',[AdminController::class, 'index']);
Route::get('/logout',[SesiController::class,'logout']);

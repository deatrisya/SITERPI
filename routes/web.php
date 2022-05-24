<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\JenisSapiController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\RiwayatObatController;
use App\Http\Controllers\SapiController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UsersController;
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

// Route::get('/', function () {
//     return view('index');
// });

Auth::routes();

Route::group(['middleware' => 'auth'],function(){
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::resource('user', UsersController::class);
    Route::resource('pegawai',PegawaiController::class);
    Route::resource('jenisobat',ObatController::class);
    Route::resource('jenissapi',JenisSapiController::class);
    Route::resource('riwayatobat',RiwayatObatController::class);
    Route::resource('sapi',SapiController::class);
    Route::resource('transaksi',TransaksiController::class);
    Route::get('getTransaksi/{id}',[TransaksiController::class,'getPrice']);
});

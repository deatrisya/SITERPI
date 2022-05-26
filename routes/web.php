<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\JenisSapiController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PakanController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\RiwayatObatController;
use App\Http\Controllers\RiwayatPakanController;
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
    Route::resource('jenispakan',PakanController::class);
    Route::resource('jenissapi',JenisSapiController::class);
    Route::resource('riwayatobat',RiwayatObatController::class);
    Route::resource('riwayatpakan',RiwayatPakanController::class);
    Route::resource('sapi',SapiController::class);
    Route::resource('transaksi',TransaksiController::class);
    Route::resource('keuangan',KeuanganController::class);
    Route::get('keuangans/cetak_pdf', [KeuanganController::class, 'cetak_pdf'])->name('keuangan_pdf');
    Route::get('getTransaksi/{id}',[TransaksiController::class,'getPrice']);
    Route::get('/jenisSapi/cetak_pdf', [JenisSapiController::class, 'cetak_pdf'])->name('jenisSapi_pdf');;
    Route::get('users/cetak_pdf',[UsersController::class,'cetak_pdf'])->name('user.cetak_pdf');
    Route::get('/sapis/cetak_pdf', [SapiController::class, 'cetak_pdf'])->name('sapi.sapi_pdf');
    Route::get('/transaksis/cetak_pdf', [TransaksiController::class, 'cetak_pdf'])->name('transaksi.transaksi_pdf');
});

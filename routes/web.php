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

    //cetak
    Route::get('keuangans/cetak_pdf', [KeuanganController::class, 'cetak_pdf'])->name('keuangan_pdf');
    Route::get('/jenisSapi/cetak_pdf', [JenisSapiController::class, 'cetak_pdf'])->name('jenisSapi_pdf');;
    Route::get('users/cetak_pdf',[UsersController::class,'cetak_pdf'])->name('user.cetak_pdf');
    Route::get('/sapis/cetak_pdf', [SapiController::class, 'cetak_pdf'])->name('sapi.sapi_pdf');
    Route::get('/transaksis/cetak_pdf', [TransaksiController::class, 'cetak_pdf'])->name('transaksi.transaksi_pdf');
    Route::get('pegawais/cetak_pdf',[PegawaiController::class,'cetak_pdf'])->name('pegawai.cetak_pdf');
    Route::get('jenispakans/cetak_pdf',[PakanController::class,'cetak_pdf'])->name('jenispakan.cetak_pdf');
    Route::get('riwayatpakans/cetak_pdf',[RiwayatPakanController::class,'cetak_pdf'])->name('riwayatpakan.cetak_pdf');
    Route::get('jenisobats/cetak_pdf',[ObatController::class,'cetak_pdf'])->name('jenisobat.cetak_pdf');
    Route::get('riwayatobats/cetak_pdf',[RiwayatObatController::class,'cetak_pdf'])->name('riwayatobat.cetak_pdf');

    //ajax
    Route::get('getTransaksi/{id}',[TransaksiController::class,'getPrice']);
    Route::get('getRiwayatPakan/{id}',[RiwayatPakanController::class,'getHarga']);
    Route::get('getRiwayatObat/{id}',[RiwayatObatController::class,'getHarga']);


});

<?php

namespace App\Http\Controllers;

use App\Models\Jenis_Sapi;
use App\Models\Keuangan;
use App\Models\Pegawai;
use App\Models\Sapi;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $today = Carbon::now()->format('l');
        $date = Carbon::now()->format("d F, Y");

        $pengeluaran = Keuangan::sum('keluar');
        $transaksi = Transaksi::where('status_transaksi', 'Jual')->sum('harga');
        $laba = $transaksi - $pengeluaran;
        $pegawai = Pegawai::count();


        $month = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'];

        foreach ($month as $key => $value) {
            $keuanganMasuk[] = Keuangan::whereMonth('created_at', '=', $value)->sum('masuk');
            $keuanganKeluar[] = Keuangan::whereMonth('created_at', '=', $value)->sum('keluar');
        }

        $jenisSapi = [];
        $dataJenis = Jenis_Sapi::all();
        foreach ($dataJenis as $key => $value) {
            $dataSapi = Sapi::where('jenissapi_id', $value->id)->where('status','Belum Terjual')->count();
            array_push($jenisSapi,$dataSapi);
        }
        // dd($jenisSapi);
        $data = [
            'pengeluaran' => $pengeluaran,
            'transaksi' => $transaksi,
            'laba' => $laba,
            'pegawai' => $pegawai,
            'keuanganMasuk' => json_encode($keuanganMasuk, JSON_NUMERIC_CHECK),
            'keuanganKeluar' => json_encode($keuanganKeluar, JSON_NUMERIC_CHECK),
            'date' => $date,
            'today' => $today,
            'jenisSapi' => json_encode($jenisSapi, JSON_NUMERIC_CHECK),
            'labelSapi' => Jenis_Sapi::pluck('jenis_sapi')->toArray(),
        ];

        // dd($data);÷

        return view(
            'index',

            $data
        );
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Keuangan;
use App\Models\Obat;
use App\Models\Riwayat_Obat;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class RiwayatObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pagination = 5;
        $riwayatobat = Riwayat_Obat::when($request->keyword, function($query) use ($request){
            $query
            ->where('isi','like',"%{$request->keyword}%")
            ->orWhere('status','like',"%{$request->keyword}%")
            ->orWhere('jumlah_unit','like',"%{$request->keyword}%")
            ->orWhere('harga_satuan','like',"%{$request->keyword}%")
            ->orWhere('total_harga','like',"%{$request->keyword}%")
            ->orWhereHas('obat',function(Builder $obat) use ($request){
                $obat->where('nama_obat','like',"%{$request->keyword}%");
            });
        })->orderBy('id')
        ->paginate($pagination);

        return view('obat.riwayatObatIndex',compact('riwayatobat'))
            ->with('i',(request()->input('page',1)-1)*$pagination);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenisobat = Obat::all();
        return view('obat.riwayatObatCreate',['jenisobat'=>$jenisobat]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $stokAwal = Riwayat_Obat::where('obat_id',$request->obat_id)
        ->where('status','Masuk')
        ->sum('isi');

        $stokKeluar = Riwayat_Obat::where('obat_id',$request->obat_id)
        ->where('status','Keluar')
        ->sum('isi');

        $totalStok =$stokAwal - $stokKeluar;

        if ($totalStok < $request->isi && $request->status == 'Keluar') {
            Alert::error('Oops','Stok obat tidak cukup :(');
            return back()->withInput();
        }

        $request -> validate(
            [
                'obat_id' => 'required',
                'isi' => 'required|numeric',
                'status' => 'required',
                'harga_satuan' => 'required|regex:/^\d+(\.\d{1,2})?$/',
                'total_harga' => 'required|regex:/^\d+(\.\d{1,2})?$/'
            ]
    );

        $riwayatobat = new Riwayat_Obat;
        $riwayatobat -> obat_id = $request->obat_id;
        $riwayatobat -> isi = $request->isi;
        $riwayatobat -> status = $request->status;
        $riwayatobat -> harga_satuan = $request->harga_satuan;
        $riwayatobat -> total_harga = $request->total_harga;
        $riwayatobat -> save();


        if($riwayatobat -> status == 'Masuk'){
            $keuangan = new Keuangan;
            $keuangan -> tanggal = Carbon::now()->toDateString();
            $keuangan -> tipe = 'Obat';
            $keuangan -> tipeID = $riwayatobat->id;
            $keuangan -> keluar = $riwayatobat->total_harga;
            $keuangan->save();
        } else {
            $riwayatobat -> harga_satuan = 0;
            $riwayatobat -> total_harga = 0;
        }

        Alert::success('Success','Riwayat Obat Berhasil Ditambahkan');
        return redirect()->route('riwayatobat.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $riwayatobat = Riwayat_Obat::find($id);
        return view('obat.riwayatObatDetail',compact('riwayatobat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $riwayatobat = Riwayat_Obat::findOrFail($id);
        $jenisobat = Obat::all();
        return view('obat.riwayatObatEdit',compact('riwayatobat','jenisobat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($id);
        $request -> validate([
            'obat_id' => 'required',
            'isi' => 'required|numeric',
            'status' => 'required',
            'harga_satuan' => 'required|regex:/^\d+(\.\d{1,2})?$/'
        ]);

        $riwayatobat = Riwayat_Obat::findOrFail($id);
        $riwayatobat -> obat_id = $request->obat_id;
        $riwayatobat -> isi = $request->isi;
        $riwayatobat -> status = $request->status;
        $riwayatobat -> harga_satuan = $request->harga_satuan;
        $riwayatobat -> total_harga = $request->total_harga;
        $riwayatobat->save();

        if($request->status == 'Masuk') {
            $keuangan = Keuangan::where('tipe','Obat')
                -> where('tipeID',$id)->first();
            $keuangan -> keluar = $request ->total_harga;
            $keuangan->save();
        }
        Alert::success('Success','Riwayat Obat Berhasil Diupdate');
        return redirect()->route('riwayatobat.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Riwayat_Obat::find($id)->delete();
        Alert::success('Success','Riwayat Obat Berhasil Dihapus');
        return redirect()->route('riwayatobat.index');
    }

    public function getHarga($id){
        $loadData = Obat::find($id);
        return response()->json($loadData);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Keuangan;
use App\Models\Pakan;
use App\Models\RiwayatPakan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\Console\Input\Input;
use Barryvdh\DomPDF\Facade\Pdf;

class RiwayatPakanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pagination = 5;
        $riwayatpakan = RiwayatPakan::when($request->keyword, function($query) use ($request){
            $query
            ->where('tanggal','like',"%{$request->keyword}%")
            ->orWhere('status','like',"%{$request->keyword}%")
            ->orWhere('waktu','like',"%{$request->keyword}%")
            ->orWhere('jumlah','like',"%{$request->keyword}%")
            ->orWhere('harga_satuan','like',"%{$request->keyword}%")
            ->orWhere('total_harga','like',"%{$request->keyword}%")
            ->orWhereHas('jenis_pakan',function(Builder $jenispakan) use ($request){
                $jenispakan->where('jenis_pakan','like',"%{$request->keyword}%");
            });
        })->orderBy('id')
        ->paginate($pagination);

        return view('pakan.riwayatPakanIndex',compact('riwayatpakan'))
            ->with('i',(request()->input('page',1)-1)*$pagination);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenispakan = Pakan::all();
        return view('pakan.riwayatPakanCreate',['jenispakan'=>$jenispakan]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $stokAwal = RiwayatPakan::where('pakan_id',$request->pakan_id)
        ->where('status','Masuk')
        ->sum('jumlah');

        $stokKeluar = RiwayatPakan::where('status','Keluar')
        ->where('pakan_id',$request->pakan_id)
        ->sum('jumlah');

        $totalStok = $stokAwal-$stokKeluar;

        if ($totalStok < $request->jumlah && $request->status == 'Keluar') {
            Alert::error('Oops','Stok pakan tidak cukup :(');
            return back()->withInput();
        }

        $request -> validate(
            [
                'pakan_id' => 'required',
                'tanggal' => 'required|date',
                'status' => 'required',
                'jumlah' => 'required|regex:/^\d+(\.\d{1,2})?$/',
                'harga_satuan' => 'required|regex:/^\d+(\.\d{1,2})?$/',
                'total_harga' => 'required|regex:/^\d+(\.\d{1,2})?$/'
            ]
    );

        $riwayatpakan = new RiwayatPakan;
        $riwayatpakan->pakan_id = $request->pakan_id;
        $riwayatpakan->tanggal = $request->tanggal;
        $riwayatpakan->status = $request->status;
        $riwayatpakan->waktu = $request->waktu;
        $riwayatpakan->jumlah = $request->jumlah;
        $riwayatpakan->harga_satuan = $request->harga_satuan;
        $riwayatpakan->total_harga = $request->total_harga;

        $riwayatpakan->save();


        if($riwayatpakan->status =='Masuk') {
            $keuangan = new Keuangan;

            $keuangan -> tanggal = $riwayatpakan->tanggal;
            $keuangan -> tipe = 'Pakan';
            $keuangan -> tipeID = $riwayatpakan -> id;
            $keuangan -> keluar = $riwayatpakan->total_harga;
            $keuangan->save();
        } else {
            $riwayatpakan -> harga_satuan = 0;
            $riwayatpakan -> total_harga = 0;
        }

        $riwayatpakan->save();


        Alert::success('Success','Riwayat Pakan Berhasil Ditambahkan');
        return redirect()->route('riwayatpakan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RiwayatPakan  $riwayatPakan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $riwayatpakan = RiwayatPakan::find($id);
        return view('pakan.riwayatPakanDetail',compact('riwayatpakan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RiwayatPakan  $riwayatPakan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $riwayatpakan = RiwayatPakan::findOrFail($id);
        $jenispakan = Pakan::all();
        return view('pakan.riwayatPakanEdit',compact('riwayatpakan','jenispakan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RiwayatPakan  $riwayatPakan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         // dd($id);
         $request -> validate(
            [
                'pakan_id' => 'required',
                'tanggal' => 'required|date',
                'status' => 'required',
                'jumlah' => 'required|regex:/^\d+(\.\d{1,2})?$/',
                'harga_satuan' => 'required|regex:/^\d+(\.\d{1,2})?$/',
                'total_harga' => 'required|regex:/^\d+(\.\d{1,2})?$/'
            ]
    );

        $riwayatpakan = RiwayatPakan::findOrFail($id);
        $riwayatpakan->pakan_id = $request->pakan_id;
        $riwayatpakan->tanggal = $request->tanggal;
        $riwayatpakan->status = $request->status;
        $riwayatpakan->waktu = $request->waktu;
        $riwayatpakan->jumlah = $request->jumlah;
        $riwayatpakan->harga_satuan = $request->harga_satuan;
        $riwayatpakan->total_harga = $request->total_harga;
        $riwayatpakan->save();

        if($request->status == "Masuk") {
            $keuangan = Keuangan::where('tipe','Pakan')
            ->where('tipeID',$id)->first();
            // dd($keuangan);
            $keuangan -> keluar = $request -> total_harga;
            $keuangan->save();
        }
        Alert::success('Success','Riwayat Pakan Berhasil Diperbarui');
        return redirect()->route('riwayatpakan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RiwayatPakan  $riwayatPakan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        RiwayatPakan::find($id)->delete();
        Alert::success('Success','Riwayat Pakan Berhasil Dihapus');
        return redirect()->route('riwayatpakan.index');
    }

    public function getHarga($id){
        $loadData = Pakan::find($id);
        return response()->json($loadData);
    }

    public function cetak_pdf(){
        $riwayatPakan = RiwayatPakan::all() ;
        $pdf = PDF::loadview('pakan.riwayatPakan_pdf',['riwayatPakan'=>$riwayatPakan])->setPaper('a4', 'landscape');
        return $pdf->stream();
    }
}

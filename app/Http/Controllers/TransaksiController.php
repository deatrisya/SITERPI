<?php

namespace App\Http\Controllers;

use App\Models\Sapi;
use App\Models\Transaksi;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use PDF;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pagination = 5;
        $transaksi = Transaksi::when($request->keyword, function($query) use ($request){
            $query
            ->where('status_transaksi','like',"%{$request->keyword}%")
            ->orWhere('harga','like',"%{$request->keyword}%")
            ->orWhere('created_at','like',"%{$request->keyword}%")
            ->orWhereHas('sapi',function(Builder $sapi) use ($request){
                $sapi->where('nis','like',"%{$request->keyword}%");
            });
        })->orderBy('id')
        ->paginate($pagination);

            $transaksi->appends($request->only('keyword'));
            return view('transaksi.transaksiIndex',compact('transaksi'))
                ->with('i',(request()->input('page',1)-1)*$pagination);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sapi = Sapi::where('status','Belum Terjual')->get();
        return view('transaksi.transaksiCreate',['sapi'=>$sapi]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request -> validate([
            'sapi_id' => 'required',
            'status_transaksi' => 'required',
            'harga' => 'required'
        ]);

        $transaksi = new Transaksi;
        $transaksi -> sapi_id = $request->sapi_id;
        $transaksi -> status_transaksi = $request->status_transaksi;
        $transaksi -> harga = $request->harga;
        $transaksi->save();

        $sapi = Sapi::find($request->sapi_id);
        $sapi -> status = 'Terjual';
        $sapi -> save();

        Alert::success('Success','Transaksi Berhasil Ditambahkan');
        return redirect()->route('transaksi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaksi = Transaksi::find($id);
        return view('transaksi.transaksiDetail',compact('transaksi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sapi = Sapi::where('status','Belum Terjual')->get();
        $transaksi = Transaksi::findOrFail($id);
        return view('transaksi.transaksiEdit',compact('sapi','transaksi'));
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
        // dd($request);
        $request -> validate([
            'sapi_id' => 'required',
            'status_transaksi' => 'required',
            'harga' => 'required'
        ]);

        $transaksi = Transaksi::findOrFail($id);
        $transaksi -> sapi_id = $request->sapi_id;
        $transaksi -> status_transaksi = $request->status_transaksi;
        $transaksi -> harga = $request->harga;
        $transaksi->save();

        Alert::success('Success','Transaksi Berhasil Diupdate');
        return redirect()->route('transaksi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Transaksi::find($id)->delete();
        Alert::success('Success','Transaksi Berhasil Dihapus');
        return redirect()->route('transaksi.index');
    }

    public function getPrice($id){
        $loadData = Sapi::find($id);
        return response()->json($loadData);
    }
    public function cetak_pdf(){
        $transaksi = Transaksi::all() ;
        $pdf = PDF::loadview('transaksi.transaksi_pdf',['transaksi'=>$transaksi]);
        return $pdf->stream();
    }
}

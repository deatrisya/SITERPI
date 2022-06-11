<?php

namespace App\Http\Controllers;

use App\Models\Keuangan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use PDF;

class KeuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pagination = 5;
        $keuangan = Keuangan::when($request->keyword, function($query) use ($request){
            $query
            ->where('tanggal','like',"%{$request->keyword}%")
            ->orWhere('tipe','like',"%{$request->keyword}%")
            ->orWhere('tipeID','like',"%{$request->keyword}%")
            ->orWhere('masuk','like',"%{$request->keyword}%")
            ->orWhere('keluar','like',"%{$request->keyword}%");
        })->orderBy('id')->paginate($pagination);


            $keuangan->appends($request->only('keyword'));
            return view('keuangan.keuanganIndex',compact('keuangan'))
                ->with('i',(request()->input('page',1)-1)*$pagination);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('keuangan.keuanganCreate');
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
            'tanggal' => 'required|date',
            'tipe' => 'required',
            'tipeID' => 'required|string',
        ]);

        Keuangan::create($request->all());

        Alert::success('Success','Data Keuangan Berhasil Ditambahkan');
        return redirect()->route('keuangan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $keuangan = Keuangan::find($id);
        return view('keuangan.keuanganDetail', compact('keuangan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $keuangan = Keuangan::find($id);
        return view('keuangan.keuanganEdit', compact('keuangan'));
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
        $request -> validate([
            'tanggal' => 'required|date',
            'tipe' => 'required',
            'tipeID' => 'required|string',
        ]);

        Keuangan::find($id)->update($request->all());
        Alert::success('Success','Data Keuangan Berhasil Diupdate');
        return redirect()->route('keuangan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Keuangan::find($id)->delete();
        Alert::success('Success','Data Keuangan Berhasil DiHapus');
        return redirect()->route('keuangan.index');
    }

    public function cetak_pdf(){
        $keuangan = Keuangan::all();
        $pdf = PDF::loadview('keuangan.keuangan_pdf',['keuangan'=>$keuangan]);
        return $pdf->stream('laporan keuangan.pdf');
        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
    }
}

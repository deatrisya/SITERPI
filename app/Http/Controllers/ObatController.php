<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Barryvdh\DomPDF\Facade\Pdf;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pagination = 5;
        $jenis = Obat::when($request->keyword, function($query) use ($request){
            $query
            ->where('nama_obat','like',"%{$request->keyword}%")
            ->orWhere('satuan','like',"%{$request->keyword}%")
            ->orWhere('harga','like',"%{$request->keyword}%");
        })->orderBy('nama_obat')->paginate($pagination);

        $jenis->appends($request->only('keyword'));
        return view('obat.jenisObatIndex',compact('jenis'))
            ->with('i',(request()->input('page',1)-1)*$pagination);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('obat.jenisObatCreate');
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
            'nama_obat' => 'required|regex:/^[\pL\s\-]+$/u',
            'satuan' => 'required',
            'harga' => 'required|numeric'
        ]);

        $obat = new Obat;
        $obat->nama_obat = $request->nama_obat;
        $obat->satuan = $request->satuan;
        $obat->harga = $request->harga;
        $obat->save();

        Alert::success('Success','Data Obat Berhasil Ditambahkan');
        return redirect()->route('jenisobat.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jenis = Obat::find($id);
        return view('obat.jenisObatDetail', compact('jenis'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jenis = Obat::find($id);
        return view('obat.jenisObatEdit', compact('jenis'));
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
            'nama_obat' => 'required|regex:/^[\pL\s\-]+$/u',
            'satuan' => 'required',
            'harga' => 'required|numeric'

        ]);
        $obat = Obat::findOrFail($id);
        $obat->nama_obat = $request->nama_obat;
        $obat->satuan = $request->satuan;
        $obat->harga = $request->harga;
        $obat->save();

        Alert::success('Success','Data Obat Berhasil Diupdate');
        return redirect()->route('jenisobat.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Obat::find($id)->delete();
        Alert::success('Success','Data Obat Berhasil Dihapus');
        return redirect()->route('jenisobat.index');
    }

    public function cetak_pdf(){
        $jenisObat = Obat::all() ;
        $pdf = PDF::loadview('obat.jenisObat_pdf',['jenisObat'=>$jenisObat]);
        return $pdf->stream();
    }
}

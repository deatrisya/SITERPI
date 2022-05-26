<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pagination = 5;
        $pegawai = Pegawai::when($request->keyword, function($query) use ($request){
            $query
            ->where('nip','like',"%{$request->keyword}%")
            ->orWhere('foto_pegawai','like',"%{$request->keyword}%")
            ->orWhere('nama','like',"%{$request->keyword}%")
            ->orWhere('jenis_kelamin','like',"%{$request->keyword}%")
            ->orWhere('tempat_lahir','like',"%{$request->keyword}%")
            ->orWhere('tanggal_lahir','like',"%{$request->keyword}%")
            ->orWhere('alamat','like',"%{$request->keyword}%")
            ->orWhere('no_telp','like',"%{$request->keyword}%")
            ->orWhere('jabatan','like',"%{$request->keyword}%")
            ->orWhere('jam_kerja','like',"%{$request->keyword}%")
            ->orWhere('gaji','like',"%{$request->keyword}%");
        })->orderBy('nip')->paginate($pagination);


            $pegawai->appends($request->only('keyword'));
            return view('pegawai.pegawaiindex',compact('pegawai'))
                ->with('i',(request()->input('page',1)-1)*$pagination);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pegawai = Pegawai::where('status','Belum Terjual')->get();
        return view('pegawai.pegawaicreate',['pegawai'=>$pegawai]);
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
            'nip'=> 'required|string|max:10',
            'foto_pegawai' => 'required|string',
            'nama' => 'required|string',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'no_telp' => 'required|max:13',
            'jabatan' => 'required',
            'jam_kerja' => 'required',
            'gaji' => 'required',
        ]);

        $pegawai = new Pegawai;
        $pegawai -> nip = $request->nip;
        $pegawai -> status_pegawai = $request->status_pegawai;
        $pegawai -> harga = $request->harga;
        $pegawai->save();

        Alert::success('Success','Pegawai Berhasil Ditambahkan');
        return redirect()->route('Pegawai.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($nip)
    {
        $pegawai = Pegawai::find($nip);
        return view('pegawai.pegawaidetail',compact('pegawai'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($nip)
    {
        $pegawai = Pegawai::find($nip);
        return view('pegawai.pegawaiedit',compact('pegawai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nip)
    {
        $request->validate([
            'nip'=> 'required|string|max:10',
            'foto_pegawai' => 'required|string',
            'nama' => 'required|string',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'no_telp' => 'required|max:13',
            'jabatan' => 'required',
            'jam_kerja' => 'required',
            'gaji' => 'required',
        ]);
        Pegawai::find($nip)->update($request->all());
        return redirect()->route('Pegawai.index')
        ->with('success', 'Data Pegawai Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($nip)
    {
        Pegawai::find($nip)->delete();
        return redirect()->route('Pegawai.index')
            -> with('success', 'Pegawai Berhasil Dihapus');
    }
}

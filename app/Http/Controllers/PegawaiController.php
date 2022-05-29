<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;

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
        $pegawai = Pegawai::all();
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
            'foto_pegawai' => 'required',
            'nama' => 'required|string',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'no_telp' => 'required|max:13',
            'jabatan' => 'required',
            'jam_kerja' => 'required',
            'gaji' => 'required',
        ]);
        // Pegawai::create($request->all());
        $pegawai = new Pegawai;
        $pegawai->nip = $request->get('nip');
        $pegawai->nama = $request->get('nama');
        $pegawai->tempat_lahir = $request->get('tempat_lahir');
        $pegawai->tanggal_lahir = $request->get('tanggal_lahir');
        $pegawai->alamat = $request->get('alamat');
        $pegawai->no_telp = $request->get('no_telp');
        $pegawai->jabatan = $request->get('jabatan');
        $pegawai->jam_kerja = $request->get('jam_kerja');
        $pegawai->gaji = $request->get('gaji');

        if ($request->file('foto_pegawai')){
            $image_name = $request ->file('foto_pegawai')->store('images', 'public');
        }

        $pegawai->foto_pegawai = $image_name;

        $pegawai->save();
        
        Alert::success('Success','Data Pegawai Berhasil Ditambahkan');
        return redirect()->route('pegawai.index');
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
        $pegawai = Pegawai::where('nip', $nip)->first();
        $pegawai->nip = $request->get('nip');
        if($pegawai->foto_pegawai && file_exists(storage_path('app/public/'. $pegawai->foto_pegawai))){
            Storage::delete(['public/'. $pegawai->foto_pegawai]);
        }
        $image_name = $request->file('foto_pegawai')->store('images', 'public');
        $pegawai->foto_pegawai = $image_name;
        $pegawai->nama = $request->get('nama');
        $pegawai->tempat_lahir = $request->get('tempat_lahir');
        $pegawai->tanggal_lahir = $request->get('tanggal_lahir');
        $pegawai->alamat = $request->get('alamat');
        $pegawai->no_telp = $request->get('no_telp');
        $pegawai->jabatan = $request->get('jabatan');
        $pegawai->jam_kerja = $request->get('jam_kerja');
        $pegawai->gaji = $request->get('gaji');
        $pegawai->save();

        // Pegawai::find($nip)->update($request->all());
        return redirect()->route('pegawai.index')
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
        return redirect()->route('pegawai.index')
            -> with('success', 'Pegawai Berhasil Dihapus');
    }
}

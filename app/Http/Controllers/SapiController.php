<?php

namespace App\Http\Controllers;

use App\Models\Jenis_Sapi;
use App\Models\Sapi;
use App\Models\Transaksi;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class SapiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pagination = 5;
        $sapi = Sapi::when($request->keyword, function($query) use ($request){
            $query
            ->where('NIS','like',"%{$request->keyword}%")
            ->orWhere('tanggal_lahir','like',"%{$request->keyword}%")
            ->orWhere('jenis_kelamin','like',"%{$request->keyword}%")
            ->orWhere('status','like',"%{$request->keyword}%")
            ->orWhere('bobot','like',"%{$request->keyword}%")
            ->orWhere('harga','like',"%{$request->keyword}%")
            ->orWhere('kondisi','like',"%{$request->keyword}%")
            ->orWhereHas('jenissapi',function(Builder $jenisapi) use ($request){
                $jenisapi->where('jenis_sapi','like',"%{$request->keyword}%");
            });
        })->orderBy('id')
        ->paginate($pagination);


            $sapi->appends($request->only('keyword'));
            return view('sapi.sapiIndex',compact('sapi'))
                ->with('i',(request()->input('page',1)-1)*$pagination);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenisapi = Jenis_Sapi::all();
        return view('sapi.sapiCreate',['jenissapi'=>$jenisapi]);
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
        $request -> validate(
            [
                'jenissapi_id' => 'required',
                'nis' => 'required|string|max:10',
                'tanggal_lahir' => 'required|date',
                'jenis_kelamin' => 'required',
                'status_asal' => 'required',
                'bobot' => 'required|numeric',
                'harga' => 'required|regex:/^\d+(\.\d{1,2})?$/',
                'kondisi' => 'required',

            ]
    );

        $sapi = new Sapi;
        $sapi -> jenissapi_id = $request->jenissapi_id;
        $sapi -> nis = $request->nis;
        $sapi -> tanggal_lahir = $request->tanggal_lahir;
        $sapi -> status = 'Belum Terjual';
        $sapi -> jenis_kelamin = $request->jenis_kelamin;
        $sapi -> status_asal = $request->status_asal;
        $sapi -> bobot = $request->bobot;
        $sapi -> harga = $request->harga;
        $sapi -> kondisi = $request->kondisi;
        $sapi -> keterangan = $request->keterangan;

        if ($sapi -> status_asal == 'Beli') {
            $sapi->save();

            $transaksi = new Transaksi;
            $transaksi -> sapi_id = $sapi -> id ;
            $transaksi -> status_transaksi = 'Beli';
            $transaksi -> harga = $sapi ->harga;
            $transaksi -> save();
        } else {
            $sapi -> save();
        }

        Alert::success('Success','Sapi Berhasil Ditambahkan');
        return redirect()->route('sapi.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sapi = Sapi::find($id);
        return view('sapi.sapiDetail',compact('sapi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sapi = Sapi::findOrFail($id);
        $jenissapi = Jenis_Sapi::all();
        return view('sapi.sapiEdit',compact('sapi','jenissapi'));
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
            'jenissapi_id' => 'required',
            'nis' => 'required|string|max:10',
            'tanggal_lahir' => 'required|date',
            // 'status' => 'required',
            'jenis_kelamin' => 'required',
            // 'status_asal' => 'required',
            'bobot' => 'required|numeric',
            'harga' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'kondisi' => 'required',
        ]);

        $sapi = Sapi::findOrFail($id);
        $sapi -> jenissapi_id = $request->jenissapi_id;
        $sapi -> nis = $request->nis;
        $sapi -> tanggal_lahir = $request->tanggal_lahir;
        $sapi -> jenis_kelamin = $request->jenis_kelamin;
        $sapi -> bobot = $request->bobot;
        $sapi -> harga = $request->harga;
        $sapi -> kondisi = $request->kondisi;
        $sapi -> keterangan = $request->keterangan;
        $sapi->save();

        Alert::success('Success','Sapi Berhasil Diupdate');
        return redirect()->route('sapi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Sapi::find($id)->delete();
        Alert::success('Success','Sapi Berhasil Dihapus');
        return redirect()->route('sapi.index');
    }
}

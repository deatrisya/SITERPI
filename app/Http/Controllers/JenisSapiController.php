<?php

namespace App\Http\Controllers;

use App\Models\Jenis_Sapi;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use PDF;

class JenisSapiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pagination = 2;
        $jenis = Jenis_Sapi::when($request->keyword, function($query) use ($request){
            $query
            ->where('jenis_sapi','like',"%{$request->keyword}%");
        })->orderBy('jenis_sapi')->paginate($pagination);

        $jenis->appends($request->only('keyword'));
        return view('sapi.jenisSapiIndex',compact('jenis'))
            ->with('i',(request()->input('page',1)-1)*$pagination);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sapi.jenisSapiCreate');
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
            'jenis_sapi' => 'required|regex:/^[\pL\s\-]+$/u'
        ]);

        Jenis_Sapi::create($request->all());

        Alert::success('Success','Jenis Sapi Berhasil Ditambahkan');
        return redirect()->route('jenissapi.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jenis = Jenis_Sapi::find($id);
        return view('sapi.jenisSapiDetail', compact('jenis'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jenis = Jenis_Sapi::find($id);
        return view('sapi.jenisSapiEdit', compact('jenis'));
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
            'jenis_sapi' => 'required|regex:/^[\pL\s\-]+$/u'
        ]);

        Jenis_Sapi::find($id)->update($request->all());
        Alert::success('Success','Jenis Sapi Berhasil Di Update');
        return redirect()->route('jenissapi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Jenis_Sapi::find($id)->delete();
        Alert::success('Success','Jenis Sapi Berhasil Dihapus');
        return redirect()->route('jenissapi.index');
    }
    public function cetak_pdf(){
        $jenisSapi = Jenis_Sapi::all();
        $pdf = PDF::loadview('sapi.jenisSapi_pdf',['jenisSapi'=>$jenisSapi]);
        return $pdf->stream();
    }
}

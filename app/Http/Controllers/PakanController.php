<?php

namespace App\Http\Controllers;

use App\Models\Pakan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PakanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pagination = 5;
        $pakan = Pakan::when($request->keyword, function($query) use ($request){
            $query
            ->where('jenis_pakan','like',"%{$request->keyword}%");
        })->orderBy('jenis_pakan')->paginate($pagination);

        $pakan->appends($request->only('keyword'));
        return view('pakan.jenisPakanIndex',compact('pakan'))
            ->with('i',(request()->input('page',1)-1)*$pagination);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pakan.jenisPakanCreate');
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
            'jenis_pakan' => 'required|regex:/^[\pL\s\-]+$/u'
        ]);

        Pakan::create($request->all());

        Alert::success('Success','Data Pakan Berhasil Ditambahkan');
        return redirect()->route('jenispakan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pakan  $pakan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pakan = Pakan::find($id);
        return view('pakan.jenisPakanDetail', compact('pakan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pakan  $pakan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pakan = Pakan::find($id);
        return view('pakan.jenisPakanEdit', compact('pakan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pakan  $pakan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request -> validate([
            'jenis_pakan' => 'required|regex:/^[\pL\s\-]+$/u'
        ]);

        Pakan::find($id)->update($request->all());
        Alert::success('Success','Data Pakan Berhasil Diupdate');
        return redirect()->route('jenispakan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pakan  $pakan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pakan::find($id)->delete();
        Alert::success('Success','Data Pakan Berhasil Dihapus');
        return redirect()->route('jenispakan.index');
    }
}

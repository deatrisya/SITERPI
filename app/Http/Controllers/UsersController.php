<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Barryvdh\DomPDF\Facade\Pdf;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pagination = 5;
        $user = User::when($request->keyword, function($query) use ($request){
            $query
            ->where('nama','like',"%{$request->keyword}%")
            ->orWhere('username','like',"%{$request->keyword}%")
            ->orWhere('email','like',"%{$request->keyword}%")
            ->orWhere('no_hp','like',"%{$request->keyword}%")
            ->orWhere('jenis_kelamin','like',"%{$request->keyword}}%")
            ->orWhere('alamat','like',"%{$request->keyword}}%")
            ->orWhere('jabatan','like',"%{$request->keyword}}%");
        })->orderBy('id')->paginate($pagination);

        $user->appends($request->only('keyword'));
        return view('user.user',compact('user'))
            ->with('i',($request->input('page',1)-1)*$pagination);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('user.userDetail',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('user.userEdit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        // dd($request->all());
        $request->validate([
            'nama'=> 'required',
            'username' => 'required|string|max:20',
            'password' => 'min:8|confirmed|nullable',
            'email' => 'required|email|unique:users,email,'.$id,
            'no_hp' => 'string|max:13|required',
            'jenis_kelamin' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'jabatan' => 'required'
        ]);

        $user = User::findOrFail($id);
        if ($request->hasFile('foto')) {
            if ($user->foto && file_exists(storage_path('app/public/'.$user->foto))) {
                Storage::delete('public/'.$user->foto);
            }
            $image_name = $request->file('foto')->store('user','public');
            $user->foto = $image_name;
        }
        $user -> nama = $request->nama;
        $user -> username = $request->username;
        if (!$request->password && !$request->password_confirmation) {
            // dd('ini ga ganti');
        } else {
            $user->password = Hash::make($request->password);
        }
        $user -> email = $request->email;
        $user -> no_hp = $request->no_hp;
        $user -> jenis_kelamin = $request->jenis_kelamin;
        $user -> tanggal_lahir = $request->tanggal_lahir;
        $user -> alamat = $request->alamat;
        $user -> jabatan = $request->jabatan;
        $user -> save();

        Alert::success('Success','User Berhasil Diupdate');
        return redirect()->route('user.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        Alert::success('Success','User Berhasil Di Update');
        return redirect()->route('user.index');
    }

    public function cetak_pdf(){
        $user = User::all();
        // dd($user);
        $pdf = PDF::loadview('user.user_cetakPdf',['user'=>$user])->setPaper('a4', 'landscape');
        return $pdf->stream();
    }
}

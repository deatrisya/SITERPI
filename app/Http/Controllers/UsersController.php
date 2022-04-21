<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pagination = 2;
        $user = User::when($request->keyword, function($query) use ($request){
            $query
            ->where('nama','like',"%{$request->keyword}%")
            ->orWhere('username','like',"%{$request->keyword}%")
            ->orWhere('email','like',"%{$request->keyword}%")
            ->orWhere('jenis_kelamin','like',"%{$request->keyword}}%")
            ->orWhere('alamat','like',"%{$request->keyword}}%")
            ->orWhere('jabatan','like',"%{$request->keyword}}%");
        })->orderBy('id')->paginate($pagination);

        $user->appends($request->only('keyword'));
        return view('user.user',compact('user'))
            ->with('i',($request->input('page',1)-1)*$pagination);
        // return view('user.user');
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
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama'=> 'required',
            'username' => 'required|string|max:20',
            'password' => 'required|string|min:8',
            'email' => 'required|unique:users',
            'jenis_kelamin' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'jabatan' => 'required'
        ]);
        User::find($id)->update($request->all());
        return redirect()->route('user.index')
        ->with('success', 'Data User Berhasil Diupdate');
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
        return redirect()->route('user.index')
            -> with('success', 'User Berhasil Dihapus');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use DB;
use Validator;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('xadmin.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    function cekLogin(Request $req){

        $validator = Validator::make($req->all(), [
            
            'username' => [
                            'required',
                            'min:3',
                            'exists:Pengguna,username'

                        ],
            'password' => [
                            'required',
                            'min:7',
                        ],
        
        ]);

        if ($validator->fails()) {
            return redirect('admin.login')
                        ->withErrors($validator)
                        ->withInput();
        }

        $user= $req->username;
        $pass = md5($req->password);


        $check = Admin::where('username',$user)->where('password',$pass)->count();

        if( !($check > 0) )  {
             return redirect('admin.login')->with('status', 'salah');
        }


        $take = Admin::where('username',$user)->where('password',$pass)->first();

        session(['username' => $take->username]);
        session(['level' => $take->level]);
        session(['password' => true ]);

        return redirect('admin.home');

    }

    function logout(Request $req){

        $req->session()->regenerate();
        $req->session()->flush();
        
        return redirect('admin.login');

    }

}

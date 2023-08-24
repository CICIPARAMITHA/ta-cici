<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
class AuthController extends Controller
{
    function login(){
        // dd(bcrypt(12345));
        return view('login');
    }

    function loginProses(Request $request){

        if(Auth::attempt(['username' => request('username'), 'password' => request('password')])){
         return redirect('admin/beranda')->with('success','Selamat datang admin');
     }else{
        return back()->with('danger','Username/Password salah');
    }
}


function logout(){
   Auth::logout();
   return redirect('login')->with('danger','Berhasil keluar');
}
}

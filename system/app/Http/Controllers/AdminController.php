<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sensor;
use App\Models\User;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Auth;

class AdminController extends Controller
{
    function beranda(){
         $max_id = Sensor::max('sensor_id');
         $data['nilai'] = $nilai = Sensor::where('sensor_id',$max_id)->first();
         $data['persen_soil'] = $nilai->soil / 1023 *100;
         // dd($soil);
         // nilai sensor / nilai maxsimum * 100
         return view('admin.beranda',$data);
    }

    function profil(){
     $data['user'] = Auth::user();
     return view('admin.profil',$data);
}

function update(){
     $new = request('new_password');
     $konfirmasi = request('konfirmasi');

     if($new == $konfirmasi){
          DB::table('user')->where('id',1)->update([
               'username' => request('username'),
               'ip' => request('ip'),
               'password' => bcrypt($new)
          ]);

         return back()->with('success','Berhasil diupdate');
     }else{
          return back()->with('danger','username/password tidak cocok');
     }
}

function chart(){
    $data = Sensor::orderBy('created_at', 'desc')->take(10)->get();
    return view('admin.chart', compact('data'));
}
}

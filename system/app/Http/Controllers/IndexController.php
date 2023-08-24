<?php

namespace App\Http\Controllers;
use App\Models\Sensor;
use Illuminate\Http\Request;
use DB;

class IndexController extends Controller
{
    function index(){
        $max_id = Sensor::max('sensor_id');
       $data['nilai'] = Sensor::where('sensor_id',$max_id)->first();
        return view('index',$data);
    }

    function load(){
       $data =  DB::table('sensor')->latest()->first();
        return response()->json([

            'created_at' => $data->created_at,
            'soil' => $data->soil,
            'temperatur' => $data->temperatur,
            'humidity' => $data->humidity,
        ]);
    }
}

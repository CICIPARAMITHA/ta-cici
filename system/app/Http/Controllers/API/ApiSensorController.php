<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sensor;
use DB;

class ApiSensorController extends Controller
{
    public function index(){

      
    }

    public function store(Request $request)
    {
        $soil = trim($request->moistureValue);
        $temperatur = trim($request->temperature);
        $humidity = trim($request->humidity);
        $ip = trim($request->ip);
      
        
        DB::table('sensor')->where('sensor_id',1)->update([
             "soil" => $soil,
            "temperatur" => $temperatur,
            "humidity" => $humidity,
            "ip" => $ip,
            "jam" => date('h'),
            "tgl" => date('d'),
            "bulan" => date('m'),
            "tahun" => date('Y'),
        ]);
        // $data =  Sensor::create([
        //     "soil" => $soil,
        //     "temperatur" => $temperatur,
        //     "humidity" => $humidity,
        //     "ip" => $ip,
        //     "jam" => date('h'),
        //     "tgl" => date('d'),
        //     "bulan" => date('m'),
        //     "tahun" => date('Y'),
        // ]);


        return response()->json(['status' => 'success']);
    }

}

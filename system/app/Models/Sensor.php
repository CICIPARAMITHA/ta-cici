<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
    use HasFactory;
     protected $table = 'sensor';
     protected $fillable = ["soil","temperatur","humidity","jam","tgl","bulan","tahun"];
     protected $primaryKey = 'sensor_id';

}

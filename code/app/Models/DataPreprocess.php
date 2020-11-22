<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DataPreprocess extends Model
{
    use HasFactory;

    public function t100DeleteConfig(){

        $config = 2;
        $return = DB::delete("
            delete from t100_seg where AIRCRAFT_CONFIG = {$config}
        ");

        return $return;
    }

    public function t100DeleteSeatDistance(){

        $return = DB::delete("
            delete from t100_seg where SEATS = 0 or DISTANCE = 0;
        ");

        return $return;

    }
}

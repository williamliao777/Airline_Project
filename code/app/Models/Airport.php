<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Airport extends Model
{
    use HasFactory;

    public function getCoordinate($names){
        $airports = DB::select("select  a.AIRPORT as airport, a.LATITUDE as LAT, a.LONGITUDE as LON
                                from    airport a
                                where a.AIRPORT in ({$names})");
        return $airports;
    }

}

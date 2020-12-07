<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Coupon extends Model
{
    use HasFactory;

    public function getAvgFare($year, $quarter, $origin){
        $coupon_fare = DB::select("select   c.Origin as origin, c.Dest as dest, avg(c.fare) as fare
                                    from    coupon_{$year}_{$quarter}_2 c
                                    where   c.Origin= '{$origin}'
                                    group by c.Origin, c.Dest
                                    limit 10");
        return $coupon_fare;
    }

    public function getTotalFareAndAvgFareByAirline($year, $quarter, $origin, $dest){

        $result = DB::select("select OpCarrier as airline_code, avg(Fare) as avg_fare, sum(Fare) as total_fare from coupon_{$year}_{$quarter}_2 where Origin = '{$origin}' and Dest = '{$dest}' group by OpCarrier");

        return $result;
    }

    public function getAllOrigin($year, $quarter){
        $result = DB::select("select Origin as code from coupon_{$year}_{$quarter}_2 group by Origin");

        return $result;
    }


}

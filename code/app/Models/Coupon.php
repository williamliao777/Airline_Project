<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Coupon extends Model
{
    use HasFactory;

    public function getAvgFare($coupon, $origin){
        $coupon_fare = DB::select("select   c.Origin as origin, c.Dest as dest, avg(c.fare) as fare
                                    from    {$coupon} c
                                    where   c.Origin= '{$origin}'
                                    group by c.Origin, c.Dest
                                    limit 10");
        return $coupon_fare;
    }

    public function getTotalFareAndAvgFareByAirline($origin, $dest){

        $result = DB::select("select OpCarrier as airline_code, avg(Fare) as avg_fare, sum(Fare) as total_fare from coupon_2016_3_2 where Origin = '{$origin}' and Dest = '{$dest}' group by OpCarrier");

        return $result;
    }
}

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
                                    where   c.Origin= '\"{$origin}\"'
                                    group by c.Origin, c.Dest
                                    limit 10");
        return $coupon_fare;
    }
}

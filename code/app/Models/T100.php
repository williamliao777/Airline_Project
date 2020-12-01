<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class T100 extends Model
{
    use HasFactory;

    public function getDistSeatPass($t100, $origin){
        $t100_dist_seat_pass = DB::select("select    t.ORIGIN as origin, t.DEST as dest, sum(t.DEPARTURES_PERFORMED*t.DISTANCE) as dist, sum(t.DEPARTURES_PERFORMED*t.SEATS) as seat, sum(t.DEPARTURES_PERFORMED*t.PASSENGERS) as pass
                                    from    {$t100} t
                                    where   t.ORIGIN='{$origin}'
                                    group by t.ORIGIN, t.DEST");
        return $t100_dist_seat_pass;
    }

    // public function getSeatAndPassGroupByOrigin(){

    //     $return = DB::select("select CARRIER, sum(SEATS) as seats, sum(DISTANCE) as distance
    //                                 from t100_seg where ORIGIN = 'IAD' and YEAR = 2016 and QUARTER = 3
    //                                 group by ORIGIN, CARRIER");

    //     return $return;
    // }
}

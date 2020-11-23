<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class T100 extends Model
{
    use HasFactory;

    public function getDistSeat($t100, $origin){
        $t100_dist_seat = DB::select("select    t.ORIGIN as origin, t.DEST as dest, sum(t.DEPARTURES_PERFORMED*t.DISTANCE) as dist, sum(t.DEPARTURES_PERFORMED*t.SEATS) as seat
                                    from    {$t100} t
                                    where   t.ORIGIN='{$origin}'
                                    group by t.ORIGIN, t.DEST
                                    limit 20");
        return $t100_dist_seat;
    }

    public function getSeatAndPassGroupByOrigin(){

        $return = DB::select("select CARRIER, sum(SEATS) as seats, sum(DISTANCE) as distance
                                    from t100_seg where ORIGIN = 'IAD' and YEAR = 2016 and QUARTER = 3
                                    group by ORIGIN, CARRIER");

        return $return;
    }
}

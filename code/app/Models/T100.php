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

    public function getSeatAndPassGroupByOrigin($market, $year, $quarter){

        $return = DB::select("select CARRIER, sum(SEATS) as seats, sum(DISTANCE) as distance, sum(PASSENGERS) as passenger
                                    from t100_seg where ORIGIN = '{$market}' and YEAR = {$year} and QUARTER = {$quarter}
                                    group by ORIGIN, CARRIER");

        return $return;
    }

    public function getTotalPassengerAndSeat($year, $quarter){
        $return = DB::select("select sum(SEATS) as total_seat, sum(PASSENGERS) as total_passenger 
                                    from t100_seg 
                                    where YEAR = {$year} and QUARTER = {$quarter} 
                                    group by YEAR,QUARTER");

        return $return[0];
    }

    public function getAllOrigin($year, $quarter){
        $result = DB::select("select ORIGIN as code, ORIGIN_CITY_NAME as name from t100_seg where YEAR = {$year} and QUARTER = {$quarter} group by ORIGIN,ORIGIN_CITY_NAME");

        return $result;
    }

    public function getAllDestByOrigin($year, $quarter, $origin){

        $result = DB::select("select DEST as code, DEST_CITY_NAME as name from t100_seg where YEAR = {$year} and QUARTER = {$quarter} and ORIGIN = '{$origin}' group by DEST, DEST_CITY_NAME");

        return $result;
    }

    public function getAllAirlineByOriginAndDest($year, $quarter, $origin, $dest){

        $result = DB::select("select CARRIER as code, CARRIER_NAME as name from t100_seg where YEAR = {$year} and QUARTER = {$quarter} and ORIGIN = '{$origin}' and DEST = '{$dest}' group by CARRIER, CARRIER_NAME");

        return $result;
    }

    public function getMarketPerformByAirline($year, $quarter, $origin, $dest, $airline_group){
        $result = DB::select("select CARRIER as code, CARRIER_NAME as name, sum(SEATS) as total_seats, sum(PASSENGERS) as total_passengers, sum(DEPARTURES_PERFORMED) as total_flights, sum(DISTANCE) as total_distance from t100_seg where YEAR = {$year} and QUARTER = {$quarter} and ORIGIN = '{$origin}' and DEST = '{$dest}' and CARRIER in ({$airline_group}) group by CARRIER, CARRIER_NAME");

        return $result;
    }

    public function getTotalPassengerAndSeatByRoute($year, $quarter, $origin, $dest){
        $return = DB::select("select sum(SEATS) as total_route_seat, sum(PASSENGERS) as total_route_passenger 
                                    from t100_seg 
                                    where YEAR = {$year} and QUARTER = {$quarter} and ORIGIN = '{$origin}' and DEST = '{$dest}'
                                    group by YEAR,QUARTER");

        return $return[0];
    }
}

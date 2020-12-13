<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Menu;
use App\Models\T100;
use Illuminate\Http\Request;

class MarketPerformanceController extends Controller
{
    //
    public $current_menu = "Market Performance";

    public function __construct()
    {
//        $this->middleware('auth');
    }

    public function index(Request $request)
    {

        $year = $request->year;
        $airlines = $request->airline;
        $origin = $request->origin;
        $destination = $request->destination;
        $quarter = $request->quarter;

        if($year == ""){
            $year = 2016;
        }

        $total_flights = array();
        $psl_array = array();
        $avg_fare_array = array();
        $asm = array();
        $rasm = array();
        $total_seat_market_share = array();
        if($quarter != ""){

            $request->validate([
                'origin' => 'required',
                'destination' => 'required',
                'airline' => 'required'
            ]);

            $t100 = new T100();
            $coupon = new Coupon();

            //parse airline array to string
            $airline_group = "";
            foreach ($airlines as $key => $airline){
                if($key == 0){
                    $airline_group .= "'{$airline}'";
                }else{
                    $airline_group .= ",'{$airline}'";
                }

            }


            $t100_result = $t100->getMarketPerformByAirline($year, $quarter, $origin, $destination, $airline_group);
            $t100_total_route = $t100->getTotalPassengerAndSeatByRoute($year, $quarter, $origin, $destination);
            $coupon_result = $coupon->getTotalFareAndAvgFareByAirline($year, $quarter, $origin, $destination);

            $combined_array = array();
            foreach ($t100_result as $single_airline){
                $combined_array[$single_airline->code]["total_seats"] = $single_airline->total_seats;
                $combined_array[$single_airline->code]["total_passengers"] = $single_airline->total_passengers;
                $combined_array[$single_airline->code]["total_flights"] = $single_airline->total_flights;
                $combined_array[$single_airline->code]["total_distance"] = $single_airline->total_distance;
                $combined_array[$single_airline->code]["name"] = $single_airline->name;
                $combined_array[$single_airline->code]["total_route_seat"] = $t100_total_route->total_route_seat;
                $combined_array[$single_airline->code]["total_route_passenger"] = $t100_total_route->total_route_passenger;
            }

            foreach ($coupon_result as $single_coupon){
                if(array_key_exists($single_coupon->airline_code, $combined_array)){
                    $combined_array[$single_coupon->airline_code]["avg_fare"] = $single_coupon->avg_fare;
                    $combined_array[$single_coupon->airline_code]["total_fare"] = $single_coupon->total_fare;
                }
            }

            // no. of flight each airline
            $total_flights['type'] = 'bar';
            $total_flights['options']['scales']['yAxes'][0]['ticks']['beginAtZero'] = true;
            foreach ($combined_array as $carrier => $value){
                $total_flights['data']['labels'][] = $value["name"];
                $total_flights['data']['datasets'][0]['label'] = 'Total Flights';
                $total_flights['data']['datasets'][0]['data'][] = $value["total_flights"];
                $total_flights['data']['datasets'][0]['backgroundColor'][] = 'rgba(54, 162, 235, 0.2)';
                $total_flights['data']['datasets'][0]['borderColor'][] = 'rgba(54, 162, 235, 1)';
            }

            //passenger + seats + load factor
            $psl_array['type'] = 'bar';
            $psl_array['options']['scales']['yAxes'][0]['ticks']['beginAtZero'] = true;
            foreach ($combined_array as $carrier => $value){
                $psl_array['data']['labels'][] = $value["name"];
                $psl_array['data']['datasets'][0]['label'] = 'Total Passenger';
                $psl_array['data']['datasets'][0]['data'][] = $value["total_passengers"];
                $psl_array['data']['datasets'][0]['backgroundColor'][] = 'rgba(54, 162, 235, 0.2)';
                $psl_array['data']['datasets'][0]['borderColor'][] = 'rgba(54, 162, 235, 1)';

                $psl_array['data']['datasets'][1]['label'] = 'Total Seats';
                $psl_array['data']['datasets'][1]['data'][] = $value["total_seats"];
                $psl_array['data']['datasets'][1]['backgroundColor'][] = 'rgba(153, 102, 255, 0.2)';
                $psl_array['data']['datasets'][1]['borderColor'][] = 'rgba(153, 102, 255, 1)';

                $psl_array['data']['datasets'][2]['label'] = 'Load Factor';
                $psl_array['data']['datasets'][2]['data'][] = $value["total_passengers"]/$value["total_seats"];
                $psl_array['data']['datasets'][2]['backgroundColor'][] = 'rgba(255, 159, 64, 0.2)';
                $psl_array['data']['datasets'][2]['borderColor'][] = 'rgba(255, 159, 64, 1)';
            }

            // avg fare each airline
            $avg_fare_array['type'] = 'bar';
            $avg_fare_array['options']['scales']['yAxes'][0]['ticks']['beginAtZero'] = true;
            foreach ($combined_array as $carrier => $value){
                $avg_fare_array['data']['labels'][] = $value["name"];
                $avg_fare_array['data']['datasets'][0]['label'] = 'Average Fare';
                if(isset($value["avg_fare"])){
                    $avg_fare_array['data']['datasets'][0]['data'][] = $value["avg_fare"];
                    $avg_fare_array['data']['datasets'][0]['backgroundColor'][] = 'rgba(54, 162, 235, 0.2)';
                    $avg_fare_array['data']['datasets'][0]['borderColor'][] = 'rgba(54, 162, 235, 1)';
                }
            }

            //available seat mile
            $asm['type'] = 'bar';
            $asm['options']['scales']['yAxes'][0]['ticks']['beginAtZero'] = true;
            foreach ($combined_array as $carrier => $value){
                $asm['data']['labels'][] = $value["name"];
                $asm['data']['datasets'][0]['label'] = 'Available Seat Mile';
                $asm['data']['datasets'][0]['data'][] = $value["total_distance"] * $value["total_seats"];
                $asm['data']['datasets'][0]['backgroundColor'][] = 'rgba(54, 162, 235, 0.2)';
                $asm['data']['datasets'][0]['borderColor'][] = 'rgba(54, 162, 235, 1)';
            }

            //Revenue per Available Seat Mile (RASM)
            $rasm['type'] = 'bar';
            $rasm['options']['scales']['yAxes'][0]['ticks']['beginAtZero'] = true;
            foreach ($combined_array as $carrier => $value){
                $rasm['data']['labels'][] = $value["name"];
                $rasm['data']['datasets'][0]['label'] = 'Revenue per Available Seat Mile';
                if(isset($value["avg_fare"])){
                    $rasm['data']['datasets'][0]['data'][] = $value["total_fare"]/($value["total_distance"] * $value["total_seats"]);
                    $rasm['data']['datasets'][0]['backgroundColor'][] = 'rgba(54, 162, 235, 0.2)';
                    $rasm['data']['datasets'][0]['borderColor'][] = 'rgba(54, 162, 235, 1)';
                }

            }

            //total seats share + total_market_share
            $total_seat_market_share['type'] = 'bar';
            $total_seat_market_share['options']['scales']['yAxes'][0]['ticks']['beginAtZero'] = true;
            foreach ($combined_array as $carrier => $value){
                $total_seat_market_share['data']['labels'][] = $value["name"];
                $total_seat_market_share['data']['datasets'][0]['label'] = 'Market share';
                $total_seat_market_share['data']['datasets'][0]['data'][] = $value["total_passengers"]/$value["total_route_passenger"];
                $total_seat_market_share['data']['datasets'][0]['backgroundColor'][] = 'rgba(54, 162, 235, 0.2)';
                $total_seat_market_share['data']['datasets'][0]['borderColor'][] = 'rgba(54, 162, 235, 1)';

                $total_seat_market_share['data']['datasets'][1]['label'] = 'Seat capacity share';
                $total_seat_market_share['data']['datasets'][1]['data'][] = $value["total_seats"]/$value["total_route_seat"];
                $total_seat_market_share['data']['datasets'][1]['backgroundColor'][] = 'rgba(153, 102, 255, 0.2)';
                $total_seat_market_share['data']['datasets'][1]['borderColor'][] = 'rgba(153, 102, 255, 1)';

            }


        }

        $menus = Menu::all();
        return view('admin.market_performance', [
            "menus" => $menus,
            "current_menu" => $this->current_menu,
            "total_flights" => json_encode($total_flights),
            "psl" => json_encode($psl_array),
            "af" => json_encode($avg_fare_array),
            "asm" => json_encode($asm),
            "rasm" => json_encode($rasm),
            "mscs" => json_encode($total_seat_market_share)
        ]);
    }

    public function getAllOriginApi(Request $request){

        $year = $request->year;
        $quarter = $request->quarter;

        $t100 = new T100();
        $result = $t100->getAllOrigin($year, $quarter);

        echo json_encode($result);

    }

    public function getAllDestApi(Request $request){

        $year = $request->year;
        $quarter = $request->quarter;
        $origin = $request->origin;

        $t100 = new T100();
        $result = $t100->getAllDestByOrigin($year, $quarter, $origin);

        echo json_encode($result);

    }

    public function getAllCarrierByOriginAndDestApi(Request $request){

        $year = $request->year;
        $quarter = $request->quarter;
        $origin = $request->origin;
        $destination = $request->destination;

        $t100 = new T100();
        $result = $t100->getAllAirlineByOriginAndDest($year, $quarter, $origin, $destination);

        echo json_encode($result);

    }
}

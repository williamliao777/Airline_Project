<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\T100;
use App\Models\Airport;
use App\Models\Menu;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isEmpty;

class SupplyDemandController extends Controller
{

    public $current_menu = "Supply and Demand";

    public function __construct()
    {
//        $this->middleware('auth');
    }

    public function index(Request $request){

        $year = $request->year;
        $origin = $request->origin;
        $quarter = $request->quarter;

        if($year == ""){
            $year = 2016;
        }

        if($quarter == ""){
            $quarter = 3;
        }

        if($origin == ""){
            $origin = "IAD";
        }

        $coupon = new Coupon();
        $T100 = new T100();
        $Airport = new Airport();

        $total = array();
        $airports = array();
        $routes = array();

        $DistSeatPass = $T100->getDistSeatPass($year, $quarter, $origin);
        foreach($DistSeatPass as $e){
            $total[$e->origin.'_'.$e->dest] = array(
                "origin"=>$e->origin,
                "dest"=>$e->dest,
                "dist"=>$e->dist,
                "seat"=>$e->seat,
                "pass"=>$e->pass
            );
        }

        $AvgFare = $coupon->getAvgFare($year, $quarter, $origin);
        foreach($AvgFare as $e){
            $total[$e->origin.'_'.$e->dest]["fare"] = $e->fare;
        }

        // drop those entities without fare and add those with fare to airport and route
        $i = 0;
        foreach($total as $key => $value){
            if(!array_key_exists("fare", $total[$key]) | !array_key_exists("origin", $total[$key])){
                unset($total[$key]);
            }else{
                $airports[] = "'{$value["origin"]}'";
                $airports[] = "'{$value["dest"]}'";
                $routes[] = ["source"=>$value["origin"], "target"=>$value["dest"], "route_id"=>$i];
                $i++;
            }
        }
        $airports = $Airport->getCoordinate(implode(",", array_unique($airports)));
        foreach($airports as $e){
            if($e->airport == $origin){
                $e->is_origin = 1;
            }else{
                $e->is_origin = 0;
            }
        }
        $airports_json = json_encode($airports);
        $routes_json = json_encode($routes);
        $total_json = json_encode($total);
        $menus = Menu::all();
        return view('admin.supply_demand', [
            "menus" => $menus,
            "current_menu" => $this->current_menu,
            "airports_json" => $airports_json,
            "routes_json" => $routes_json,
            "total_json" => $total_json
        ]);
    }

    public function getAllAirportApi(Request $request){

        $year = $request->year;
        $quarter = $request->quarter;

        $coupon = new Coupon();
        $airport = new Airport();

        $coupon_result = $coupon->getAllOrigin($year, $quarter);
        $airport_result = $airport->getAllAirport();

        $combine_array = array();
        $airport_array = array();

        foreach ($coupon_result as $value){
            $combine_array[]["code"] = $value->code;
        }

        foreach ($airport_result as $airport){
            $airport_array[$airport->code] = $airport->name;
        }

        foreach ($combine_array as $key => $value){
            if(array_key_exists($value["code"], $airport_array)){
                $combine_array[$key]["name"] = $airport_array[$value["code"]];
            }
        }

        echo json_encode($combine_array);
    }
}

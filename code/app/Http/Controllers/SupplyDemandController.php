<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\T100;
use App\Models\Airport;
use App\Models\Menu;
use Illuminate\Http\Request;

class SupplyDemandController extends Controller
{

    public $current_menu = "Supply and Demand";

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $coupon = new Coupon();
        $T100 = new T100();
        $Airport = new Airport();

        $total = array();
        $airports = array();
        $routes = array();

        $target = "IAD";

        $DistSeatPass = $T100->getDistSeatPass("t100_seg", $target);
        foreach($DistSeatPass as $e){
            $total[$e->origin.'_'.$e->dest] = array(
                "origin"=>$e->origin,
                "dest"=>$e->dest,
                "dist"=>$e->dist, 
                "seat"=>$e->seat,
                "pass"=>$e->pass
            );
        }
        
        $AvgFare = $coupon->getAvgFare("coupon_2016_3_2", "IAD");
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
            if($e->airport == $target){
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
}

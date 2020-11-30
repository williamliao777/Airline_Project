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

        $total_avgfare = array();
        $airports = array();
        $routes = array();

        $target = "IAD";

        $DistSeat = $T100->getDistSeat("t100_seg", $target);
        $i = 0;
        foreach($DistSeat as $e){
            $total_avgfare[$e->origin.'_'.$e->dest] = array(
                "origin"=>$e->origin,
                "dest"=>$e->dest,
                "dist"=>$e->dist, 
                "seat"=>$e->seat
            );
            $airports[] = "'{$e->origin}'";
            $airports[] = "'{$e->dest}'";
            $routes[] = ["source"=>$e->origin, "target"=>$e->dest, "route_id"=>$i];
            $i++;
        }

        // $AvgFare = $coupon->getAvgFare("coupon_2016_3_2", "IAD");
        // foreach($AvgFare as $e){
        //     $total_avgfare[$e->origin.'_'.$e->dest]["fare"] = $e->fare;
        // }

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
        // $total_avgfare_json = json_encode($total_avgfare);
        // dd($total_avgfare);
        $menus = Menu::all();
        return view('admin.supply_demand', [
            "menus" => $menus,
            "current_menu" => $this->current_menu,
            "airports_json" => $airports_json,
            "routes_json" => $routes_json
            // "total_avgfare_json" => $total_avgfare
        ]);
    }
}

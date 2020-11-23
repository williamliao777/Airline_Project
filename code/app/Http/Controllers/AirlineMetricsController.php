<?php

namespace App\Http\Controllers;

use App\Models\Market;
use App\Models\Menu;
use App\Models\T100;
use Illuminate\Http\Request;

class AirlineMetricsController extends Controller
{

    public $current_menu = "Airline Metrics";

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $t100 = new T100();
        $result = $t100->getSeatAndPassGroupByOrigin();

        //asm chart parse
        $asm_array = array();
        $asm_array['type'] = 'bar';
        $asm_array['options']['scales']['yAxes'][0]['ticks']['beginAtZero'] = true;
        foreach ($result as $asm){
            $asm_array['data']['labels'][] = $asm->CARRIER;
            $asm_array['data']['datasets'][0]['label'] = 'asm';
            $asm_array['data']['datasets'][0]['data'][] = $asm->distance * $asm->seats;
            $asm_array['data']['datasets'][0]['backgroundColor'][] = 'rgba(54, 162, 235, 0.2)';
            $asm_array['data']['datasets'][0]['borderColor'][] = 'rgba(54, 162, 235, 1)';
        }
//        dd(json_encode($asm_array));

        //Cost per Available Seat Mile (CASM) chart parse
        $casm_array = array();

        $menus = Menu::all();
        return view('admin.airline_metrics', [
            "menus" => $menus,
            "current_menu" => $this->current_menu,
            "asm" => json_encode($asm_array)
        ]);
    }
}

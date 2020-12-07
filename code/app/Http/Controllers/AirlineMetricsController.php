<?php

namespace App\Http\Controllers;

use App\Models\Airport;
use App\Models\Form41;
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


    public function index(Request $request)
    {
        $year = $request->year;
        $quarter = $request->quarter;
        $airlines = $request->airline;

        if($year == ""){
            $year = 2016;
        }

        if($quarter == ""){
            $quarter = 3;
        }

        if($airlines == ""){
            $airlines = array(
                "MQ",
                "OH",
                "QX",
                "SY",
                "VX"
            );
        }

        //parse airline array to string
        $airline_group = "";
        foreach ($airlines as $key => $airline){
            if($key == 0){
                $airline_group .= "'{$airline}'";
            }else{
                $airline_group .= ",'{$airline}'";
            }

        }

        $t100 = new T100();
        $form41 = new Form41();

        $t100_result = $t100->getSeatAndPassGroupByAirline($year, $quarter, $airline_group);
        $t100_total = $t100->getTotalPassengerAndSeat($year, $quarter);
        $op_result = $form41->getOpExpenseRevenue($year, $quarter);

        $combined_array = array();
        foreach ($t100_result as $asm){
            $combined_array[$asm->CARRIER]["seats"] = $asm->seats;
            $combined_array[$asm->CARRIER]["distance"] = $asm->distance;
            $combined_array[$asm->CARRIER]["passenger"] = $asm->passenger;
            $combined_array[$asm->CARRIER]["total_seat"] = $t100_total->total_seat;
            $combined_array[$asm->CARRIER]["total_passenger"] = $t100_total->total_seat;
        }

        foreach ($op_result as $op){
            if(array_key_exists($op->CARRIER, $combined_array)){
                $combined_array[$op->CARRIER]["expense"] = $op->expense;
                $combined_array[$op->CARRIER]["revenues"] = $op->revenues;
                $combined_array[$op->CARRIER]["passenger_revenue"] = $op->passenger_revenue;
            }
        }

        //dd($t100_result, $t100_total, $op_result, $combined_array);

        foreach ($combined_array as $key => $value){
            if(!isset($value["expense"])){
                unset($combined_array[$key]);
            }
        }

        //asm chart parse
        $asm_array = array();
        $asm_array['type'] = 'bar';
        $asm_array['options']['scales']['yAxes'][0]['ticks']['beginAtZero'] = true;
        foreach ($combined_array as $carrier => $value){
            $asm_array['data']['labels'][] = $carrier;
            $asm_array['data']['datasets'][0]['label'] = 'Available Seat Mile';
            $asm_array['data']['datasets'][0]['data'][] = $value["distance"] * $value["seats"];
            $asm_array['data']['datasets'][0]['backgroundColor'][] = 'rgba(54, 162, 235, 0.2)';
            $asm_array['data']['datasets'][0]['borderColor'][] = 'rgba(54, 162, 235, 1)';
        }

        //Cost per Available Seat Mile (CASM) chart parse
        $casm_array = array();
        $casm_array['type'] = 'bar';
        $casm_array['options']['scales']['yAxes'][0]['ticks']['beginAtZero'] = true;
        foreach ($combined_array as $carrier => $value){
            $casm_array['data']['labels'][] = $carrier;
            $casm_array['data']['datasets'][0]['label'] = 'Cost per Available Seat Mile';
            $casm_array['data']['datasets'][0]['data'][] = $value["expense"]/($value["distance"] * $value["seats"]);
            $casm_array['data']['datasets'][0]['backgroundColor'][] = 'rgba(255, 206, 86, 0.2)';
            $casm_array['data']['datasets'][0]['borderColor'][] = 'rgba(255, 206, 86, 1)';
        }

        //Revenue per Available Seat Mile (RASM)
        $rasm_array = array();
        $rasm_array['type'] = 'bar';
        $rasm_array['options']['scales']['yAxes'][0]['ticks']['beginAtZero'] = true;
        foreach ($combined_array as $carrier => $value){
            $rasm_array['data']['labels'][] = $carrier;
            $rasm_array['data']['datasets'][0]['label'] = 'Revenue per Available Seat Mile';
            $rasm_array['data']['datasets'][0]['data'][] = $value["revenues"]/($value["distance"] * $value["seats"]);
            $rasm_array['data']['datasets'][0]['backgroundColor'][] = 'rgba(255, 206, 86, 0.2)';
            $rasm_array['data']['datasets'][0]['borderColor'][] = 'rgba(255, 206, 86, 1)';
        }

        //Revenue Passenger Mile (RPM)
        $rpm_array = array();
        $rpm_array['type'] = 'bar';
        $rpm_array['options']['scales']['yAxes'][0]['ticks']['beginAtZero'] = true;
        foreach ($combined_array as $carrier => $value){
            $rpm_array['data']['labels'][] = $carrier;
            $rpm_array['data']['datasets'][0]['label'] = 'Revenue Passenger Mile';
            $rpm_array['data']['datasets'][0]['data'][] = $value["distance"] * $value["passenger"];
            $rpm_array['data']['datasets'][0]['backgroundColor'][] = 'rgba(54, 162, 235, 0.2)';
            $rpm_array['data']['datasets'][0]['borderColor'][] = 'rgba(54, 162, 235, 1)';
        }

        //Load Factor
        $lf_array = array();
        $lf_array['type'] = 'bar';
        $lf_array['options']['scales']['yAxes'][0]['ticks']['beginAtZero'] = true;
        foreach ($combined_array as $carrier => $value){
            if($value["passenger"] == 0){
                continue;
            }
            $lf_array['data']['datasets'][0]['backgroundColor'][] = 'rgba(54, 162, 235, 0.2)';
            $lf_array['data']['datasets'][0]['borderColor'][] = 'rgba(54, 162, 235, 1)';
            $lf_array['data']['datasets'][0]['label'] = 'Load Factor';
            $lf_array['data']['labels'][] = $carrier;
            $lf_array['data']['datasets'][0]['data'][] = $value["passenger"]/$value["seats"];
        }

        //Passenger Yield
        $py_array = array();
        $py_array['type'] = 'bar';
        $py_array['options']['scales']['yAxes'][0]['ticks']['beginAtZero'] = true;
        foreach ($combined_array as $carrier => $value){
            if($value["passenger_revenue"] == 0){
                continue;
            }
            $py_array['data']['labels'][] = $carrier;
            $py_array['data']['datasets'][0]['label'] = 'Passenger Yield';
            $py_array['data']['datasets'][0]['data'][] = $value["passenger_revenue"] / ($value["distance"] * $value["passenger"]);
            $py_array['data']['datasets'][0]['backgroundColor'][] = 'rgba(255, 206, 86, 0.2)';
            $py_array['data']['datasets'][0]['borderColor'][] = 'rgba(255, 206, 86, 1)';
        }

        //Seat capacity share
        $cps_array = array();
        $cps_array['type'] = 'bar';
        $cps_array['options']['scales']['yAxes'][0]['ticks']['beginAtZero'] = true;
        foreach ($combined_array as $carrier => $value){
            $cps_array['data']['labels'][] = $carrier;
            $cps_array['data']['datasets'][0]['label'] = 'Seat Capacity Share';
            $cps_array['data']['datasets'][0]['data'][] = $value["seats"] / $value["total_seat"];
            $cps_array['data']['datasets'][0]['backgroundColor'][] = 'rgba(255, 206, 86, 0.2)';
            $cps_array['data']['datasets'][0]['borderColor'][] = 'rgba(255, 206, 86, 1)';
        }

        //Market share
        $ms_array = array();
        $ms_array['type'] = 'bar';
        $ms_array['options']['scales']['yAxes'][0]['ticks']['beginAtZero'] = true;
        foreach ($combined_array as $carrier => $value){
            if($value["passenger_revenue"] == 0){
                continue;
            }
            $ms_array['data']['labels'][] = $carrier;
            $ms_array['data']['datasets'][0]['label'] = 'Market share';
            $ms_array['data']['datasets'][0]['data'][] = $value["passenger"] / $value["total_passenger"];
            $ms_array['data']['datasets'][0]['backgroundColor'][] = 'rgba(54, 162, 235, 0.2)';
            $ms_array['data']['datasets'][0]['borderColor'][] = 'rgba(54, 162, 235, 1)';
        }



        $menus = Menu::all();
        return view('admin.airline_metrics', [
            "menus" => $menus,
            "current_menu" => $this->current_menu,
            "year" => $year,
            "quarter" => $quarter,
            "asm" => json_encode($asm_array),
            "casm" => json_encode($casm_array),
            "rasm" => json_encode($rasm_array),
            "rpm" => json_encode($rpm_array),
            "lf" => json_encode($lf_array),
            "py" => json_encode($py_array),
            "cps" => json_encode($cps_array),
            "ms" => json_encode($ms_array)
        ]);
    }

    public function getAllCarrierApi(Request $request){

        $year = $request->year;
        $quarter = $request->quarter;

        $form41 = new Form41();
        $result = $form41->getAllCarrierByYearAndQuarter($year, $quarter);

        echo json_encode($result);
    }
}

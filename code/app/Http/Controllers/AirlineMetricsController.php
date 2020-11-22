<?php

namespace App\Http\Controllers;

use App\Models\Market;
use App\Models\Menu;
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

        $menus = Menu::all();
        return view('admin.airline_metrics', [
            "menus" => $menus,
            "current_menu" => $this->current_menu
        ]);
    }
}

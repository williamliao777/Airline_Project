<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
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

        $menus = Menu::all();
        dd($menus);
        return view('admin.airline_metrics', [
            "menus" => $menus,
            "current_menu" => $this->current_menu
        ]);
    }
}

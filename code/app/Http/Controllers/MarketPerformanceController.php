<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MarketPerformanceController extends Controller
{
    //
    public $current_menu = "Market Performance";

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $menus = Menu::all();
        return view('admin.market_performance', [
            "menus" => $menus,
            "current_menu" => $this->current_menu
        ]);
    }
}

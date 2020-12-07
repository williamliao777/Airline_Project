<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Route::middleware(['auth:sanctum', 'verified'])->get('/admin/AirlineMetrics', function () {
//    return view('admin.index');
//})->name('admin_index');

Route::match(['get', 'post'],'/admin/AirlineMetrics', [App\Http\Controllers\AirlineMetricsController::class, 'index'])->name('airlineMetrics');
Route::match(['get', 'post'],'/admin/MarketPerformance', [App\Http\Controllers\MarketPerformanceController::class, 'index'])->name('MarketPerformance');
Route::match(['get', 'post'],'/admin/SupplyAndDemand', [App\Http\Controllers\SupplyDemandController::class, 'index'])->name("supplyDemand");
Route::post('/admin/MarketPerformance/getAllOriginApi', [App\Http\Controllers\MarketPerformanceController::class, 'getAllOriginApi'])->name("getAllOriginApi");
Route::post('/admin/MarketPerformance/getAllDestApi', [App\Http\Controllers\MarketPerformanceController::class, 'getAllDestApi'])->name("getAllDestApi");
Route::post('/admin/MarketPerformance/getAllAirline', [App\Http\Controllers\MarketPerformanceController::class, 'getAllCarrierByOriginAndDestApi'])->name("getAllAirline");
Route::post('/admin/AirlineMetrics/getAllCarrier', [App\Http\Controllers\AirlineMetricsController::class, 'getAllCarrierApi'])->name("getAllCarrier");
Route::post('/admin/SupplyAndDemand/getAllAirport', [App\Http\Controllers\SupplyDemandController::class, 'getAllAirportApi'])->name("getAllAirportApi");
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

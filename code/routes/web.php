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

Route::get('/admin/AirlineMetrics', [App\Http\Controllers\AirlineMetricsController::class, 'index']);
Route::get('/admin/MarketPerformance', [App\Http\Controllers\MarketPerformanceController::class, 'index']);
Route::get('/admin/SupplyAndDemand', [App\Http\Controllers\SupplyAndDemandController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

<?php


use App\Http\Controllers\HostingRatesController;
use App\Http\Controllers\HostingServerController;
use App\Http\Controllers\RatesActivityController;
use App\Http\Controllers\RatesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('hosting-rates-all', [RatesController::class, 'hostingRatesAll']);
Route::get('hosting-rates-offers', [RatesController::class, 'hostingRatesOffers']);
Route::put('rates-change-active/{rateId}', [RatesController::class, 'ratesChangeActive']);
Route::put('rates-change-deactive/{rateId}', [RatesController::class, 'ratesChangeDeactive']);


Route::apiResources([
    'hosting-rates' => HostingRatesController::class,
    'hosting_servers' => HostingServerController::class,
]);

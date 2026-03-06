<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ReservationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/save-customer',[CustomerController::class,'save_customer']);
Route::post('/check-email',[CustomerController::class,'check_email']);
Route::post('/check-email-signup',[CustomerController::class,'check_email_signup']);
Route::post('/check-name',[CustomerController::class,'check_name']);
Route::post('/check-phone',[CustomerController::class,'check_phone']);
Route::post('/check-address',[CustomerController::class,'check_address']);
Route::post('/select-name',[CustomerController::class,'select_name']);
Route::post('/rooms-available',[ReservationController::class,'rooms_available']);
Route::post('/check-reservation',[ReservationController::class,'check_reservation']);
Route::post('/save-reservation',[ReservationController::class,'save_reservation']);

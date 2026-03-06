<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ReservationController;

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
Route::resource('hotel', HotelController::class);
Route::get('/gallery', function () {
    return view('hotel.gallery');
})->name('gallery');
/////////////////////////////////////////////////////////////////////////////////////
Route::resource('customers', CustomerController::class);
Route::get('reserved', [CustomerController::class,'reserved'])->name('reserved');
///////////////////////////////////////////////////////////////////////////////////////
Route::resource('rooms', RoomController::class);
Route::get('available', [RoomController::class,'available'])->name('available');
///////////////////////////////////////////////////////////////////////////////////////
Route::resource('reservations', ReservationController::class);
Route::get('checked', [ReservationController::class,'checked'])->name('checked');
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

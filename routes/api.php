<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TourController;
use App\Http\Controllers\BookingController;

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

Route::post('create-tour',[TourController::class,'createTour']);
Route::get('get-tour',[TourController::class,'getTourList']);
Route::get('show-tour-details/{id}',[TourController::class,'showTourDetails']);
Route::post('booking-date-status-update',[TourController::class,'UpdateDateStatus']);
Route::post('update-tour',[TourController::class,'UpdateTourInformation']);



Route::get('get-dates/{id}',[BookingController::class,'getAvailableDates']);
Route::post('book-passenger',[BookingController::class,'BookingProcess']);
Route::post('show-passengers',[BookingController::class,'ShowAllPassengers']);

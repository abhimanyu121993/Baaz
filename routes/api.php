<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('user-login', [AuthController::class, 'userLogin']);

//User Routes
Route::post('user-profile/{id}', [UserController::class, 'userProfile']);
Route::post('update-profile/{id}', [UserController::class, 'updateProfile']);


//Home Routes
Route::post('fetch-brand', [HomeController::class, 'brand']);
Route::post('fetch-brand-model', [HomeController::class, 'brandModel']);
Route::post('fetch-slider', [HomeController::class, 'slider']);
Route::post('fetch-offer-banner', [HomeController::class, 'offerBanner']);
Route::post('fetch-fuel-type', [HomeController::class, 'fuelType']);
Route::post('fetch-category', [HomeController::class, 'category']);
Route::post('fetch-services', [HomeController::class, 'services']);

Route::post('user-vehicle-map', [UserController::class, 'userVehicleMap']);
Route::post('fetch-vehicles', [UserController::class, 'userVehicles']);

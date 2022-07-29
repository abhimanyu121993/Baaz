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
Route::get('user-profile/{id}', [UserController::class, 'userProfile']);
Route::post('update-profile/{id}', [UserController::class, 'updateProfile']);


//Home Routes
Route::post('fetch-company', [HomeController::class, 'company']);
Route::post('fetch-company-model', [HomeController::class, 'companyModel']);
Route::get('fetch-slider', [HomeController::class, 'slider']);
Route::get('fetch-offer-banner', [HomeController::class, 'offerBanner']);
Route::post('fetch-fuel-type', [HomeController::class, 'fuelType']);
Route::get('fetch-category', [HomeController::class, 'category']);
Route::get('fetch-services', [HomeController::class, 'services']);

Route::post('user-vehicle-map', [UserController::class, 'userVehicleMap']);
Route::post('fetch-vehicles', [UserController::class, 'userVehicles']);

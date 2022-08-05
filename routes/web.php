<?php

use App\Http\Controllers\Admin\BrandController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ModelController;
use App\Http\Controllers\Admin\FuelTypeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\HomeSliderController;
use App\Http\Controllers\Admin\OrderHistoryController;
use Illuminate\Support\Facades\Artisan;

Route::get('/', function () {
    return view('welcome');
});
Route::get('admin',[AdminController::class,'admin'])->name('admin');
Route::post('adminlogin',[AdminController::class,'login'])->name('login');

Route::group(['prefix'=>'Backend','as'=>'Backend.'],function(){
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::post('logout',[AdminController::class,'logout'])->name('logout');

    Route::resource('brand',BrandController::class);
    Route::resource('model',ModelController::class);
    Route::resource('fueltype',FuelTypeController::class);
    Route::resource('category',CategoryController::class);
    Route::resource('service',ServiceController::class);
    Route::resource('homeslider',HomeSliderController::class);
    Route::resource('orderhistory',OrderHistoryController::class);

    Route::get('user-list',[AdminController::class,'userList'])->name('userList');
});


Route::get('/optimize', function(){
    Artisan::call('optimize');
});
Route::get('/optimize-clear', function(){
    Artisan::call('optimize:clear');
});

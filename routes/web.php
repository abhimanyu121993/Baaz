<?php

use App\Http\Controllers\Admin\BrandController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ModelController;
use App\Http\Controllers\Admin\FuelTypeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ServiceController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('admin',[AdminController::class,'admin'])->name('admin');
Route::post('adminlogin',[AdminController::class,'login'])->name('login');

Route::group(['prefix'=>'Backend','as'=>'Backend.'],function(){
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('logout',[AdminController::class,'logout'])->name('logout');

    Route::resource('brand',BrandController::class);
    Route::resource('model',ModelController::class);
    Route::resource('fueltype',FuelTypeController::class);
    Route::resource('category',CategoryController::class);
    Route::resource('service',ServiceController::class);

    Route::get('user-list',[AdminController::class,'userList'])->name('userList');
});

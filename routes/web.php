<?php

use App\Http\Controllers\Admin\BrandController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;


Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'Backend','as'=>'Backend.'],function(){
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('logout',[AdminController::class,'logout'])->name('logout');

    Route::resource('brand',BrandController::class);
});

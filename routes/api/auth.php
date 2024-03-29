<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\Auth\LoginController;
use App\Http\Controllers\Api\V1\Auth\RegisterController;
use App\Http\Controllers\Api\V1\Auth\SocialiteController;


Route::controller(LoginController::class)->group(function (){
   Route::post('/login', 'login')->name('login');
});

Route::controller(RegisterController::class)->group(function (){
    Route::post('/register', 'register')->name('register');
});

Route::controller(SocialiteController::class)->group(function (){
    Route::post('/handleProviderCallback', 'handleProviderCallback')->name('login');
});

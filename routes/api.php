<?php

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\LogoutController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\Auth\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::prefix('auth')->group(function(){
    Route::get('/user',[UserController::class, 'user'])->middleware('auth:sanctum');
    Route::post('/login',[LoginController::class,'login']);
    Route::post('/register',[RegisterController::class,'register']);
    Route::get('/logout',[LogoutController::class, 'logout'])->middleware('auth:sanctum');
});

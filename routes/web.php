<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index']);
Route::get('register',[AuthController::class, 'showRegister']);
Route::post('register',[AuthController::class, 'register']);
Route::get('login', [AuthController::class, 'showlogin']);
Route::post('login', [AuthController::class, 'login']);

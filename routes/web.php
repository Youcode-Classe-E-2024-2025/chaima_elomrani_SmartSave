<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TransactionsController;
use App\Http\Controllers\ProfileController;
use App\Models\Transactions;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index']);
Route::get('register',[AuthController::class, 'showRegister']);
Route::post('register',[AuthController::class, 'register']);
Route::get('login', [AuthController::class, 'showlogin']);
Route::post('login', [AuthController::class, 'login']);
Route::get('first',[ProfileController::class, 'index']);
Route::get('logout',[AuthController::class , 'logout']);

// profiles 
Route::get('/profile/{id}', [ProfileController::class, 'show'])->name('profile.show');
Route::get('/profile.create', [ProfileController::class, 'showCreateForm'])->name('profile.create.form');
Route::post('/profile.create', [ProfileController::class, 'create'])->name('profile.create');


//category crud

// Category routes
Route::get('/categories', [CategoryController::class, 'index']);
Route::post('/categories', [CategoryController::class, 'create']);
Route::delete('/categories/{id}', [CategoryController::class, 'delete'])->name('category.delete');



// transactions routes 

// Route::get('/dashboard', [TransactionsController::class, 'index']);
// Route::post('/dashboard', [TransactionsController::class, 'create']);
// Route::delete('/dashboard/{id}', [TransactionsController::class, 'delete']);

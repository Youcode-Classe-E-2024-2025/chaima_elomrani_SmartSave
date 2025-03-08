<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GoalController;
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
Route::delete('profile/{id}',[ProfileController::class , 'delete'])->name('profile.delete');
Route::get('/showDashboard', [ProfileController::class , 'showDashboard' ]);


// dashboard/transactions
Route::get('/transactions', [TransactionsController::class, 'index']);
Route::delete('transactions/{id}',[TransactionsController::class, 'delete'])->name('transaction.delete');
Route::post('transactions',[TransactionsController::class , 'create'])->name('transaction.create');
Route::get('/profiles/select/{id}', [ProfileController::class, 'select'])->name('profile.select');


// Route for displaying the goals (GET)
Route::get('/goals', [GoalController::class, 'index'])->name('goals.index');
Route::post('/goals', [GoalController::class, 'create'])->name('goals.create');
Route::post('/goals/{goal}/add-funds', [GoalController::class, 'addFunds'])->name('goals.add-funds');
Route::post('/goals/budget-recommendations', [GoalController::class, 'getBudgetRecommendations'])->name('goals.budget-recommendations');
Route::get('/goals/export/csv', [GoalController::class, 'exportCsv'])->name('goals.export.csv');
Route::get('/goals/export/pdf', [GoalController::class, 'exportPdf'])->name('goals.export.pdf');


// categories
Route::get('/categories',[CategoryController::class, 'index']);
Route::post('/categories',[CategoryController::class, 'store']);

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataMasterController;
use App\Http\Controllers\TransactionController;


Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/register', [AuthController::class, 'register'])->middleware('guest');
Route::post('/register', [AuthController::class, 'store']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::get('/data-master', [DataMasterController::class, 'index']);
Route::get('/add-master', [DataMasterController::class, 'add']);
Route::post('/add-master', [DataMasterController::class, 'store']);
Route::get('/data-master-edit/{$id}', [DataMasterController::class, 'edit']);


Route::get('/transaction', [TransactionController::class, 'index']);
Route::get('/input-transaction', [TransactionController::class, 'input']);
Route::get('/exchange-transaction', [TransactionController::class, 'exchange']);

Route::get('/employee', [EmployeeController::class, 'index']);
Route::get('/add-employee', [EmployeeController::class, 'add']);

Route::get('/report', [ReportController::class, 'index']);
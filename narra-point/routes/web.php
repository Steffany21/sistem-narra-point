<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
use App\Http\Controllers\reportController;
use App\Http\Controllers\sessionController;
use App\Http\Controllers\employeeController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\membershipController;
use App\Http\Controllers\transactionController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('dashboard', [dashboardController::class, 'index']);

Route::resource('data_master', adminController::class);

Route::resource('employee',employeeController::class);

Route::get('login', [sessionController::class, 'index']);
Route::post('session/login', [sessionController::class, 'login']);
Route::post('logout', [sessionController::class, 'logout']);

Route::get('register', [sessionController::class, 'register']);
Route::post('session/register', [sessionController::class, 'create']);

Route::get('transaction', [transactionController::class, 'index']);
Route::get('transaction/create', [transactionController::class, 'create']);
Route::get('transaction/get', [transactionController::class, 'getCustomerName']);
Route::post('transaction/store', [transactionController::class, 'store'] );

Route::get('membership', [adminController::class, 'membershipTiers']);



Route::get('report', [reportController::class, 'index']);
Route::get('report/print', [reportController::class, 'print']);
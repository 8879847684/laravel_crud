<?php

use App\Http\Controllers\BillsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\VehiclesController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\VpsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('/', LoginController::class);
Route::resource('login', LoginController::class);
Route::post('login/logout', [LoginController::class, 'logout'])->name('login.logout');
Route::resource('dashboard', DashboardController::class);
Route::resource('vendors', VendorController::class);
Route::resource('vps', VpsController::class);
Route::resource('bills', BillsController::class);
Route::resource('vehicles', VehiclesController::class);
Route::resource('payments', PaymentsController::class);
Route::resource('vendorsapi', VendorApiController::class);



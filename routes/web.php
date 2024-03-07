<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BE\AuthController;
use App\Http\Controllers\BE\DashboardController;
use App\Http\Controllers\Ajax\DashboardController as AjaxDashboardController;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\AuthenticateMiddleware;
use App\Http\Middleware\LoginMiddleware;
use App\Http\Controllers\BE\UserController;
use App\Http\Controllers\Ajax\LocationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// User route
Route::group(['prefix' => 'user'],function () {
    Route::get('index', [UserController::class, 'index'])->name('auth.user')->middleware('admin');
    Route::get('create', [UserController::class, 'create'])->name('user.create')->middleware('admin');
    Route::post('store', [UserController::class, 'store'])->name('user.store')->middleware('admin');
    Route::get('{id}/edit', [UserController::class, 'edit'])->where(['id'=>'[0-9]+'])->name('user.edit')->middleware('admin');
    Route::put('{id}/update', [UserController::class, 'update'])->where(['id'=>'[0-9]+'])->name('user.update')->middleware('admin');
    Route::get('{id}/delete', [UserController::class, 'delete'])->where(['id'=>'[0-9]+'])->name('user.delete')->middleware('admin');
    Route::delete('{id}/destroy', [UserController::class, 'destroy'])->where(['id'=>'[0-9]+'])->name('user.destroy')->middleware('admin');
});

// Ajax
Route::get('ajax/location/getLocation',[LocationController::class, 'getLocation']) -> name('ajax.location.index') -> middleware('admin');
Route::post('ajax/dashboard/changeStatus',[AjaxDashboardController::class, 'changeStatus']) -> name('ajax.dashboard.changeStatus') -> middleware('admin');


// Backend route
Route::get('dashboard/index',[DashboardController::class, 'index']) -> name('dashboard.index') -> middleware('admin');
Route::get('admin', [AuthController::class, 'index'])-> name('auth.admin')->middleware('login');
Route::post('login', [AuthController::class, 'login'])-> name('auth.login');
Route::get('logout', [AuthController::class, 'logout'])-> name('auth.logout');

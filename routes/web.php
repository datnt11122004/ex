<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BE\AuthController;
use App\Http\Controllers\BE\DashboardController;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\AuthenticateMiddleware;
use App\Http\Middleware\LoginMiddleware;
use App\Http\Controllers\BE\UserController;

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

});


// Backend route
Route::get('dashboard/index',[DashboardController::class, 'index']) -> name('dashboard.index') -> middleware('admin');
Route::get('admin', [AuthController::class, 'index'])-> name('auth.admin')->middleware('login');
Route::post('login', [AuthController::class, 'login'])-> name('auth.login');
Route::get('logout', [AuthController::class, 'logout'])-> name('auth.logout');

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
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

Route::get('/',[HomeController::class,'index']);

Route::get('/trang-chu',[HomeController::class,'index']);

//Admin
Route::get('/sc_admin', [AdminController::class,'index']);
Route::get('/sc_admin/dashboard', [AdminController::class,'showdashboard']);
Route::post('/sc_admin-dashboard', [AdminController::class,'dashboard']);
Route::get('/sc_admin-logout', [AdminController::class,'logout']);

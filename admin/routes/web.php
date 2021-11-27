<?php
/**
 * @Author: Md Nazmus Shakib
 * @Date:   2021-11-16 21:59:08
 * @Last Modified by:   Md Nazmus Shakib
 * @Last Modified time: 2021-11-27 13:16:25
 */

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\VisitorController;

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

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/visitor',[VisitorController::class,'index'])->name('visitor');


// Admin Panel Service mangement
Route::get('/service',[ServiceController::class,'index'])->name('service');
Route::get('/getServiceData',[ServiceController::class,'show'])->name('getService');
Route::post('/serviceDelete',[ServiceController::class,'destroy']);
Route::post('/serviceDetails',[ServiceController::class,'edit']);
Route::post('/serviceUpdate',[ServiceController::class,'update']);

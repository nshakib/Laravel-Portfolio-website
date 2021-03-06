<?php
/**
 * @Author: Md Nazmus Shakib
 * @Date:   2021-11-15 22:15:42
 * @Last Modified by:   Md Nazmus Shakib
 * @Last Modified time: 2022-01-18 00:18:55
 */

use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class,'index'])->name('home') ;
Route::post('/ContactSend', [HomeController::class,'ContactSend']);

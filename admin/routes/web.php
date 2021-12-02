<?php
/**
 * @Author: Md Nazmus Shakib
 * @Date:   2021-11-16 21:59:08
 * @Last Modified by:   Md Nazmus Shakib
 * @Last Modified time: 2021-12-02 00:50:22
 */

use App\Http\Controllers\CoursesController;
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
Route::post('/serviceAdd',[ServiceController::class,'store']);

//admin panel courses management
Route::get('/courses',[CoursesController::class,'index'])->name('courses');
Route::get('/courses/data',[CoursesController::class,'getCourseData'])->name('courses-data');
Route::get('/courses/details',[CoursesController::class,'getCourseDetails'])->name('courses-details');
Route::get('/courses/delete',[CoursesController::class,'CourseDelete'])->name('courses-delete');
Route::get('/courses/update',[CoursesController::class,'CourseUpdate'])->name('courses-update');
Route::get('/courses/add',[CoursesController::class,'CourseAdd'])->name('courses-add');

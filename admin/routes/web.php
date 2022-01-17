<?php
/**
 * @Author: Md Nazmus Shakib
 * @Date:   2021-11-16 21:59:08
 * @Last Modified by:   Md Nazmus Shakib
 * @Last Modified time: 2022-01-13 00:02:07
 */

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\testController;
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
Route::get('/courses/getData',[CoursesController::class,'getCourseData']);
Route::post('/courses/details',[CoursesController::class,'getCourseDetails']);
Route::post('/coursesDelete',[CoursesController::class,'CourseDelete']);
Route::post('/courses/update',[CoursesController::class,'CourseUpdate']);
Route::post('/coursesAddData',[CoursesController::class,'CourseAdd']);

//admin panel project management
Route::get('/projects', [ProjectController::class,'projectIndex'])->name('projects');

Route::get('/getProjectData',[ProjectController::class,'getProjectData']);

Route::post('/projectDetails',[ProjectController::class,'getProjectDetails']);
Route::post('/projectAdd',    [ProjectController::class,'projectAdd']);
Route::post('/projectUpdate', [ProjectController::class,'projectUpdate']);
Route::post('/projectDelete', [ProjectController::class,'projectDelete']);


//test
Route::get('/testData', [testController::class,'index'])->name('test');
Route::get('/getTestData',[testController::class,'getTestData']);

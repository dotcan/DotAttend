<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\ClassScheduleController;
use App\Http\Controllers\ConductedClassController;
use App\Http\Controllers\CourseClassController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\RFIDScannerController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::view('/', 'admin.dashboard')->name('dashboard');
Route::resource('rfid', RFIDScannerController::class, ['except' => ['store']]);
Route::resource('users', UserController::class);
Route::resource('cards', CardController::class, ['except' => ['show', 'edit']]);
Route::resource('attendances', AttendanceController::class, ['except' => 'show']);

Route::resource('courses', CourseController::class);
Route::resource('classes', CourseClassController::class);
Route::resource('schedules', ClassScheduleController::class);
Route::resource('sessions', ConductedClassController::class);
Route::resource('enrollments', EnrollmentController::class);


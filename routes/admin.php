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

Route::prefix('course')->name('indexes.')->group(function () {
    Route::get('classes', [CourseClassController::class, 'indexo'])->name('class');
    Route::get('schedules', [ClassScheduleController::class, 'indexo'])->name('schedule');
    Route::get('sessions', [ConductedClassController::class, 'indexo'])->name('session');
    Route::get('enrollments', [EnrollmentController::class, 'indexo'])->name('enrollment');
});

Route::resource('courses', CourseController::class);
Route::resource('courses/{course}/classes', CourseClassController::class);
Route::resource('courses/{course}/classes/{class}/schedules', ClassScheduleController::class);
Route::resource('courses/{course}/classes/{class}/schedules/{schedule}/sessions', ConductedClassController::class);
Route::resource('courses/{course}/classes/{class}/schedules/{schedule}/enrollments', EnrollmentController::class);


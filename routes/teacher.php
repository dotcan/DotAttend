<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ClassScheduleController;
use App\Http\Controllers\ConductedClassController;

Route::view('', 'teacher.dashboard')->name('dashboard');
Route::resource('schedules', ClassScheduleController::class, ['only' => ['index', 'show']]);
Route::resource('sessions', ConductedClassController::class, ['only' => ['index', 'show']]);
Route::resource('attendances', AttendanceController::class, ['only' => ['index', 'edit', 'update']]);

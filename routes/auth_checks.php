<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ClassScheduleController;
use Illuminate\Support\Facades\Route;

Route::resource('attendances', AttendanceController::class, ['except' => ['create', 'edit']]);
Route::resource('schedules', ClassScheduleController::class);

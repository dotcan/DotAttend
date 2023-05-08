<?php

Route::view('', 'teacher.dashboard')->name('dashboard');
Route::get('schedules', [App\Http\Controllers\ClassScheduleController::class, 'index'])->name('schedules.index');

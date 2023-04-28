<?php

use App\Http\Controllers\API\v1\AttendanceController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\RFIDScannerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::apiResource('attendances', AttendanceController::class, ['only' => ['index', 'store']]);

Route::prefix('cards')->name('cards.')->group(function () {
    Route::get('/{card:rfid_tag}', [CardController::class, 'show'])->name('show');
    Route::post('/', [CardController::class, 'store'])->name('store');
});

Route::prefix('rfid')->name('rfid.')->group(function () {
    Route::get('/{rfid:esp_id}', [RFIDScannerController::class, 'show'])->name('show');
    Route::post('/', [RFIDScannerController::class, 'store'])->name('store');
});

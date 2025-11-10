<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => [],
], function () {
    Route::get('/guides', [\App\Http\API\Controllers\GuideController::class, 'list']);
    Route::post('/bookings', [\App\Http\API\Controllers\BookingController::class, 'create']);
});

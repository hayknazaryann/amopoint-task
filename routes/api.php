<?php

use App\Http\Controllers\Api\VisitorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('visitors', [VisitorController::class, 'store']);
Route::get('visitors-by-hours', [VisitorController::class, 'visitorsByHours']);
Route::get('visitors-by-city', [VisitorController::class, 'visitorsByCity']);

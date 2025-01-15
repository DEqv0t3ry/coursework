<?php

use App\Http\Controllers\IntervieweeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PoliticianController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('interviewees')->group(function () {
    // Добавление опрашиваемого
    Route::post('/add', [IntervieweeController::class, 'store']);
});

Route::prefix('politicians')->group(function () {
    // Добавление политика
    Route::post('/add', [PoliticianController::class, 'store']);
});

Route::prefix('orders')->group(function () {
    // Добавление наказа
    Route::post('/add', [OrderController::class, 'store']);
});

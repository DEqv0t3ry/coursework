<?php

use App\Http\Controllers\IntervieweeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PoliticianController;
use App\Http\Controllers\TerritoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('interviewees')->group(function () {
    // Добавление опрашиваемого
    Route::post('/add', [IntervieweeController::class, 'store']);
    // Количество по возврастным группам
    Route::get('/age-groups', [IntervieweeController::class, 'ageGroups']);
});

Route::prefix('politicians')->group(function () {
    // Добавление политика
    Route::post('/add', [PoliticianController::class, 'store']);
    // 10 самых популярных политиков
    Route::get('/most-popular', [PoliticianController::class, 'popular']);
    // Поплитики, популярные у возрастной категории
    Route::get('/popular-by-age', [PoliticianController::class, 'popularByAge']);
    // Поплитики, одинаково популярные у мужчин и у женщин
    Route::get('/popular-by-gender', [PoliticianController::class, 'popularByGender']);
    // Политики с количеством наказов и популярностью
    Route::get('/popular-by-orders', [PoliticianController::class, 'popularByOrders']);
    // Политики с количеством нахождений на первом месте
    Route::get('/first-place-in-interview', [PoliticianController::class, 'firstPlaceInInterview']);
    // Политики, упоминаемые хотя бы раз всеми возрастными группами
    Route::get('/with-every-age-groups', [PoliticianController::class, 'withEveryAgeGroups']);
});

Route::prefix('orders')->group(function () {
    // Добавление наказа
    Route::post('/add', [OrderController::class, 'store']);
});

Route::prefix('territories')->group(function () {
    // Добавление территории
    Route::post('/add', [TerritoryController::class, 'store']);
    // Список территорий с пополярностью политиков
    Route::get('/popular', [TerritoryController::class, 'popular']);
});

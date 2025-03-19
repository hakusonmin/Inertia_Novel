<?php

use App\Http\Controllers\User\ArticleController;
use App\Http\Controllers\User\ChapterController;
use App\Http\Controllers\User\NovelController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::resource('novels', NovelController::class);

    Route::prefix('novels/{novel}')->group(function () {
        Route::resource('chapters', ChapterController::class);
    });

    Route::prefix('chapters/{chapter}')->group(function () {
        Route::resource('articles', ArticleController::class);
    });
});

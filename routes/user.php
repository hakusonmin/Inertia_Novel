<?php

use App\Http\Controllers\User\ArticleController;
use App\Http\Controllers\User\ChapterController;
use App\Http\Controllers\User\NovelController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::resource('novels', NovelController::class);

Route::prefix('novels/{novel}')->group(function () {
    Route::resource('chapters', ChapterController::class)->except('create', 'edit');
});

Route::prefix('chapters/{chapter}')->group(function () {
    Route::resource('articles', ArticleController::class)->except('create', 'edit');
});

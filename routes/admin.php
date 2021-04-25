<?php

use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'role:Teacher|Super Admin'])->prefix('admin')->group(function () {
    Route::get('/', [PageController::class, 'dashboard']);
    Route::prefix('posts')->group(function () {
        Route::get('/', [PostController::class, 'index']);
    });
    Route::prefix('tags')->group(function () {
        Route::get('/', [TagController::class, 'index']);
        Route::get('/create', [TagController::class, 'create']);
        Route::post('/', [TagController::class, 'store']);
    });
});
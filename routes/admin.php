<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'role:Teacher|Super Admin'])->prefix('admin')->group(function () {
    Route::get('/', [PageController::class, 'dashboard']);
    Route::prefix('posts')->group(function () {
        Route::get('/', [PostController::class, 'index']);
        Route::get('/create', [PostController::class, 'create']);
        Route::post('/', [PostController::class, 'store']);
        Route::get('/{id}/edit', [PostController::class, 'edit']);
        Route::put('/{id}', [PostController::class, 'update']);
        Route::put('/{id}/update-status', [PostController::class, 'updateStatus']);
        Route::delete('/{id}', [PostController::class, 'destroy']);
    });
    Route::prefix('tags')->middleware('role:Super Admin')->group(function () {
        Route::get('/', [TagController::class, 'index']);
        Route::get('/create', [TagController::class, 'create']);
        Route::post('/', [TagController::class, 'store']);
        Route::get('/{id}/edit', [TagController::class, 'edit']);
        Route::put('/{id}', [TagController::class, 'update']);
        Route::delete('/{id}', [TagController::class, 'destroy']);
    });
    Route::prefix('categories')->middleware('role:Super Admin')->group(function () {
        Route::get('/', [CategoryController::class, 'index']);
        Route::get('/create', [CategoryController::class, 'create']);
        Route::post('/', [CategoryController::class, 'store']);
        Route::get('/{id}/edit', [CategoryController::class, 'edit']);
        Route::put('/{id}', [CategoryController::class, 'update']);
        Route::delete('/{id}', [CategoryController::class, 'destroy']);
    });
});
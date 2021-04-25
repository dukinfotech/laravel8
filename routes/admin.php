<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'role:Teacher|Super Admin'])->group(function () {
    Route::get('/admin', [PageController::class, 'dashboard']);
});
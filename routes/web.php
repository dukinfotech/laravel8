<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use UniSharp\LaravelFilemanager\Lfm;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PageController::class, 'home']);
Route::get('/demo-dompdf', [PageController::class, 'dompdf']);
Route::get('/demo-laravel-excel', [PageController::class, 'laravelexcel']);

require __DIR__.'/auth.php';

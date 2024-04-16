<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BookController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::get("/test-me", [BookController::class, 'show_table']);

Route::get("/search", [BookController::class, 'search']);

Route::post('/books/purchase/{id}', [BookController::class, 'purchase']);

Route::get('/top10', [BookController::class, 'top10']);
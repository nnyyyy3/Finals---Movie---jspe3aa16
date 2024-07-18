<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\DirectorController;
use App\Http\Controllers\ActorController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\AuthController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/movies', [MovieController::class, 'index']);
    Route::get('/movies/{id}', [MovieController::class, 'show']);
    Route::get('/directors/{id}', [DirectorController::class, 'show']);
    Route::get('/actors/{id}', [ActorController::class, 'show']);
    Route::get('/genres', [GenreController::class, 'index']);
    Route::get('/ratings', [RatingController::class, 'index']);
});

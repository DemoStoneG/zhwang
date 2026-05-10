<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScoreController;

Route::get('/scores', [ScoreController::class, 'index'])->name('scores.index');
Route::post('/scores', [ScoreController::class, 'store'])->name('scores.store');
Route::put('/scores/{id}', [ScoreController::class, 'update'])->name('scores.update');
Route::delete('/scores/{id}', [ScoreController::class, 'destroy'])->name('scores.destroy');

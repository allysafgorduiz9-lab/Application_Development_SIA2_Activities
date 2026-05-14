<?php

use App\Http\Controllers\RecipeController;
use Illuminate\Support\Facades\Route;

// The page where the form lives
Route::get('/form', [RecipeController::class, 'create']);

// The route that handles the "POST" submission
Route::post('/form', [RecipeController::class, 'store']);
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuggestionController;

Route::get('/', function () {
    return redirect()->route('suggestions.index');
});

Route::resource('suggestions', SuggestionController::class);
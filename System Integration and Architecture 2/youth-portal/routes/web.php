<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http; 
use App\Models\User; 

Route::get('/', function () {
    return view('welcome');
});

// --- USER DASHBOARD ---
Route::get('/dashboard', function () {
    // 1. Fetch Youth Unemployment Statistics from World Bank Public API
    $response = Http::get('https://api.worldbank.org/v2/country/PH/indicator/SL.UEM.1524.ZS?format=json');
    $unemploymentData = $response->json()[1] ?? [];

    // 2. Fetch all registered youth
    $registeredYouth = User::all();

    return view('dashboard', [
        'stats' => $unemploymentData,
        'youthMembers' => $registeredYouth
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

// --- ADMIN DASHBOARD (Challenge Requirement) ---
Route::get('/admin/dashboard', function () {
    // 1. Fetch the same API stats for the admin
    $response = Http::get('https://api.worldbank.org/v2/country/PH/indicator/SL.UEM.1524.ZS?format=json');
    $unemploymentData = $response->json()[1] ?? [];

    // 2. Fetch all registered youth
    $registeredYouth = User::all();

    // FIXED: Pointing to the new 'admin-dashboard' blade file
    return view('admin-dashboard', [
        'stats' => $unemploymentData,
        'youthMembers' => $registeredYouth
    ]);
})->middleware(['auth'])->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
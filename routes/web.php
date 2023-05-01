<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/my-dashboard', [App\Http\Controllers\PageController::class, 'viewDashboard'])->name('viewDashboard');
Route::get('/calories-calculator', [App\Http\Controllers\PageController::class, 'viewCaloriesCalculator'])->name('viewCaloriesCalculator');
Route::get('/cal', [App\Http\Controllers\PageController::class, 'calCal'])->name('calCal');
Route::post('/calories-calculator/count', [App\Http\Controllers\PageController::class, 'countCalories'])->name('countCalories');
Route::get('/calories-consumption-calculator', [App\Http\Controllers\PageController::class, 'viewCaloriesConsumptionCalculator'])->name('viewCaloriesConsumptionCalculator');
Route::post('/calories-consumption-calculator', [App\Http\Controllers\PageController::class, 'calculateCalories'])->name('calculateCalories');
Route::get('/delete-meal/{id}', [App\Http\Controllers\PageController::class, 'deleteMeal'])->name('deleteMeal');
Route::get('/getFoods', [App\Http\Controllers\PageController::class, 'getFoods'])->name('getFoods');
require __DIR__.'/auth.php';

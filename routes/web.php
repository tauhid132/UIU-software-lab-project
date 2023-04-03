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

Route::get('/calories-calculator', [App\Http\Controllers\PageController::class, 'viewCaloriesCalculator'])->name('viewCaloriesCalculator');
Route::get('/calories-consumption-calculator', [App\Http\Controllers\PageController::class, 'viewCaloriesConsumptionCalculator'])->name('viewCaloriesConsumptionCalculator');
Route::get('/getFoods', [App\Http\Controllers\PageController::class, 'getFoods'])->name('getFoods');
require __DIR__.'/auth.php';

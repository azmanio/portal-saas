<?php

use App\Http\Controllers\FeatureController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
});

Route::resource('user', UserController::class);

Route::resource('module', ModuleController::class);

Route::resource('feature', FeatureController::class);

Route::resource('plan', PlanController::class);

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/user/{user}/edit/status', [UserController::class, 'toggleStatus'])->name('user.toggleStatus');
Route::get('/module/{module}/edit/status', [ModuleController::class, 'toggleStatus'])->name('module.toggleStatus');
Route::get('/feature/{feature}/edit/status', [FeatureController::class, 'toggleStatus'])->name('feature.toggleStatus');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
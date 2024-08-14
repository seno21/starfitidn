<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Route;

// FRONTEND - Route untuk Landing (Tanpa Login)

Route::get('/', [LandingController::class, 'index'])->name('home');

Route::get('/event', [LandingController::class, 'allEvent'])->name('event');



Route::get('/gallery', function () {
    return view('frontend.gallery');
})->name('gallery');


// BACKEND - Route untuk Admin (Perlu Login)

Route::middleware(['auth', 'verified'])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/list-akun', [UserController::class, 'index'])->name('list-akun');
    Route::post('/ganti-role', [UserController::class, 'update'])->name('ganti-role');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route untuke Event Organizer Management
Route::group([
    'middleware' => 'auth',
    'prefix' => 'event',
    'as' => 'event.'
], function () {
    Route::resource('eom', EventController::class);
    Route::get('tiket', [EventController::class, 'insertTiket'])->name('eom.insertTiket');
});




require __DIR__ . '/auth.php';

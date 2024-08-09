<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// FRONTEND - Route untuk Landing (Tanpa Login)

Route::get('/', function () {
    return view('frontend.landing');
})->name('home');

Route::get('/event', function () {
    return view('frontend.event');
})->name('event');

Route::get('/gallery', function () {
    return view('frontend.gallery');
})->name('gallery');


// BACKEND - Route untuk Admin (Perlu Login)

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
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
});




require __DIR__ . '/auth.php';

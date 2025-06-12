<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ProfitController;
use App\Http\Controllers\TransaksiTiketController;
use App\Http\Controllers\WithdrawController;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsUser;
use App\Models\Profits;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

// FRONTEND - Route untuk Landing (Tanpa Login)

Route::get('/', [LandingController::class, 'index'])->name('home');
Route::get('/event', [LandingController::class, 'allEvent'])->name('event');
Route::get('/event/detail/{id}', [LandingController::class, 'showEvent'])->name('show.event');
Route::get('/gallery', [LandingController::class, 'allGallery'])->name('gallery');


// BACKEND - Route untuk Admin (Perlu Login)

Route::middleware(IsAdmin::class)->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/list-akun', [UserController::class, 'index'])->name('list-akun');
    Route::post('/ganti-role', [UserController::class, 'update'])->name('ganti-role');

    /*
    ---------------------------------------------------------------------------
    *  Route untuk Profile Management
    ---------------------------------------------------------------------------
     */
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('event')->name('event.')->group(function () {
        Route::resource('eom', EventController::class);
        Route::get('eom/peserta/{id}', [EventController::class, 'peserta'])->name('eom.peserta');
        Route::get('eom/kategori/{id}', [EventController::class, 'kategori'])->name('eom.kategori');

        Route::post('tiket', [EventController::class, 'insertTiket'])->name('eom.insertTiket');
        Route::post('tiketDel/{id}', [EventController::class, 'removeTiket'])->name('eom.removeTiket');
        Route::put('updateTiket/{id}', [EventController::class, 'updateTiket'])->name('eom.updateTiket');

        Route::post('kategori', [EventController::class, 'insertKategori'])->name('eom.insertKategori');
        Route::post('kategoriDel/{id}', [EventController::class, 'removeKategori'])->name('eom.removeKategori');
        Route::put('updateKategori/{id}', [EventController::class, 'updateKategori'])->name('eom.updateKategori');
        Route::post('del/{id}', [EventController::class, 'remove'])->name('eom.remove');
    });


    Route::prefix('profit')->name('profit.')->group(function () {
        Route::get('profit/', [ProfitController::class, 'index'])->name('index');
    });

    // Ini contoh jika middleware nya dalam bentuk array
    Route::prefix('gallery')->name('gallery.')->group(function () {
        Route::resource('img', GalleryController::class);
        Route::get('download/{id}', [GalleryController::class, 'downloadImg'])->name('img.download');
    });
});

Route::middleware(IsUser::class)->group(function () {
    Route::post('/transaksi', [TransaksiTiketController::class, 'store'])->name('transaksi');
    Route::post('/cancel-pesanan', [TransaksiTiketController::class, 'cancel'])->name('cancel-pesanan');
    Route::post('/checkout', [TransaksiTiketController::class, 'checkout'])->name('checkout');
});

/*
---------------------------------------------------------------------------
*  Route untuk WebHook Payment Gateway
---------------------------------------------------------------------------
 */
Route::post('/paidInvoice', [TransaksiTiketController::class, 'paidInvoice'])->name('paidInvoice')->withoutMiddleware(VerifyCsrfToken::class);

Route::get('/symlink', function () {
    Artisan::call('storage:link');
});




require __DIR__ . '/auth.php';

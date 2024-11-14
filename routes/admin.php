<?php

use App\Http\Controllers\Admin\ReviewController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LayananController;
use App\Http\Controllers\Admin\ArtikelController;
use App\Http\Controllers\Admin\BisnisController;
use App\Http\Controllers\Admin\SessionController;
use App\Http\Controllers\Admin\SupadminController;


// Rute utama admin dashboard
Route::get('/', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

// Grup rute untuk review dengan prefix, nama, dan middleware auth
Route::prefix('review')->name('review.')->middleware('auth')->group(function () {
    Route::get('/create', [ReviewController::class, 'create'])->name('create');
    Route::get('/', [ReviewController::class, 'index'])->name('index'); // review.index
    Route::post('/add', [ReviewController::class, 'store'])->name('store'); // review.store
    Route::get('/edit/{id}', [ReviewController::class, 'edit'])->name('edit'); // review.edit
    Route::post('/update/{id}', [ReviewController::class, 'update'])->name('update'); // review.update
    Route::post('/delete', [ReviewController::class, 'destroy'])->name('delete'); // review.delete
});

// Grup rute untuk layanan dengan prefix, nama, dan middleware auth
Route::prefix('layanan')->name('layanan.')->middleware('auth')->group(function () {
    Route::get('/create', [LayananController::class, 'create'])->name('create');
    Route::get('/', [LayananController::class, 'index'])->name('index'); // layanan.index
    Route::post('/add', [LayananController::class, 'store'])->name('store'); // layanan.store
    Route::get('/edit/{id}', [LayananController::class, 'edit'])->name('edit'); // layanan.edit
    Route::post('/update/{id}', [LayananController::class, 'update'])->name('update'); // layanan.update
    Route::post('/delete', [LayananController::class, 'destroy'])->name('delete'); // layanan.delete
});

// Grup rute untuk artikel dengan prefix, nama, dan middleware auth
Route::prefix('artikel')->name('artikel.')->middleware('auth')->group(function () {
    Route::get('/create', [ArtikelController::class, 'create'])->name('create');
    Route::get('/', [ArtikelController::class, 'index'])->name('index'); // artikel.index
    Route::post('/add', [ArtikelController::class, 'store'])->name('store'); // artikel.store
    Route::get('/edit/{id}', [ArtikelController::class, 'edit'])->name('edit'); // artikel.edit
    Route::post('/update/{id}', [ArtikelController::class, 'update'])->name('update'); // artikel.update
    Route::post('/delete', [ArtikelController::class, 'destroy'])->name('delete'); // artikel.delete
});

// Grup rute untuk bisnis dengan prefix, nama, dan middleware auth
Route::prefix('bisnis')->name('bisnis.')->middleware('auth')->group(function () {
    Route::get('/create', [BisnisController::class, 'create'])->name('create');
    Route::get('/', [BisnisController::class, 'index'])->name('index'); // bisnis.index
    Route::post('/add', [BisnisController::class, 'store'])->name('store'); // bisnis.store
    Route::get('/edit/{id}', [BisnisController::class, 'edit'])->name('edit'); // bisnis.edit
    Route::post('/update/{id}', [BisnisController::class, 'update'])->name('update'); // bisnis.update
    Route::post('/delete', [BisnisController::class, 'destroy'])->name('delete'); // bisnis.delete
});

//subadmin
Route::prefix('users')->name('users.')->middleware('auth')->group(function () {
    Route::get('/create', [SupadminController::class, 'create'])->name('create');
    Route::get('/', [SupadminController::class, 'index'])->name('index'); // review.index
    Route::post('/add', [SupadminController::class, 'store'])->name('store'); // review.store
    Route::get('/edit/{id}', [SupadminController::class, 'edit'])->name('edit'); // review.edit
    Route::post('/update/{id}', [SupadminController::class, 'update'])->name('update'); // review.update
    Route::post('/delete', [SupadminController::class, 'destroy'])->name('delete'); // review.delete
});


//LOGIN
Route::prefix('sesi')->name('sesi.')->group(function () {
    Route::middleware(['guest'])->group(function () {
        Route::get('/', [SessionController::class, 'index'])->name('index');
    });

    Route::post('/login', [SessionController::class, 'login'])->name('login');
    Route::post('/logout', [SessionController::class, 'logout'])->name('logout');

});












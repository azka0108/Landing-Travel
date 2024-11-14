<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('/home', [HomeController::class, 'index'])->name('index'); // review.index


Route::get('/landing', function () {
    return view('LandingTravel ');
});
Route::get('/index', function () {
    return view('index');
});

Route::get('/login', function () {
    return view('login_admin');
});


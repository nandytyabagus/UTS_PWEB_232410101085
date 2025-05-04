<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class,'showLogin'])->name('showlogin');
Route::post('/login', [PageController::class,'login'])->name('login');
Route::post('/logout', [PageController::class,'logout'])->name('logout');

Route::get('/dashboard', [PageController::class,'showDashboard'])->name('dashboard');

Route::get('/pengelolaan', [PageController::class,'showPengelolaan'])->name('pengelolaan');
Route::post('/pengelolaan', [PageController::class, 'hasilPengelolaan'])->name('hitungTotal');

Route::get('/profile', [PageController::class,'showProfile']);
Route::get('/register', [PageController::class,'showRegister']);
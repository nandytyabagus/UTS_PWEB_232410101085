<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'showLogin'])->name('showlogin');
Route::post('/login', [PageController::class, 'login'])->name('login');

Route::get('/dashboard/{id}', [PageController::class, 'showDashboard'])->name('dashboard');
Route::get('/pengelolaan/{id}', [PageController::class, 'showPengelolaan'])->name('pengelolaan');
Route::post('/pengelolaan/{id}', [PageController::class, 'hasilPengelolaan'])->name('hitungTotal');
Route::get('/profile/{id}', [PageController::class, 'showProfile'])->name('profile');
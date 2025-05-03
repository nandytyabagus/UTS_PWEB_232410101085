<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class,'showLogin']);
Route::get('/dashboard', [PageController::class,'showDashboard']);
Route::get('/pengelolaan', [PageController::class,'showPengelolaan']);
Route::get('/profile', [PageController::class,'showProfile']);
Route::get('/register', [PageController::class,'showRegister']);
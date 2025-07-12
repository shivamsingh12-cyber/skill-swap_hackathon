<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileEditController;
use Illuminate\Support\Facades\Route;


 Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login'  );
 Route::get('/loginverification', [LoginController::class, 'login'])->name('loginverification'  );
 Route::any('/', [HomeController::class, 'showDashboard'])->name('/');
Route::get('/homepage', [HomeController::class, 'showHomePage'])->name('homepage');
 Route::any('/forgot-password', [LoginController::class, 'forgotPassword'])->name('forgot.password');
Route::any('/change-password', [LoginController::class, 'updatePassword'])->name('password.change');
Route::any('/showProfile', [ProfileEditController::class, 'ShowProfile'])->name('showProfile');
Route::put('/UpdateProfile', [ProfileEditController::class, 'updateProfile'])->name('UpdateProfile');

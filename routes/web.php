<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\StateController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view("home");
})->name('home');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register',[AuthController::class, 'register'])->name('register');
Route::post('/register',[AuthController::class, 'register_action'])->name('auth.register_action');

Route::get('/forgot-password', function() {
    return view(('auth.forgot-password'));
})->name('forgot-password');

Route::get("/select-state", [StateController::class, 'index'])->name('state.select-state');

Route::post("/state-action", [StateController::class, 'register_state'])->name('state.state_action');
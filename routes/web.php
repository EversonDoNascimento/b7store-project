<?php

use App\Http\Controllers\AdController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StateController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    

    Route::get("/select-state", [StateController::class, 'index'])->name('state.select-state');
    Route::post("/state-action", [StateController::class, 'register_state'])->name('state.state_action');

    //Dashboard

    Route::get('/dashboard',[DashboardController::class, "my_account"])->name('dashboard.my_account');
    Route::post('/dashboard', [DashboardController::class, "my_account_action"])->name('dashboard.my_account_action');
    Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
    Route::get('/my-ads', [DashboardController::class, 'my_ads'])->name('dashboard.my_ads');
    Route::get("/ad/delete/{id}", [AdController::class, "ad_delete"])->name("ad.delete");
});
// Pages

Route::get('/', function () {
    return view("home");
})->name('home');


/*
//Auth Routes
*/
Route::get('/login', function () {
    return view('auth.login');
})->name('auth.login');


Route::post("/login", [AuthController::class, 'login_action'])->name('auth.login_action');

Route::get('/register',[AuthController::class, 'register'])->name('register');
Route::post('/register',[AuthController::class, 'register_action'])->name('auth.register_action');

Route::get('/forgot-password', function() {
    return view(('auth.forgot-password'));
})->name('forgot-password');


// TODO forgot-password-post

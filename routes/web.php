<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LoginUser;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Dashboard\ShowAdminDashboard;
use App\Http\Controllers\Dashboard\ShowClientDashboard;
use App\Http\Controllers\ShowWelcomePage;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Welcome page
Route::get('/', ShowWelcomePage::class)->name('welcome');


// Auth Routes
Route::prefix('auth')->group(function () {
    Route::get('login', [LoginController::class, 'show'])->name('auth.login.show');
    Route::post('login', [LoginController::class, 'login'])->name('auth.login');
    Route::get('register', [RegisterController::class, 'show'])->name('auth.register.show');
    Route::post('register', [RegisterController::class, 'register'])->name('auth.register');
});

// Client Routes that need authentication
Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', ShowClientDashboard::class);
});


// Admin Routes
Route::prefix('admin')->middleware(['auth', IsAdmin::class])->group(function () {

    // Dashboard
    Route::get('dashboard', ShowAdminDashboard::class);
});

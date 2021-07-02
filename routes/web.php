<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Brand\BrandController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Dashboard\ShowAdminDashboard;
use App\Http\Controllers\Dashboard\ShowClientDashboard;
use App\Http\Controllers\ShowWelcomePage;
use App\Http\Middleware\IsAdmin;
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

    Route::get('reset-password', [ResetPasswordController::class, 'update'])->name('auth.reset-password');
    Route::get('create-reset-password-link', [ResetPasswordController::class, 'create'])->name('auth.reset-password.create');
});

// Client Routes that need authentication
Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', ShowClientDashboard::class);
});


// Admin Routes
Route::prefix('admin')->middleware(['auth', IsAdmin::class])->group(function () {

    // Dashboard
    Route::get('dashboard', ShowAdminDashboard::class)->name('admin.dashboard');

    // Categories
    Route::get('categories', [CategoryController::class, 'index'])->name('admin.categories.index');

    // Brands
    Route::get('brands', [BrandController::class, 'index'])->name('admin.brands.index');
});

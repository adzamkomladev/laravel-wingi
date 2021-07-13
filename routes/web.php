<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ResetPasswordLinkController;
use App\Http\Controllers\Brands\BrandController;
use App\Http\Controllers\Categories\CategoryController;
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
// Route::get('/', ShowWelcomePage::class)->name('welcome');


// Auth Routes
Route::prefix('auth')->group(function () {
    Route::get('login', [LoginController::class, 'create'])->name('auth.login');
    Route::post('login', [LoginController::class, 'store'])->name('auth.login.store');
    Route::get('register', [RegisterController::class, 'create'])->name('auth.register');
    Route::post('register', [RegisterController::class, 'store'])->name('auth.register.store');

    Route::get('reset-password', [ResetPasswordController::class, 'edit'])->name('auth.reset-password.edit');
    Route::patch('reset-password/{user}', [ResetPasswordController::class, 'update'])->name('auth.reset-password.update');

    Route::get('reset-password-link', [ResetPasswordLinkController::class, 'create'])->name('auth.reset-password-link.create');
    Route::post('reset-password-link', [ResetPasswordLinkController::class, 'store'])->name('auth.reset-password-link.store');
});

// Client Routes that need authentication
Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', ShowClientDashboard::class);
});


// Admin Routes
Route::prefix('admin')
    ->name('admin.')
    // ->middleware(['auth', IsAdmin::class])
    ->group(function () {

        // Dashboard
        Route::get('dashboard', ShowAdminDashboard::class)->name('dashboard');

        // Categories
        Route::resource('categories', CategoryController::class)->except(['update']);
        Route::post('categories/{category}', [CategoryController::class, 'update'])->name('categories.update');

        // Brands
        Route::resource('brands', BrandController::class)->except(['update']);
        Route::post('brands/{brand}', [BrandController::class, 'update'])->name('brands.update');
    });

<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OfficerController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\DonationController;

// Routes d'authentification
Route::get('login', [AuthenticatedSessionController::class, 'create'])
    ->name('login');

Route::post('login', [AuthenticatedSessionController::class, 'store']);

Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');

Route::get('register', [RegisteredUserController::class, 'create'])
    ->name('register');

Route::post('register', [RegisteredUserController::class, 'store']);

Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
    ->name('password.request');

Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
    ->name('password.email');

Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
    ->name('password.reset');

Route::post('reset-password', [NewPasswordController::class, 'store'])
    ->name('password.update');

// Routes du frontend
Route::get('/', [FrontendController::class, 'home'])->name('home');
Route::get('/about', [FrontendController::class, 'about'])->name('about');
Route::get('/officers', [FrontendController::class, 'officers'])->name('officers');
Route::get('/articles', [FrontendController::class, 'articles'])->name('articles');
Route::get('/events', [FrontendController::class, 'events'])->name('events');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
Route::get('/donate', [DonationController::class, 'show'])->name('donate');

// Routes de l'admin
Route::middleware(['auth', 'admin'])->prefix('admin')->as('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('officers', OfficerController::class);
    Route::resource('articles', ArticleController::class);
    Route::resource('events', EventController::class);
    Route::resource('settings', SettingController::class);
    Route::post('admin/articles', [ArticleController::class, 'store'])->name('admin.articles.store');
    

});

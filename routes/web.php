<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('/profil', [PageController::class, 'profil'])->name('profil');
Route::get('/akademik', [PageController::class, 'akademik'])->name('akademik');
Route::get('/galeri', [PageController::class, 'galeri'])->name('galeri');
Route::get('/pendaftaran', [PageController::class, 'pendaftaran'])->name('pendaftaran');
Route::get('/kontak', [PageController::class, 'kontak'])->name('kontak');

Route::prefix('unit')->group(function () {
    Route::get('/paud', [PageController::class, 'paud'])->name('paud');
    Route::get('/sd', [PageController::class, 'sd'])->name('sd');
    Route::get('/smp', [PageController::class, 'smp'])->name('smp');
});

// Admin Authentication Routes
Route::get('/admin/login', [\App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [\App\Http\Controllers\Auth\LoginController::class, 'login'])->name('admin.login.submit');

// Password Reset Routes
Route::get('/admin/forgot-password', [\App\Http\Controllers\Auth\LoginController::class, 'showForgotPasswordForm'])->name('admin.forgot-password');
Route::post('/admin/forgot-password', [\App\Http\Controllers\Auth\LoginController::class, 'resetPassword'])->name('admin.forgot-password.submit');
Route::get('/captcha', [\App\Http\Controllers\Auth\LoginController::class, 'generateCaptcha'])->name('captcha');

// Admin Routes protected by AdminMiddleware
Route::prefix('admin')->middleware('admin')->group(function () {
    Route::get('/', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');
    Route::post('/update-stats', [\App\Http\Controllers\AdminController::class, 'updateStats'])->name('admin.update-stats');
    Route::post('/update-sosmed', [\App\Http\Controllers\AdminController::class, 'updateSosmed'])->name('admin.update-sosmed');
    Route::post('/upload-gallery', [\App\Http\Controllers\AdminController::class, 'uploadGallery'])->name('admin.upload-gallery');
    Route::delete('/delete-gallery/{id}', [\App\Http\Controllers\AdminController::class, 'deleteGallery'])->name('admin.delete-gallery');
    Route::post('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('admin.logout');
});


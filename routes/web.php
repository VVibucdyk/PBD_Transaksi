<?php

use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\fakturController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\pelangganController;
use App\Http\Controllers\pemesanController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RinciFakturController;
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
Route::get('/', function () {
    return view('dashboard');
})->middleware('auth');

// Route::get('/mulai-ngoding', function () {
//     return view('blank_page.blank');
// })->name("blank");

Route::resource('faktur', fakturController::class)->middleware('auth');
Route::resource('rincian',RinciFakturController::class)->middleware('auth');
Route::resource('pemesan', pemesanController::class)->middleware('auth');
Route::resource('pelanggan', pelangganController::class)->middleware('auth');

// Route Auth
Route::get('register', [RegisterController::class, 'create'])->name('register');
Route::get('register-process', [RegisterController::class, 'registerProcess'])->name('register.process');

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::get('login-process', [LoginController::class, 'loginProcess'])->name('login.process');

Route::get('/logout', function () {
    auth()->logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('login');
})->name('logout')->middleware('auth');

Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);
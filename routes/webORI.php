<?php

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
})->name("dashboard");

Route::get('/mulai-ngoding', function () {
    return view('blank_page.blank');
})->name("blank");

# Test Ting
// sidik berhasil 

// bisa donks
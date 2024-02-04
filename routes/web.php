<?php

use App\Http\Controllers\fakturController;
use App\Http\Controllers\pemesanController;
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
});

// Route::get('/mulai-ngoding', function () {
//     return view('blank_page.blank');
// })->name("blank");

Route::resource('faktur', fakturController::class);
Route::resource('rincian',RinciFakturController::class);
Route::resource('pemesan', pemesanController::class);

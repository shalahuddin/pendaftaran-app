<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PendaftarController;


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

Route::get('/', function () {
    return view('welcome');
});

// Tambahkan route untuk CRUD pendaftar
Route::resource('pendaftars', PendaftarController::class);

// Tambahkan route khusus untuk export PDF
Route::get('pendaftars/{pendaftar}/export', [PendaftarController::class, 'export'])->name('pendaftars.export');
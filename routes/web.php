<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EquipmentController;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
// Grup route untuk Master
Route::prefix('master')->name('master.')->group(function () {
    Route::get('/equipment', [EquipmentController::class, 'index'])->name('equipment');
    // Tambahkan route lain di sini, misalnya:
    // Route::get('/machine', [MachineController::class, 'index'])->name('machine');
});

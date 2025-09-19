<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\UserController;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
// Grup route untuk Master
Route::prefix('master')->name('master.')->group(function () {
    Route::get('/equipment', [EquipmentController::class, 'index'])->name('equipment');
    Route::get('/equipment/getAll', [EquipmentController::class, 'getAll'])->name('equipment.getAll');
    Route::post('/equipment/store', [EquipmentController::class, 'store'])->name('equipment.store');
    Route::put('/master/equipment/{id}', [EquipmentController::class, 'update'])->name('equipment.update');
    Route::delete('/master/equipment/{id}', [EquipmentController::class, 'destroy'])->name('equipment.destroy');

    // Tambahkan route lain di sini, misalnya:
    // Route::get('/machine', [MachineController::class, 'index'])->name('machine');
});
Route::prefix('user-management')->name('user-management.')->group(function () {
    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::get('/user/getAll', [UserController::class, 'getAll'])->name('user.getAll');
    
});

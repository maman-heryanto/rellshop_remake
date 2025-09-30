<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\RollInController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SessionController;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::get('/', [HomeController::class, 'index'])->name('home');
//grup route untuk User Management
Route::prefix('user-management')->name('user-management.')->group(function () {
    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::get('/user/getAll', [UserController::class, 'getAll'])->name('user.getAll');
    Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
    Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    //profile
    Route::get('user/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::put('user/profile/{id}', [UserController::class, 'updateProfile'])->name('user.profile.update');
    Route::put('user/profile/{id}/password', [UserController::class, 'changePassword'])->name('user.profile.password');
    //session
    Route::get('/session', [SessionController::class, 'index'])->name('session');
    Route::get('/session/getAll', [SessionController::class, 'getAll'])->name('session.getAll');
    Route::delete('/session/{id}', [SessionController::class, 'destroy'])->name('session.destroy');
});
// Grup route untuk Master
Route::prefix('master')->name('master.')->group(function () {
    Route::get('/equipment', [EquipmentController::class, 'index'])->name('equipment');
    Route::get('/equipment/getAll', [EquipmentController::class, 'getAll'])->name('equipment.getAll');
    Route::post('/equipment/store', [EquipmentController::class, 'store'])->name('equipment.store');
    Route::put('/equipment/{id}', [EquipmentController::class, 'update'])->name('equipment.update');
    Route::delete('/equipment/{id}', [EquipmentController::class, 'destroy'])->name('equipment.destroy');
    // Tambahkan route lain di sini, misalnya:
    // Route::get('/machine', [MachineController::class, 'index'])->name('machine');
});

Route::prefix('roll-in')->name('roll-in.')->group(function () {
    Route::get('/menu', [RollInController::class, 'menu'])->name('menu');
    // Route::get('/user/getAll', [UserController::class, 'getAll'])->name('user.getAll');
    // Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
    // Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
    // Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');
});




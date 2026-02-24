<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::controller(TicketController::class)->group(function () {
        Route::get('/ticketing', 'index')->name('ticketing.index');
        Route::POST('/ticketing', 'store')->name('ticketing.store');
    });

    Route::controller(DepartmentController::class)->group(function () {
        Route::get('/department', 'index')->name('department.index');
        Route::post('/department', 'store')->name('department.store');
        Route::put('/departments/{department}', 'update')->name('department.update');
        Route::delete('/departments/{department}', 'destroy')->name('department.destroy');
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/api.php';

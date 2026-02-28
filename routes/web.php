<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\KpiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StatusController;
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

    Route::controller(StatusController::class)->group(function () {
        Route::get('/statuses', 'index')->name('statuses.index');
        Route::post('/statuses', 'store')->name('statuses.store');
        Route::put('/statuses/{status}', 'update')->name('statuses.update');
        Route::delete('/statuses/{status}', 'destroy')->name('statuses.destroy');
    });

    Route::controller(CategoryController::class)->group(function () {
        Route::get('/category', 'index')->name('category.index');
        Route::POST('/category', 'store')->name('category.store');
        Route::PUT('/category/{category}', 'update')->name('category.update');
        Route::delete('/category/{category}', 'destroy')->name('category.destroy');
    });

    Route::controller(KpiController::class)->group(function () {
        Route::get('/kpi', 'index')->name('kpi.index');
        Route::post('/kpi', 'store')->name('kpi.store');
        Route::put('/kpi/{kpi}', 'update')->name('kpi.update');
        Route::delete('/kpi/{kpi}', 'destroy')->name('kpi.delete');
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/api.php';

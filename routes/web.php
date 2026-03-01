<?php

use App\Events\TicketCreated;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\KpiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TicketController;
use App\Models\Ticket;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/simulateticket', function () {

    // ambil ticket pertama (tanpa insert baru)
    $ticket = Ticket::with(['category', 'user', 'status'])->first();

    if (!$ticket) {
        return response()->json(['message' => 'Tidak ada ticket untuk test'], 404);
    }

    // dispatch event
    event(new TicketCreated($ticket));

    return response()->json([
        'message' => 'Event terkirim',
        'ticket' => $ticket
    ]);
});

Route::get('/test-event', function () {
    $ticket = \App\Models\Ticket::first();
    event(new \App\Events\TicketCreated($ticket));
    return 'ok';
});

Route::controller(DashboardController::class)->group(function () {
    Route::get('/dashboard', 'index')->middleware(['auth', 'verified'])->name('dashboard');
});

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
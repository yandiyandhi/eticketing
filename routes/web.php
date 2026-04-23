<?php

use App\Http\Controllers\AsetController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DivisiController;
use App\Http\Controllers\FronFEController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\JenisAsetController;
use App\Http\Controllers\KpiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\KantorController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Models\Jabatan;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::controller(DashboardController::class)->group(function () {
    Route::get('/dashboard', 'index')->middleware(['auth', 'verified'])->name('dashboard');
});

Route::controller(FronFEController::class)->group(function(){
    Route::get('/detail/{id}', 'detail')->name('aset.detail');
});

Route::middleware('auth')->group(function () {

    Route::controller(TicketController::class)->group(function () {
        Route::get('/ticketing', 'index')->name('ticketing.index');
        Route::POST('/ticketing', 'store')->name('ticketing.store');
        Route::get('/ticketing/{tiket}', 'edit')->name('ticketing.edit');
        Route::put('/ticketing/{tiket}', 'update')->name('ticketing.update');
        Route::get('/ticketing/status/{status}', 'status')->name('ticketing.status');
        Route::put('/status/update/{id}', 'updateStatus')->name('ticketing.updateStatus');

        Route::get('/reports/ticketing/it', 'indexReportsIt')->name('ticketingit.reports');
        Route::get('/reports/ticketing/hr', 'indexReportsHr')->name('ticketinghr.reports');
        Route::put('/user/update/status/success/{id}', 'UserUpdateStatusSuccess')->name('ticketing.UserUpdateStatusSuccess');
        Route::put('/user/update/status/cancel/{id}', 'UserUpdateStatusCancel')->name('ticketing.UserUpdateStatusCancel');

        Route::get('/request/export', 'exportRequest')->name('ticketing.exportRequest');
        Route::get('/request/export/hr', 'exportRequestHr')->name('ticketing.exportRequestHr');
    });

    Route::controller(KendaraanController::class)->group(function () {
        Route::get('/list-service', 'index')->name('service.index');
        Route::get('/request-service', 'create')->name('service.create');
        Route::post('/service/store', 'store')->name('service.store');

        Route::get('/get-data/{id}', 'getDataKendaraan')->name('service.getDataKendaraan');
        Route::get('/detail/pengajuan/{id}', 'detailPengajuan')->name('service.detailPengajuan');
    });

    Route::controller(KantorController::class)->group(function () {
        Route::get('/kantor', 'index')->name('kantor.index');
        Route::get('/kantor/create', 'create')->name('kantor.create');
        Route::post('/kantor', 'store')->name('kantor.store');
        Route::get('/kantor/edit/{id}', 'edit')->name('kantor.edit');
        Route::put('/kantor/{id}', 'update')->name('kantor.update');
        Route::delete('/kantor/{id}', 'destroy')->name('kantor.destroy');
    });

    Route::controller(DepartmentController::class)->group(function () {
        Route::get('/department', 'index')->name('department.index');
        Route::post('/department', 'store')->name('department.store');
        Route::put('/departments/{department}', 'update')->name('department.update');
        Route::delete('/departments/{department}', 'destroy')->name('department.destroy');
    });

    Route::controller(DivisiController::class)->group(function () {
        Route::get('/divisi', 'index')->name('divisi.index');
        Route::get('/divisi/create', 'create')->name('divisi.create');
        Route::post('/divisi/store', 'store')->name('divisi.store');
        Route::get('/divisi/edit/{id}', 'edit')->name('divisi.edit');
        Route::put('/divisi/{id}', 'update')->name('divisi.update');
        Route::delete('/divisi/{divisi}', 'destroy')->name('divisi.session_destroy');
    });

    Route::controller(JabatanController::class)->group(function(){
        Route::get('/jabatan', 'index')->name('jabatan.index');
        Route::get('/jabatan/create', 'create')->name('jabatan.create');
        Route::post('/jabatan/store', 'store')->name('jabatan.store');
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

    Route::controller(UserController::class)->group(function () {
        Route::get('/user', 'index')->name('user.index');
        Route::get('/user/create', 'create')->name('user.create');
        Route::post('/user', 'store')->name('user.store');
        Route::get('/user/edit/{id}', 'edit')->name('user.edit');
        Route::put('/user/{id}', 'update')->name('user.update');
        Route::delete('/user/{id}', 'destroy')->name('user.destroy');

        Route::get('/user/password/{id}', 'password')->name('user.password');
        Route::put('/user/passwords/{id}', 'updatePassword')->name('user.updatePassword');

        Route::get('/user/role/{id}', 'role')->name('user.role');
        Route::put('/user/role/{id}', 'assignRole')->name('user.assignRole');
    });

    Route::controller(JenisAsetController::class)->group(function () {
        Route::get('/jenis-aset', 'index')->name('jenisAset.index');
        Route::post('/jenis-aset/store', 'store')->name('jenisAset.store');
        Route::put('/jenis-aset/{id}', 'update')->name('jenisAset.update');
        Route::delete('/jenis-aset/{id}', 'destroy')->name('jenisAset.destroy');
    });

    Route::controller(AsetController::class)->group(function () {
        Route::get('/aset', 'index')->name('aset.index');
        Route::get('/aset/create', 'create')->name('aset.create');
        Route::post('/aset/store', 'store')->name('aset.store');

        Route::get('/aset/generate', 'generateQrcode')->name('aset.generateQrcode');
    });

    Route::controller(RoleController::class)->group(function () {
        Route::get('/role', 'index')->name('role.index');
        Route::post('/role', 'store')->name('role.store');
        Route::get('/role/edit/{id}', 'edit')->name('role.edit');
        Route::put('/role/{id}', 'update')->name('role.update');
        Route::delete('/role/{id}', 'destroy')->name('role.destroy');

        Route::get('/role/permission/{id}', 'permission')->name('role.permission');
        Route::post('/role/permission/{id}', 'assignPermission')->name('role.assignPermission');
    });

    Route::controller(PermissionController::class)->group(function () {
        Route::get('/permission', 'index')->name('permission.index');
        Route::post('/permission', 'store')->name('permission.store');
        Route::get('/permission/edit/{id}', 'edit')->name('permission.edit');
        Route::put('/permission/{id}', 'update')->name('permission.update');
        Route::delete('/permission/{id}', 'destroy')->name('permission.destroy');
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/api.php';

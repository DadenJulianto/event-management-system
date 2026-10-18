<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

// ===== Publik =====
Route::get('/', fn () => redirect()->route('public.events.index'));

Route::get('/events', [EventController::class, 'index'])->name('public.events.index');
Route::get('/events/create', [EventController::class, 'create'])->name('dashboard.eo.events.create');
Route::post('/events', [EventController::class, 'store'])->name('dashboard.eo.events.store');
Route::delete('/events/{id}', [EventController::class, 'destroy'])->name('dashboard.eo.events.delete');

// ===== Dashboard (sementara tanpa auth, hanya untuk tes layout) =====
Route::prefix('dashboard')->name('dashboard.')->group(function () {
    Route::get('/admin',    fn () => view('dashboard.admin.index'))->name('admin');
    Route::get('/eo',       fn () => view('dashboard.eo.index'))->name('eo');
    Route::get('/eo/events', [EventController::class, 'dashboardIndex'])->name('eo.events.index');
    Route::get('/eo/events/{id}', [EventController::class, 'dashboardShow'])
        ->whereNumber('id')
        ->name('eo.events.show');
    Route::get('/staff',    fn () => view('dashboard.staff.index'))->name('staff');
    Route::get('/customer', fn () => view('dashboard.customer.index'))->name('customer');
});

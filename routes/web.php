<?php

use Illuminate\Support\Facades\Route;

// ===== Publik =====
Route::get('/', fn () => redirect()->route('public.events.index'));

Route::get('/events', fn () => view('public.events.index'))->name('public.events.index');
Route::get('/events/{id}', fn ($id) => view('public.events.show', ['id' => $id]))->name('public.events.show');

// ===== Dashboard (sementara tanpa auth, hanya untuk tes layout) =====
Route::prefix('dashboard')->name('dashboard.')->group(function () {
    Route::get('/admin',    fn () => view('dashboard.admin.index'))->name('admin');
    Route::get('/eo',       fn () => view('dashboard.eo.index'))->name('eo');
    Route::get('/staff',    fn () => view('dashboard.staff.index'))->name('staff');
    Route::get('/customer', fn () => view('dashboard.customer.index'))->name('customer');
});
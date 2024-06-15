<?php

use App\Enums\SupportStatus;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\SupportController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contact', [SiteController::class, 'index']);

Route::get('/support', [SupportController::class, 'index'])->name('support.index');

Route::get('/support/create', [SupportController::class, 'create'])->name('support.create');

Route::post('/support', [SupportController::class, 'store'])->name('support.store');

Route::get('/support/{id}', [SupportController::class, 'show'])->name('support.show');

Route::get('/support/{id}/edit', [SupportController::class, 'edit'])->name('support.edit');

Route::put('/support/{id}', [SupportController::class, 'update'])->name('support.update');

Route::delete('/support/{id}', [SupportController::class, 'destroy'])->name('support.destroy');

Route::get('/test', function () {
    dd(array_column(SupportStatus::cases(), 'name'));
});

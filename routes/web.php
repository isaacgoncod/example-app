<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\SupportController;

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

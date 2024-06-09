<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\SupportController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contact', [SiteController::class, 'index']);

Route::get('/support', [SupportController::class, 'index'])->name('support.index');

<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RodoviaController;
use App\Http\Controllers\TrechoController;
use App\Http\Controllers\UfController;

use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
});

Route::resource('trechos', TrechoController::class);
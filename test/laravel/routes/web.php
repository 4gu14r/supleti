<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RodoviaController;
use App\Http\Controllers\TrechoController;
use App\Http\Controllers\UfController;

use Inertia\Inertia;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/trechos', [TrechoController::class, 'index'])->name('trechos.index');
Route::get('/trechos/create', [TrechoController::class, 'create'])->name('trechos.create');
Route::post('/trechos', [TrechoController::class, 'store'])->name('trechos.store');
Route::get('/trechos/{trecho}/edit', [TrechoController::class, 'edit'])->name('trechos.edit');
Route::put('/trechos/{trecho}', [TrechoController::class, 'update'])->name('trechos.update');
Route::delete('/trechos/{trecho}', [TrechoController::class, 'destroy'])->name('trechos.destroy');

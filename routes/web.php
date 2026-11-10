<?php

use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ClientController::class, 'index']);

Route::get('/client', [ClientController::class, 'index'])->name('client.index');
Route::get('/client/create', [ClientController::class, 'create'])->name('client.create');
Route::post('/client/store', [ClientController::class, 'store'])->name('client.store');
Route::get('/client/{client}/edit', [ClientController::class, 'edit'])->name('client.edit');
Route::put('/client/{client}', [ClientController::class, 'update'])->name('client.update');
Route::delete('/client/{client}', [ClientController::class, 'destroy'])->name('client.destroy');

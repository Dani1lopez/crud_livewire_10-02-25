<?php

use App\Http\Controllers\ContactoController;
use App\Http\Controllers\InicioController;
use App\Livewire\ShowUserArticles;
use Illuminate\Support\Facades\Route;

Route::get('/', [InicioController::class, 'inicio'])->name('inicio');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/userarticles',ShowUserArticles::class)->name('showuserarticles');
});
Route::get('contacto',[ContactoController::class, 'pintarFormulario'])->name('contacto.pintar');
Route::post('contacto',[ContactoController::class, 'procesarFormulario'])->name('contacto.procesar');
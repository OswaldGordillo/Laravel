<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/registro', [AuthController::class, 'mostrarRegistro'])
    ->name('registro');

Route::post('/registro', [AuthController::class, 'registrar'])
    ->name('registrar.usuario');

Route::get('/login', [AuthController::class, 'mostrarLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'iniciarSesion'])
    ->name('iniciar.sesion');

Route::post('/logout', [AuthController::class, 'cerrarSesion'])
    ->middleware('auth')
    ->name('cerrar.sesion');

Route::get('/inicio', [AuthController::class, 'inicio'])
    ->middleware('auth')
    ->name('inicio');

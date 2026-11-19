<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Página de inicio (pública)
|--------------------------------------------------------------------------
*/
Route::get('/', [AuthController::class, 'inicio'])->name('inicio');
Route::redirect('/inicio', '/');

/*
|--------------------------------------------------------------------------
| Solo para visitantes (si ya hay sesión, van al planificador)
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    Route::get('/registro', [AuthController::class, 'mostrarRegistro'])
        ->name('registro');

    Route::post('/registro', [AuthController::class, 'registrar'])
        ->name('registrar.usuario');

    Route::get('/login', [AuthController::class, 'mostrarLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'iniciarSesion'])
        ->name('iniciar.sesion');

    Route::get('/recuperar-contraseña', [AuthController::class, 'mostrarRecuperacionContraseña'])
        ->name('recuperacion.contraseña');

    Route::post('/recuperar-contraseña', [AuthController::class, 'enviarRecuperacionContraseña'])
        ->name('enviarRecuperacion');

    Route::get('/restablecer-contraseña/{token}', [AuthController::class, 'mostrarFormularioRestablecerContraseña'])
        ->name('password.reset');

    Route::post('/restablecer-contraseña', [AuthController::class, 'procesarRestablecimientoContraseña'])
        ->name('password.update');
});

/*
|--------------------------------------------------------------------------
| Solo para usuarios con sesión iniciada
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'cerrarSesion'])
        ->name('cerrar.sesion');

    Route::get('/planificador', function () {
        return view('planificador');
    })->name('planificador');
});

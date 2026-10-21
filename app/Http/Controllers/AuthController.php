<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Mostrar formulario de registro
    public function mostrarRegistro()
    {
        return view('registro');
    }

    // Registrar usuario
    public function registrar(Request $request)
    {
        // Convertir el correo a minúsculas y quitar espacios sobrantes
        $request->merge([
            'email' => mb_strtolower(trim($request->input('email', ''))),
        ]);

        // Validar los datos del registro
        $datos = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/[A-Z]/',
                'regex:/[a-z]/',
                'regex:/[0-9]/',
                'confirmed',
            ],
            'password_confirmation' => [
                'required',
                'string',
                'same:password',
            ],
        ]);

        // Crear el usuario y proteger su contraseña
        $usuario = User::create([
            'name' => $datos['name'],
            'email' => $datos['email'],
            'password' => Hash::make($datos['password']),
        ]);

        // Iniciar sesión automáticamente
        Auth::login($usuario);

        return redirect()->route('inicio')
            ->with('success', '¡Registro exitoso!');
    }

    // Mostrar formulario de login
    public function mostrarLogin()
    {
        return view('login');
    }

    // Iniciar sesión
    public function iniciarSesion(Request $request)
    {
        // Normalizar el correo antes de validar las credenciales
        $request->merge([
            'email' => mb_strtolower(trim($request->input('email', ''))),
        ]);

        // Validar los datos del inicio de sesión
        $credenciales = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Comprobar las credenciales
        if (Auth::attempt($credenciales)) {
            $request->session()->regenerate();

            return redirect()->intended(route('inicio'));
        }

        // Mostrar un mensaje genérico si los datos son incorrectos
        return back()
            ->withErrors([
                'email' => 'El correo o la contraseña son incorrectos.',
            ])
            ->onlyInput('email');
    }

    // Cerrar sesión
    public function cerrarSesion(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    // Página privada después de iniciar sesión
    public function inicio()
    {
        return view('inicio');
    }
}


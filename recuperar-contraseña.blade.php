<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar contraseña</title>
</head>
<body>
    <main>
        <h1>Recuperar contraseña</h1>
        <p>Bienvenido a la página de recuperación de contraseñas. Por favor ingresa tu correo electrónico.</p>

        @if (session('estado'))
            <p style="color: green;">{{ session('estado') }}</p>
        @endif

        @if ($errors->any())
            <ul style="color: red;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form method="POST" action="{{ route('enviarRecuperacion') }}">
            @csrf

            <label for="correo">Correo electrónico:</label>
            <input type="email" id="correo" name="email" value="{{ old('email') }}" required>

            <button type="submit">Enviar</button>
        </form>

        <p><a href="{{ route('login') }}">Volver a iniciar sesión</a></p>
    </main>
</body>
</html>

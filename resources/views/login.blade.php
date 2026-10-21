
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
</head>
<body>
    <main>
        <h1>Iniciar sesión</h1>

        @if ($errors->any())
            <ul style="color: red;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form action="{{ route('iniciar.sesion') }}" method="POST">
            @csrf

            <p>
                <label for="email">Correo electrónico</label>
                <input type="email" id="email" name="email"
                    value="{{ old('email') }}" required>
            </p>

            <p>
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password"
                    required>
            </p>

            <button type="submit">Entrar</button>
        </form>

        <p>
            ¿No tienes cuenta?
            <a href="{{ route('registro') }}">Regístrate aquí</a>
        </p>
    </main>
</body>
</html>

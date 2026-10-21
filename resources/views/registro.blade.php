
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
    <main>
        <h1>Crear cuenta</h1>

        @if (session('success'))
            <p style="color: green;">
                {{ session('success') }}
            </p>
        @endif

        @if ($errors->any())
            <ul style="color: red;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form action="{{ route('registrar.usuario') }}" method="POST">
            @csrf

            <p>
                <label for="name">Nombre</label>
                <input type="text" id="name" name="name"
                    value="{{ old('name') }}" required>
            </p>

            <p>
                <label for="email">Correo electrónico</label>
                <input type="email" id="email" name="email"
                    value="{{ old('email') }}" required>
            </p>

            <p>
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password"
                    minlength="8" required>
            </p>

            <p>
                <label for="password_confirmation">
                    Confirmar contraseña
                </label>
                <input type="password" id="password_confirmation"
                    name="password_confirmation" minlength="8" required>
            </p>

            <button type="submit">Registrarme</button>
        </form>

        <p>
            ¿Ya tienes cuenta?
            <a href="{{ route('login') }}">Inicia sesión</a>
        </p>
    </main>
</body>
</html>

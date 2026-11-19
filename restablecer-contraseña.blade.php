<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restablecer contraseña</title>
</head>
<body>
    <main>
        <h1>Restablecer contraseña</h1>

        @if ($errors->any())
            <ul style="color: red;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <p>
                <label for="email">Correo electrónico:</label>
                <input type="email" id="email" name="email" value="{{ old('email', $email) }}" required>
            </p>

            <p>
                <label for="password">Nueva contraseña:</label>
                <input type="password" id="password" name="password" minlength="8" required>
            </p>

            <p>
                <label for="password_confirmation">Confirmar contraseña:</label>
                <input type="password" id="password_confirmation" name="password_confirmation" minlength="8" required>
            </p>

            <button type="submit">Cambiar contraseña</button>
        </form>
    </main>
</body>
</html>

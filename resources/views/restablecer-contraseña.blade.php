<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Restablecer contraseña</title>
</head>
<body>

    <h1>Restablecer contraseña</h1>

    <form method="POST" action="{{ route('password.update') }}">

        @csrf

        <input type="hidden" name="token" value="{{ $token }}">

        <input type="hidden" name="email" value="{{ $email }}">
        
        <label for="email">Correo electrónico:</label>
        <input type="email" id="email" name="email">

        <label for="password">Nueva contraseña:</label>
        <input type="password" id="password" name="password">

        <label for="password_confirmation">Confirmar contraseña:</label>
        <input type="password" id="password_confirmation" name="password_confirmation">

        <button type="submit">Cambiar contraseña</button>
    </form>

</body>
</html>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
</head>
<body>
    <main>
        <h1>¡Bienvenido, {{ Auth::user()->name }}!</h1>

        <p>Has iniciado sesión correctamente.</p>

        @if (session('success'))
            <p style="color: green;">
                {{ session('success') }}
            </p>
        @endif

        <form action="{{ route('cerrar.sesion') }}" method="POST">
            @csrf
            <button type="submit">Cerrar sesión</button>
        </form>
    </main>
</body>
</html>

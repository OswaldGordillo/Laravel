<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>recuperar contraseña</title>
</head>
<body>
    <h1>Recuperar contraseña</h1>
    <p>bienvenido a la pagina de recuperacion de contraseñas,porfavor ingresa tu correo electronico.</p>

    @if (session('estado'))
    <p>{{ session('estado') }}</p>
    @endif
    
    <form method= "POST" action="{{ route('enviarRecuperacion') }}">
    @csrf

    <label for="correo">Correo electrónico:</label>

    <input type="email" id="correo" name="email">

    <button type="submit">Enviar</button>

</body>

</html>
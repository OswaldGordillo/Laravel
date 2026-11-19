<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planificador semanal</title>
    <style>
        :root { --bg:#f6f7fb; --card:#fff; --text:#1d2433; --muted:#5b6478; --brand:#2a7f62; --brand-ink:#fff; --line:#dde1ea; }
        @media (prefers-color-scheme: dark) {
            :root { --bg:#12151d; --card:#1b2030; --text:#eef0f6; --muted:#a3abc0; --brand:#3cc9a0; --brand-ink:#0d1a15; --line:#2c3347; }
        }
        * { box-sizing: border-box; }
        body { margin:0; min-height:100vh; display:grid; place-items:center; padding:24px;
               background:var(--bg); color:var(--text); font-family:system-ui,-apple-system,"Segoe UI",sans-serif; }
        main { width:100%; max-width:440px; background:var(--card); border:1px solid var(--line);
               border-radius:16px; padding:36px 28px; text-align:center; }
        h1 { margin:0 0 8px; font-size:1.7rem; }
        p { margin:0 0 20px; color:var(--muted); line-height:1.5; }
        .ok { color:#1f8a4c; font-weight:600; }
        .acts { display:flex; flex-direction:column; gap:10px; }
        a.btn, button.btn { display:block; width:100%; padding:12px 16px; border-radius:10px; font:inherit; font-weight:600;
               text-decoration:none; text-align:center; cursor:pointer; border:1px solid var(--brand);
               background:var(--brand); color:var(--brand-ink); }
        a.btn.sec { background:transparent; color:var(--brand); }
    </style>
</head>
<body>
    <main>
        <h1>Planificador semanal</h1>
        <p>Organiza tus tareas, eventos y reuniones en un solo lugar.</p>

        @if (session('success'))
            <p class="ok">{{ session('success') }}</p>
        @endif

        <div class="acts">
            @auth
                <a class="btn" href="{{ route('planificador') }}">Ir a mi planificador</a>
                <form action="{{ route('cerrar.sesion') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn" style="background:transparent;color:var(--brand)">Cerrar sesión</button>
                </form>
            @else
                <a class="btn" href="{{ route('login') }}">Iniciar sesión</a>
                <a class="btn sec" href="{{ route('registro') }}">Registrarme</a>
            @endauth
        </div>
    </main>
</body>
</html>

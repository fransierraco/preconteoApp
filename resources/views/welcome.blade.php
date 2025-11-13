<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PreconteoApp - Acceso</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #f3f4f6;
        }

        .container {
            background: #ffffff;
            padding: 30px 32px;
            border-radius: 18px; /* bordes suaves */
            box-shadow: 0 8px 20px rgba(15, 23, 42, 0.12);
            max-width: 360px;
            width: 100%;
            text-align: center;
        }

        .title {
            font-size: 1.3rem;
            font-weight: 600;
            color: #111827;
            margin-bottom: 6px;
        }

        .subtitle {
            font-size: 0.9rem;
            color: #6b7280;
            margin-bottom: 18px;
        }

        .btn-link {
            display: inline-block;
            padding: 10px 18px;
            border-radius: 999px;
            background: #2563eb;
            color: #ffffff;
            text-decoration: none;
            font-size: 0.95rem;
            font-weight: 500;
            transition: all 0.18s ease-in-out;
        }

        .btn-link:hover {
            background: #1d4ed8;
            box-shadow: 0 4px 14px rgba(37, 99, 235, 0.4);
            transform: translateY(-1px);
        }

        .hint {
            margin-top: 10px;
            font-size: 0.75rem;
            color: #9ca3af;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="title">PreconteoApp</h1>
        <p class="subtitle">Accede al panel de administración para gestionar el preconteo.</p>
        <a class="btn-link" href="http://preconteo.fsierra.site/admin/login">
            Ingresar al Panel
        </a>
        <p class="hint">Asegúrate de contar con tus credenciales autorizadas.</p>
    </div>
</body>
</html>

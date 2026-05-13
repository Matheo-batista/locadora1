<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — CarSystem</title>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --bg: #060810;
            --surface: #0d1117;
            --surface-2: #141922;
            --border: rgba(59,130,246,0.13);
            --accent: #3b82f6;
            --accent-bright: #60a5fa;
            --accent-dim: rgba(59,130,246,0.10);
            --text: #e8edf5;
            --text-muted: #4e5c7a;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--bg);
            color: var(--text);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        body::before {
            content: '';
            position: absolute;
            width: 700px; height: 700px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(59,130,246,0.07) 0%, transparent 65%);
            top: -200px; right: -200px;
            pointer-events: none;
        }

        body::after {
            content: '';
            position: absolute;
            width: 500px; height: 500px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(59,130,246,0.04) 0%, transparent 65%);
            bottom: -150px; left: -150px;
            pointer-events: none;
        }

        .card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 20px;
            padding: 48px 44px;
            width: 100%;
            max-width: 420px;
            position: relative;
            animation: fadeUp 0.5s ease both;
        }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(20px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 36px;
        }

        .brand-icon {
            width: 36px; height: 36px;
            background: var(--accent);
            border-radius: 8px;
            display: flex; align-items: center; justify-content: center;
        }

        .brand-icon svg { width: 20px; height: 20px; fill: #fff; }

        .brand-name {
            font-family: 'Syne', sans-serif;
            font-weight: 700; font-size: 18px; letter-spacing: -0.3px;
        }

        .brand-name span { color: var(--accent-bright); }

        h2 {
            font-family: 'Syne', sans-serif;
            font-size: 26px; font-weight: 700;
            margin-bottom: 6px; letter-spacing: -0.4px;
        }

        .subtitle { font-size: 14px; color: var(--text-muted); margin-bottom: 32px; }

        .alert {
            background: rgba(224,82,82,0.08);
            border: 1px solid rgba(224,82,82,0.22);
            color: #e05252;
            border-radius: 10px;
            padding: 12px 16px; font-size: 13.5px; margin-bottom: 20px;
        }

        .field { margin-bottom: 16px; }

        label {
            display: block;
            font-size: 11.5px; font-weight: 500;
            color: var(--text-muted);
            text-transform: uppercase; letter-spacing: 0.8px;
            margin-bottom: 8px;
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            background: var(--surface-2);
            border: 1px solid var(--border);
            border-radius: 10px;
            color: var(--text);
            font-family: 'DM Sans', sans-serif;
            font-size: 15px; padding: 13px 16px;
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        input:focus {
            border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(59,130,246,0.13);
        }

        input::placeholder { color: var(--text-muted); }

        button[type="submit"] {
            width: 100%; margin-top: 8px; padding: 14px;
            background: var(--accent); color: #fff;
            border: none; border-radius: 10px;
            font-family: 'Syne', sans-serif;
            font-size: 15px; font-weight: 700;
            cursor: pointer; letter-spacing: 0.2px;
            transition: background 0.2s, transform 0.1s;
        }

        button[type="submit"]:hover { background: #2563eb; }
        button[type="submit"]:active { transform: scale(0.99); }
    </style>
</head>
<body>

<div class="card">
    <div class="brand">
        <div class="brand-icon">
            <svg viewBox="0 0 24 24"><path d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.21.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-2.08-5.99zM6.5 16c-.83 0-1.5-.67-1.5-1.5S5.67 13 6.5 13s1.5.67 1.5 1.5S7.33 16 6.5 16zm11 0c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5zM5 11l1.5-4.5h11L19 11H5z"/></svg>
        </div>
        <div class="brand-name">Car<span></span></div>
    </div>

    <h2>Bem-vindo</h2>
    <p class="subtitle">Acesse o painel de gestão de frotas</p>

    @if(session('erro'))
        <div class="alert">{{ session('erro') }}</div>
    @endif

    <form method="POST" action="/logar">
        @csrf
        <div class="field">
            <label for="login">Usuário</label>
            <input type="text" id="login" name="login" placeholder="seu.usuario" autocomplete="username">
        </div>
        <div class="field">
            <label for="senha">Senha</label>
            <input type="password" id="senha" name="senha" placeholder="••••••••" autocomplete="current-password">
        </div>
        <button type="submit">Entrar</button>
    </form>
</div>

</body>
</html>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Carro — CarSystem</title>
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
            --text: #e8edf5;
            --text-muted: #4e5c7a;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--bg); color: var(--text);
            min-height: 100vh;
            display: flex; align-items: center; justify-content: center;
            padding: 40px 24px;
        }

        .card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 20px; padding: 48px 44px;
            width: 100%; max-width: 480px;
            animation: fadeUp 0.45s ease both;
        }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(16px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .back {
            display: inline-flex; align-items: center; gap: 6px;
            color: var(--text-muted); text-decoration: none;
            font-size: 13px; margin-bottom: 28px;
            transition: color 0.2s;
        }

        .back:hover { color: var(--accent-bright); }
        .back svg { width: 14px; height: 14px; fill: currentColor; }

        .icon-wrap {
            width: 48px; height: 48px;
            background: rgba(59,130,246,0.12);
            border: 1px solid rgba(59,130,246,0.22);
            border-radius: 12px;
            display: flex; align-items: center; justify-content: center;
            margin-bottom: 20px;
        }

        .icon-wrap svg { width: 24px; height: 24px; fill: var(--accent-bright); }

        h2 {
            font-family: 'Syne', sans-serif;
            font-size: 24px; font-weight: 700;
            letter-spacing: -0.4px; margin-bottom: 4px;
        }

        .subtitle { color: var(--text-muted); font-size: 14px; margin-bottom: 32px; }

        .grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 14px; }

        .field { margin-bottom: 4px; }

        label {
            display: block;
            font-size: 11.5px; font-weight: 500;
            color: var(--text-muted);
            text-transform: uppercase; letter-spacing: 0.8px;
            margin-bottom: 8px;
        }

        input[type="text"] {
            width: 100%;
            background: var(--surface-2);
            border: 1px solid var(--border);
            border-radius: 10px; color: var(--text);
            font-family: 'DM Sans', sans-serif;
            font-size: 15px; padding: 12px 14px;
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        input:focus {
            border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(59,130,246,0.12);
        }

        input::placeholder { color: var(--text-muted); }

        button[type="submit"] {
            width: 100%; margin-top: 28px; padding: 13px;
            background: var(--accent); color: #fff;
            border: none; border-radius: 10px;
            font-family: 'Syne', sans-serif;
            font-size: 14.5px; font-weight: 700;
            cursor: pointer;
            transition: background 0.2s, transform 0.1s;
        }

        button[type="submit"]:hover { background: #2563eb; }
        button[type="submit"]:active { transform: scale(0.99); }
    </style>
</head>
<body>

<div class="card">
    <a href="/carros" class="back">
        <svg viewBox="0 0 24 24"><path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z"/></svg>
        Voltar para Frota
    </a>

    <div class="icon-wrap">
        <svg viewBox="0 0 24 24"><path d="M19 11h-6V5h-2v6H5v2h6v6h2v-6h6z"/></svg>
    </div>

    <h2>Novo Carro</h2>
    <p class="subtitle">Cadastre um novo veículo na frota</p>

    <form method="POST" action="/carros/store">
        @csrf
        <div class="grid-2">
            <div class="field">
                <label for="modelo">Modelo</label>
                <input type="text" id="modelo" name="modelo" placeholder="Civic">
            </div>
            <div class="field">
                <label for="marca">Marca</label>
                <input type="text" id="marca" name="marca" placeholder="Honda">
            </div>
            <div class="field">
                <label for="placa">Placa</label>
                <input type="text" id="placa" name="placa" placeholder="ABC-1234">
            </div>
            <div class="field">
                <label for="ano">Ano</label>
                <input type="text" id="ano" name="ano" placeholder="2024">
            </div>
        </div>
        <button type="submit">Salvar Veículo</button>
    </form>
</div>

</body>
</html>
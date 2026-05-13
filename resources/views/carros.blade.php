<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frota — CarSystem</title>
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
            --success-bg: rgba(34,197,94,0.08);
            --success-border: rgba(34,197,94,0.22);
            --success-text: #4ade80;
            --warning-bg: rgba(251,146,60,0.08);
            --warning-border: rgba(251,146,60,0.22);
            --warning-text: #fb923c;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--bg);
            color: var(--text);
            min-height: 100vh;
            padding: 40px 24px;
        }

        .container { max-width: 1100px; margin: 0 auto; }

        header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 40px;
            flex-wrap: wrap;
            gap: 16px;
        }

        .brand { display: flex; align-items: center; gap: 10px; }

        .brand-icon {
            width: 36px; height: 36px;
            background: var(--accent);
            border-radius: 8px;
            display: flex; align-items: center; justify-content: center;
        }

        .brand-icon svg { width: 20px; height: 20px; fill: #fff; }

        .brand-name {
            font-family: 'Syne', sans-serif;
            font-weight: 700; font-size: 18px;
        }

        .brand-name span { color: var(--accent-bright); }

        .header-actions { display: flex; align-items: center; gap: 10px; }

        .btn-primary {
            display: inline-flex; align-items: center; gap: 8px;
            background: var(--accent); color: #fff;
            text-decoration: none; border-radius: 10px;
            padding: 11px 20px;
            font-family: 'Syne', sans-serif; font-size: 14px; font-weight: 700;
            transition: background 0.2s;
        }

        .btn-primary:hover { background: #2563eb; }
        .btn-primary svg { width: 16px; height: 16px; fill: #fff; }

        .btn-logout {
            display: inline-flex; align-items: center; gap: 7px;
            background: transparent; color: var(--text-muted);
            border: 1px solid var(--border); border-radius: 10px;
            padding: 10px 16px;
            font-family: 'DM Sans', sans-serif; font-size: 14px;
            cursor: pointer;
            transition: color 0.2s, border-color 0.2s, background 0.2s;
        }

        .btn-logout:hover {
            color: #f87171;
            border-color: rgba(248,113,113,0.3);
            background: rgba(248,113,113,0.06);
        }

        .btn-logout svg { width: 15px; height: 15px; fill: currentColor; }

        .page-title {
            font-family: 'Syne', sans-serif;
            font-size: 28px; font-weight: 700;
            letter-spacing: -0.5px; margin-bottom: 6px;
        }

        .page-sub { color: var(--text-muted); font-size: 14px; margin-bottom: 28px; }

        .table-wrap {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 16px; overflow: hidden;
        }

        table { width: 100%; border-collapse: collapse; }

        thead th {
            background: var(--surface-2);
            padding: 14px 20px; text-align: left;
            font-size: 11px; font-weight: 500;
            text-transform: uppercase; letter-spacing: 0.9px;
            color: var(--text-muted);
            border-bottom: 1px solid var(--border);
        }

        tbody tr {
            border-bottom: 1px solid var(--border);
            transition: background 0.15s;
        }

        tbody tr:last-child { border-bottom: none; }
        tbody tr:hover { background: var(--surface-2); }

        td {
            padding: 16px 20px; font-size: 14px;
            color: var(--text); vertical-align: middle;
        }

        td.modelo { font-weight: 500; font-size: 15px; }

        td.placa {
            font-family: monospace; font-size: 13px;
            color: var(--accent-bright); letter-spacing: 0.5px;
        }

        .badge {
            display: inline-block;
            padding: 4px 12px; border-radius: 20px;
            font-size: 12px; font-weight: 500;
        }

        .badge-ok {
            background: var(--success-bg);
            border: 1px solid var(--success-border);
            color: var(--success-text);
        }

        .badge-busy {
            background: var(--warning-bg);
            border: 1px solid var(--warning-border);
            color: var(--warning-text);
        }

        .actions { display: flex; gap: 8px; flex-wrap: wrap; }

        .btn-sm {
            display: inline-block;
            padding: 6px 14px; border-radius: 8px;
            font-size: 12.5px; font-weight: 500;
            text-decoration: none;
            transition: opacity 0.15s;
        }

        .btn-sm:hover { opacity: 0.72; }

        .btn-schedule {
            background: rgba(59,130,246,0.12);
            color: var(--accent-bright);
            border: 1px solid rgba(59,130,246,0.25);
        }

        .btn-edit {
            background: rgba(148,163,184,0.1);
            color: #94a3b8;
            border: 1px solid rgba(148,163,184,0.2);
        }

        .btn-delete {
            background: rgba(248,113,113,0.08);
            color: #f87171;
            border: 1px solid rgba(248,113,113,0.2);
        }

        .btn-finish {
            background: var(--success-bg);
            color: var(--success-text);
            border: 1px solid var(--success-border);
        }

        .empty {
            text-align: center; padding: 60px 20px;
            color: var(--text-muted); font-size: 14px;
        }
    </style>
</head>
<body>

<div class="container">
    <header>
        <div class="brand">
            <div class="brand-icon">
                <svg viewBox="0 0 24 24"><path d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.21.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-2.08-5.99zM6.5 16c-.83 0-1.5-.67-1.5-1.5S5.67 13 6.5 13s1.5.67 1.5 1.5S7.33 16 6.5 16zm11 0c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5zM5 11l1.5-4.5h11L19 11H5z"/></svg>
            </div>
            <div class="brand-name">Car<span></span></div>
        </div>

        <div class="header-actions">
            <a href="/carros/novo" class="btn-primary">
                <svg viewBox="0 0 24 24"><path d="M19 11h-6V5h-2v6H5v2h6v6h2v-6h6z"/></svg>
                Novo Carro
            </a>
            <form method="POST" action="/logout" style="margin:0;">
                @csrf
                <button type="submit" class="btn-logout">
                    <svg viewBox="0 0 24 24"><path d="M17 7l-1.41 1.41L18.17 11H8v2h10.17l-2.58 2.58L17 17l5-5-5-5zM4 5h8V3H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h8v-2H4V5z"/></svg>
                    Sair
                </button>
            </form>
        </div>
    </header>

    <div class="page-title">Frota de Veículos</div>
    <p class="page-sub">Gerencie, agende e acompanhe todos os carros da frota</p>

    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Modelo</th>
                    <th>Marca</th>
                    <th>Placa</th>
                    <th>Ano</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
            @forelse($carros as $c)
            <tr>
                <td class="modelo">{{ $c->modelo }}</td>
                <td>{{ $c->marca }}</td>
                <td class="placa">{{ $c->placa }}</td>
                <td>{{ $c->ano }}</td>
                <td>
                    @if($c->status == 'Disponível')
                        <span class="badge badge-ok">Disponível</span>
                    @else
                        <span class="badge badge-busy">Locado</span>
                    @endif
                </td>
                <td>
                    <div class="actions">
                        @if($c->status == 'Disponível')
                            <a href="/agendar/{{ $c->id }}" class="btn-sm btn-schedule">Agendar</a>
                            <a href="/editar/{{ $c->id }}" class="btn-sm btn-edit">Editar</a>
                            <a href="/excluir/{{ $c->id }}" class="btn-sm btn-delete">Excluir</a>
                        @else
                            <a href="/finalizar/{{ $c->id }}" class="btn-sm btn-finish">Finalizar</a>
                        @endif
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="empty">Nenhum carro cadastrado ainda.</td>
            </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
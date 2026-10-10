<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Perpustakaan Digital')</title>
    
    <!-- Font Modern Google (Inter) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --bg-color: #f8fafc;
            --card-bg: #ffffff;
            --text-main: #0f172a;
            --text-muted: #64748b;
            --primary: #2563eb;
            --primary-hover: #1d4ed8;
            --danger: #ef4444;
            --border-color: #e2e8f0;
            --nav-bg: #0f172a;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            background-color: var(--bg-color);
            color: var(--text-main);
            line-height: 1.6;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Navigation Bar */
        nav {
            background-color: var(--nav-bg);
            padding: 0.875rem 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        nav .brand {
            color: #ffffff;
            font-weight: 700;
            font-size: 1.1rem;
            letter-spacing: -0.02em;
        }

        nav ul {
            list-style: none;
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        nav ul li a {
            color: #94a3b8;
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            padding: 0.375rem 0;
            transition: color 0.2s ease;
        }

        nav ul li a:hover,
        nav ul li a.active {
            color: #ffffff;
            border-bottom: 2px solid var(--primary);
        }

        nav .navbar-user { 
            display: flex; 
            align-items: center; 
            gap: 12px; 
            color: #cbd5e1; 
            font-size: 14px; 
        }

        nav .btn-logout { 
            background: none; 
            border: 1px solid #cbd5e1; 
            color: #cbd5e1; 
            padding: 4px 10px; 
            border-radius: 4px; 
            cursor: pointer; 
            font-size: 14px; 
        }

        nav .btn-logout:hover { 
            background: #1e40af; 
            color: #fff; 
        }

        /* Badge Status */
        .badge {
            display: inline-block;
            padding: 0.25rem 0.6rem;
            font-size: 0.85rem;
            font-weight: 600;
            line-height: 1;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: 4px;
        }

        .badge-success {
            background-color: #d1e7dd;
            color: #0f5132;
            border: 1px solid #badbcc;
        }

        .badge-warning {
            background-color: #fff3cd;
            color: #664d03;
            border: 1px solid #ffecb5;
        }

        .badge-danger {
            background-color: #f8d7da;
            color: #842029;
            border: 1px solid #f5c2c7;
        }

        /* Container Layout Card */
        main {
            max-width: 1000px;
            width: 90%;
            margin: 2.5rem auto;
            padding: 2rem;
            background: var(--card-bg);
            border-radius: 12px;
            border: 1px solid var(--border-color);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.03), 0 2px 4px -2px rgba(0, 0, 0, 0.03);
            flex: 1;
        }

        /* Headings */
        h1 {
            font-size: 1.5rem;
            font-weight: 700;
            letter-spacing: -0.025em;
            margin-bottom: 1rem;
        }

        h2 {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 0.75rem;
        }

        /* Tables */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1.25rem;
            font-size: 0.875rem;
        }

        th, td {
            padding: 0.75rem 1rem;
            text-align: left;
            border-bottom: 1px solid var(--border-color);
        }

        th {
            background-color: #f1f5f9;
            color: #475569;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.05em;
        }

        tr:last-child td {
            border-bottom: none;
        }

        tr:hover td {
            background-color: #f8fafc;
        }

        /* Buttons & Links */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.5rem 1rem;
            font-size: 0.875rem;
            font-weight: 500;
            border-radius: 6px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: background-color 0.15s ease;
            background-color: var(--primary);
            color: #ffffff;
        }

        .btn:hover {
            background-color: var(--primary-hover);
        }

        a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
        }

        a:hover {
            text-decoration: underline;
        }

        form.inline {
            display: inline;
        }

        button[type="submit"]:not(.btn) {
            background: none;
            border: none;
            color: var(--danger);
            font-weight: 500;
            cursor: pointer;
            font-size: inherit;
            font-family: inherit;
        }

        button[type="submit"]:not(.btn):hover {
            text-decoration: underline;
        }

        /* Flash Message Alert */
        .alert-success {
            background-color: #f0fdf4;
            color: #166534;
            border: 1px solid #bbf7d0;
            padding: 0.75rem 1rem;
            border-radius: 6px;
            margin-bottom: 1.25rem;
            font-size: 0.875rem;
        }

        /* Catatan Kaki Modal / Info */
        p em {
            color: var(--text-muted);
            font-size: 0.8rem;
            display: block;
            margin-top: 1.5rem;
        }

        /* Footer */
        footer {
            text-align: center;
            padding: 1.5rem;
            color: var(--text-muted);
            font-size: 0.825rem;
            border-top: 1px solid var(--border-color);
            background-color: #ffffff;
            margin-top: auto;
        }
    </style>
</head>
<body>

    @include('partials.navbar')

    <main>
        @include('partials.alert')
        @yield('content')
    </main>

    <footer>
        &copy; 2026 Sistem Perpustakaan Digital Kampus
    </footer>

</body>
</html>
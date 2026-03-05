<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'BroNet') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@400;600;700;800&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            primary: '#006D77',
                            secondary: '#EDF6F9',
                            accent: '#FFDDD2',
                        }
                    }
                }
            }
        </script>
        <script src="{{ asset('js/app.js') }}" defer></script>

        <style>
            :root {
                --bn-primary: #006D77;
                --bn-primary-light: #83C5BE;
                --bn-secondary: #f8fafc;
                --bn-dark: #0f172a;
                --bn-slate: #64748b;
                --bn-border: rgba(226, 232, 240, 0.8);
                --bn-radius: 20px;
                --bn-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
                --bn-shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
            }

            body {
                background-color: var(--bn-secondary);
                font-family: 'Inter', sans-serif;
                color: var(--bn-dark);
                -webkit-font-smoothing: antialiased;
            }

            h1, h2, h3, h4, .font-heading {
                font-family: 'Outfit', sans-serif !important;
                letter-spacing: -0.02em;
            }

            /* --- Unified Components --- */
            
            .bn-card {
                background: white;
                border-radius: var(--bn-radius);
                border: 1px solid var(--bn-border);
                box-shadow: var(--bn-shadow);
                transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
                padding: 1rem;
            }
            @media (min-width: 768px) {
                .bn-card { padding: 1.25rem; }
            }
            .bn-card:hover {
                box-shadow: var(--bn-shadow-lg);
                transform: translateY(-2px);
            }

            .bn-heading {
                font-size: 1.5rem; /* Reduced from 1.875rem */
                font-weight: 800;
                color: var(--bn-dark);
                line-height: 1.1;
            }

            .bn-subheading {
                font-size: 0.75rem;
                font-weight: 700;
                text-transform: uppercase;
                letter-spacing: 0.1em;
                color: var(--bn-slate);
            }

            .bn-badge {
                display: inline-flex;
                align-items: center;
                padding: 0.25rem 0.75rem;
                border-radius: 9999px;
                font-size: 0.7rem;
                font-weight: 800;
                text-transform: uppercase;
                letter-spacing: 0.05em;
            }
            .bn-badge-success { background: #dcfce7; color: #166534; }
            .bn-badge-warning { background: #fef3c7; color: #92400e; }
            .bn-badge-danger { background: #fee2e2; color: #991b1b; }

            .bn-btn-primary {
                background: var(--bn-primary);
                color: white;
                padding: 0.75rem 1.5rem;
                border-radius: 12px;
                font-weight: 700;
                font-size: 0.875rem;
                transition: all 0.2s;
                display: inline-flex;
                align-items: center;
                gap: 0.5rem;
                box-shadow: 0 4px 6px -1px rgba(0, 109, 119, 0.2);
            }
            .bn-btn-primary:hover {
                background: #005a62;
                transform: translateY(-1px);
                box-shadow: 0 10px 15px -3px rgba(0, 109, 119, 0.3);
            }

            /* --- Table Standardization --- */
            .bn-table-container {
                overflow-x: auto;
                border-radius: var(--bn-radius);
                border: 1px solid var(--bn-border);
                background: white;
            }
            .bn-table {
                width: 100%;
                text-align: left;
                border-collapse: collapse;
            }
            .bn-table th {
                padding: 0.75rem 1rem;
                background: #f8fafc;
                font-size: 0.7rem;
                font-weight: 700;
                text-transform: uppercase;
                letter-spacing: 0.05em;
                color: var(--bn-slate);
                border-bottom: 1px solid var(--bn-border);
            }
            .bn-table td {
                padding: 0.875rem 1rem;
                border-bottom: 1px solid #f1f5f9;
                font-size: 0.8125rem;
            }
            .bn-table tr:hover td {
                background-color: #f8fafc;
            }

            /* Utillities */
            img { max-width: 100%; height: auto; }
            .logo-fixed { height: 40px !important; width: auto !important; }
        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white border-b border-gray-100">
                    <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main class="py-10">
                {{ $slot }}
            </main>
        </div>
    </body>
</html>

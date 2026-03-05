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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

        <!-- Scripts -->
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            primary: '#006D77',
                            'primary-light': '#83C5BE',
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
                --bn-secondary: #f4f7f9;
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
                background-image: 
                    radial-gradient(at 0% 0%, rgba(131, 197, 190, 0.1) 0px, transparent 50%),
                    radial-gradient(at 100% 100%, rgba(255, 221, 210, 0.05) 0px, transparent 50%);
            }

            h1, h2, h3, h4, .font-heading {
                font-family: 'Outfit', sans-serif !important;
                letter-spacing: -0.02em;
            }

            .bn-card {
                background: white;
                border: 1px solid var(--bn-border);
                border-radius: var(--bn-radius);
                box-shadow: var(--bn-shadow);
                padding: 2.5rem;
            }

            .bn-heading {
                font-size: 2rem;
                font-weight: 800;
                color: var(--bn-dark);
            }

            .bn-subheading {
                font-size: 0.75rem;
                font-weight: 700;
                text-transform: uppercase;
                letter-spacing: 0.1em;
                color: var(--bn-slate);
            }

            .bn-btn-primary {
                background: var(--bn-primary);
                color: white;
                padding: 0.875rem 1.5rem;
                border-radius: 12px;
                font-weight: 700;
                font-size: 0.875rem;
                transition: all 0.2s;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                gap: 0.5rem;
                box-shadow: 0 4px 6px -1px rgba(0, 109, 119, 0.2);
            }
            .bn-btn-primary:hover {
                background: #005a62;
                transform: translateY(-1px);
            }

            /* Utillities */
            img { max-width: 100%; height: auto; }
        </style>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="antialiased">
        <div class="min-h-screen flex flex-col justify-center py-12 sm:px-6 lg:px-8">
            {{ $slot }}
        </div>
    </body>
</html>

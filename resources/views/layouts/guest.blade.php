<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            body.auth-page {
                margin: 0;
                min-height: 100vh;
                font-family: Figtree, sans-serif;
                color: #0f172a;
                background: #f1f5f9;
            }

            .auth-shell {
                position: relative;
                min-height: 100vh;
                overflow: hidden;
            }

            .auth-shell::before {
                content: "";
                position: absolute;
                inset: 0;
                background:
                    radial-gradient(circle at top left, rgba(14, 165, 233, 0.14), transparent 30%),
                    radial-gradient(circle at bottom right, rgba(245, 158, 11, 0.16), transparent 34%);
            }

            .auth-center {
                position: relative;
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 2rem 1rem;
            }

            .auth-card {
                width: 100%;
                max-width: 28rem;
                padding: 1.75rem 1.5rem;
                border: 1px solid rgba(255, 255, 255, 0.6);
                border-radius: 1.5rem;
                background: rgba(255, 255, 255, 0.92);
                box-shadow: 0 20px 60px rgba(15, 23, 42, 0.12);
                backdrop-filter: blur(10px);
            }

            @media (min-width: 640px) {
                .auth-card {
                    padding: 2rem;
                }
            }

            .auth-label {
                display: block;
                font-size: 0.875rem;
                font-weight: 600;
                color: #334155;
            }

            .auth-errors {
                margin: 0.5rem 0 0;
                padding: 0;
                list-style: none;
                color: #dc2626;
                font-size: 0.875rem;
            }

            .auth-errors li + li {
                margin-top: 0.25rem;
            }
        </style>
    </head>
    <body class="auth-page">
        <div class="auth-shell">
            <div class="auth-center">
                <div class="auth-card">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </body>
</html>

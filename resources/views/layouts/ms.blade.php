<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'MovieSquare' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        :root {
            --ms-sidebar-width: 280px;
            --ms-shell-bg: #e9eef5;
            --ms-sidebar-bg: #0f172a;
            --ms-sidebar-border: #1e293b;
            --ms-main-bg: #f8fafc;
            --ms-card-bg: #111827;
            --ms-text-muted: #94a3b8;
            --ms-accent: #38bdf8;
        }

        * {
            box-sizing: border-box;
        }

        html,
        body {
            margin: 0;
            min-height: 100%;
            background: var(--ms-shell-bg);
            font-family: Arial, sans-serif;
            color: #111827;
        }

        .ms-shell {
            min-height: 100vh;
            background: var(--ms-shell-bg);
        }

        .ms-sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: var(--ms-sidebar-width);
            height: 100vh;
            overflow: hidden;
            background: var(--ms-sidebar-bg);
            border-right: 1px solid var(--ms-sidebar-border);
            color: #e2e8f0;
            box-shadow: 14px 0 34px rgba(15, 23, 42, 0.12);
        }

        .ms-sidebar-inner {
            height: 100%;
            padding: 24px 18px;
            display: flex;
            flex-direction: column;
        }

        .ms-brand {
            display: flex;
            align-items: center;
            gap: 12px;
            padding-bottom: 22px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            text-decoration: none;
            color: #fff;
        }

        .ms-brand-mark {
            width: 52px;
            height: 52px;
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #38bdf8, #2563eb);
            box-shadow: 0 14px 28px rgba(37, 99, 235, 0.25);
        }

        .ms-brand-mark svg {
            width: 28px;
            height: 28px;
        }

        .ms-brand-copy small {
            display: block;
            font-size: 11px;
            letter-spacing: 0.28em;
            text-transform: uppercase;
            color: #bae6fd;
        }

        .ms-brand-copy strong {
            display: block;
            margin-top: 2px;
            font-size: 26px;
            line-height: 1;
        }

        .ms-sidebar-note {
            margin-top: 18px;
            padding: 16px;
            border-radius: 18px;
            background: #111827;
            border: 1px solid rgba(255, 255, 255, 0.06);
            color: var(--ms-text-muted);
            font-size: 13px;
            line-height: 1.5;
        }

        .ms-sidebar-note strong {
            display: block;
            margin-bottom: 6px;
            color: #fff;
            font-size: 12px;
            letter-spacing: 0.12em;
            text-transform: uppercase;
        }

        .ms-nav {
            margin-top: 22px;
            display: grid;
            gap: 10px;
        }

        .ms-nav-link {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 14px 16px;
            border-radius: 18px;
            color: #cbd5e1;
            text-decoration: none;
            font-size: 16px;
            font-weight: 700;
            transition: background 0.2s ease, color 0.2s ease;
        }

        .ms-nav-link:hover {
            background: #1f2937;
            color: #fff;
        }

        .ms-nav-link.is-active {
            background: #172554;
            color: #e0f2fe;
            box-shadow: inset 0 0 0 1px rgba(56, 189, 248, 0.22);
        }

        .ms-nav-link svg {
            width: 22px;
            height: 22px;
            flex: 0 0 auto;
        }

        .ms-main {
            margin-left: var(--ms-sidebar-width);
            min-height: 100vh;
            background: var(--ms-shell-bg);
        }

        .ms-topbar {
            position: sticky;
            top: 0;
            z-index: 20;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            padding: 18px 28px;
            background: #ffffff;
            border-bottom: 1px solid #dbe3ee;
        }

        .ms-topbar-actions {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .ms-pill {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            height: 42px;
            padding: 0 18px;
            border-radius: 999px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 700;
            transition: background 0.2s ease, color 0.2s ease;
        }

        .ms-pill-muted {
            background: #f1f5f9;
            color: #334155;
            border: 1px solid #dbe3ee;
        }

        .ms-pill-muted:hover {
            background: #e2e8f0;
        }

        .ms-pill-primary {
            background: #0ea5e9;
            color: #fff;
            box-shadow: 0 10px 24px rgba(14, 165, 233, 0.2);
        }

        .ms-pill-primary:hover {
            background: #0284c7;
        }

        .ms-topbar-spacer {
            flex: 1;
        }

        .ms-logout-form {
            margin: 0;
        }

        .ms-pill-danger {
            background: #fff1f2;
            color: #be123c;
            border: 1px solid #fecdd3;
            cursor: pointer;
        }

        .ms-pill-danger:hover {
            background: #ffe4e6;
        }

        .ms-content {
            padding: 28px;
        }

        .ms-content-panel {
            min-height: calc(100vh - 102px);
            padding: 22px;
            border-radius: 28px 0 0 0;
            background: var(--ms-main-bg);
            border-left: 1px solid #dbe3ee;
            border-top: 1px solid #dbe3ee;
        }

        @media (max-width: 980px) {
            :root {
                --ms-sidebar-width: 240px;
            }

            .ms-content,
            .ms-topbar {
                padding-left: 18px;
                padding-right: 18px;
            }

            .ms-content-panel {
                padding: 16px;
            }

            .ms-topbar-actions {
                display: none;
            }
        }
    </style>
</head>

<body>
<div class="ms-shell">
    <aside class="ms-sidebar">
        <div class="ms-sidebar-inner">
            <a href="{{ route('dashboard') }}" class="ms-brand">
                <div class="ms-brand-mark">
                    <svg viewBox="0 0 24 24" fill="currentColor">
                        <path d="M5 4.5v15a1 1 0 0 0 1.53.85l11.5-7.5a1 1 0 0 0 0-1.7L6.53 3.65A1 1 0 0 0 5 4.5Z"></path>
                    </svg>
                </div>

                <div class="ms-brand-copy">
                    <small>Movie</small>
                    <strong>Square</strong>
                </div>
            </a>

            <div class="ms-sidebar-note">
                <strong>Welcome</strong>
                Browse your movies and profile here.
            </div>

            <nav class="ms-nav">
                <a href="{{ route('dashboard') }}" class="ms-nav-link {{ request()->routeIs('dashboard') ? 'is-active' : '' }}">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9">
                        <path d="M3 12l9-8 9 8"></path>
                        <path d="M5 10v10h14V10"></path>
                    </svg>
                    <span>Home</span>
                </a>

                <a href="{{ route('movies.index') }}" class="ms-nav-link {{ request()->routeIs('movies.*') ? 'is-active' : '' }}">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9">
                        <rect x="3" y="3" width="18" height="18" rx="2"></rect>
                        <path d="M3 9h18"></path>
                        <path d="M9 21V9"></path>
                    </svg>
                    <span>Movies</span>
                </a>

                <a href="{{ route('favorites') }}" class="ms-nav-link {{ request()->routeIs('favorites') ? 'is-active' : '' }}">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9">
                        <path d="M12 17.3l-5.56 3.28 1.48-6.3L3 10.09l6.46-.55L12 3.6l2.54 5.94 6.46.55-4.92 4.19 1.48 6.3z"></path>
                    </svg>
                    <span>Favorites</span>
                </a>

                <a href="{{ route('me') }}" class="ms-nav-link {{ request()->routeIs('me') || request()->routeIs('me.*') ? 'is-active' : '' }}">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9">
                        <path d="M20 21a8 8 0 0 0-16 0"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                    <span>User Profile</span>
                </a>

                <a href="{{ route('payment') }}" class="ms-nav-link {{ request()->routeIs('payment') ? 'is-active' : '' }}">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9">
                        <rect x="3" y="6" width="18" height="12" rx="2"></rect>
                        <path d="M3 10h18"></path>
                    </svg>
                    <span>Payment</span>
                </a>
            </nav>
        </div>
    </aside>

    <main class="ms-main">
        <div class="ms-topbar">
            <div class="ms-topbar-spacer"></div>

            <div class="ms-topbar-actions">
                <a href="{{ route('dashboard') }}" class="ms-pill ms-pill-primary">Browse Movies</a>
                <form method="POST" action="{{ route('logout') }}" class="ms-logout-form">
                    @csrf
                    <button type="submit" class="ms-pill ms-pill-danger">Log Out</button>
                </form>
            </div>
        </div>

        <div class="ms-content">
            <div class="ms-content-panel">
                @yield('content')
            </div>
        </div>
    </main>
</div>
</body>
</html>

@if (session('status'))
    <div class="auth-alert auth-alert-success">
        {{ session('status') }}
    </div>
@endif

<x-guest-layout>
    <style>
        .auth-header {
            margin-bottom: 2rem;
            text-align: center;
        }

        .auth-logo {
            width: 3.5rem;
            height: 3.5rem;
            margin: 0 auto 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 1rem;
            background: #0f172a;
            color: #fff;
            font-size: 0.875rem;
            font-weight: 700;
            letter-spacing: 0.2em;
        }

        .auth-title {
            margin: 0;
            font-size: 1.875rem;
            font-weight: 600;
            letter-spacing: -0.02em;
            color: #0f172a;
        }

        .auth-subtitle {
            margin: 0.5rem 0 0;
            font-size: 0.95rem;
            line-height: 1.6;
            color: #64748b;
        }

        .auth-status {
            margin-bottom: 1rem;
        }

        .auth-field + .auth-field {
            margin-top: 1.25rem;
        }

        .auth-field-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
        }

        .auth-link {
            color: #0369a1;
            text-decoration: none;
            font-size: 0.875rem;
            font-weight: 600;
            transition: color 0.2s ease;
        }

        .auth-link:hover {
            color: #0c4a6e;
        }

        .auth-row {
            margin-top: 1.25rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .auth-check {
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            font-size: 0.875rem;
            color: #475569;
        }

        .auth-check input {
            width: 1rem;
            height: 1rem;
            accent-color: #0369a1;
        }

        .auth-submit {
            margin-top: 1.75rem;
        }

        .auth-footer {
            margin-top: 1.25rem;
            text-align: center;
            font-size: 0.875rem;
            color: #64748b;
        }

        .auth-footer a {
            color: #334155;
            text-decoration: none;
            font-weight: 600;
        }

        .auth-footer a:hover {
            color: #0f172a;
        }

        .auth-alert {
            margin-bottom: 1rem;
            padding: 0.85rem 1rem;
            border-radius: 1rem;
            border: 1px solid;
            font-size: 0.875rem;
        }

        .auth-alert-success {
            color: #047857;
            background: #ecfdf5;
            border-color: #a7f3d0;
        }

        .auth-input {
            width: 100%;
            box-sizing: border-box;
            margin-top: 0.5rem;
            padding: 0.9rem 1rem;
            border: 1px solid #e2e8f0;
            border-radius: 1rem;
            background: #f8fafc;
            color: #0f172a;
            box-shadow: 0 1px 2px rgba(15, 23, 42, 0.06);
            transition: border-color 0.2s ease, box-shadow 0.2s ease, background 0.2s ease;
        }

        .auth-input::placeholder {
            color: #94a3b8;
        }

        .auth-input:focus {
            outline: none;
            border-color: #38bdf8;
            background: #fff;
            box-shadow: 0 0 0 4px #e0f2fe;
        }

        .auth-button {
            width: 100%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.9rem 1rem;
            border: 0;
            border-radius: 1rem;
            background: #0f172a;
            color: #fff;
            font-size: 0.95rem;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.2s ease, background 0.2s ease, box-shadow 0.2s ease;
        }

        .auth-button:hover {
            background: #1e293b;
            transform: translateY(-1px);
            box-shadow: 0 12px 24px rgba(15, 23, 42, 0.16);
        }

        .auth-button:focus {
            outline: none;
            box-shadow: 0 0 0 4px #e2e8f0;
        }

        .auth-password-wrap {
            position: relative;
            margin-top: 0.5rem;
        }

        .auth-password-input {
            margin-top: 0;
            padding-right: 5.5rem;
        }

        .auth-password-toggle {
            position: absolute;
            top: 50%;
            right: 0.9rem;
            transform: translateY(-50%);
            border: 0;
            background: transparent;
            color: #0369a1;
            cursor: pointer;
            padding: 0.25rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .auth-password-toggle:hover {
            color: #0c4a6e;
        }

        .auth-password-toggle:focus {
            outline: none;
            color: #0c4a6e;
        }

        .auth-password-icon {
            width: 1.25rem;
            height: 1.25rem;
            display: block;
        }

        .auth-password-toggle .icon-hide {
            display: none;
        }

        .auth-password-toggle.is-visible .icon-show {
            display: none;
        }

        .auth-password-toggle.is-visible .icon-hide {
            display: block;
        }

        .sr-only {
            position: absolute;
            width: 1px;
            height: 1px;
            padding: 0;
            margin: -1px;
            overflow: hidden;
            clip: rect(0, 0, 0, 0);
            white-space: nowrap;
            border: 0;
        }
    </style>

    <div class="auth-header">
        <div class="auth-logo">
            MS
        </div>
        <h1 class="auth-title">Welcome back</h1>
        <p class="auth-subtitle">
            Sign in to continue tracking movies and managing your profile.
        </p>
    </div>

    <x-auth-session-status class="auth-alert auth-status" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="auth-field">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="you@example.com" />
            <x-input-error :messages="$errors->get('email')" />
        </div>

        <div class="auth-field">
            <div class="auth-field-header">
                <x-input-label for="password" :value="__('Password')" />

                @if (Route::has('password.request'))
                    <a class="auth-link" href="{{ route('password.request') }}">
                        {{ __('Forgot password?') }}
                    </a>
                @endif
            </div>

            <div class="auth-password-wrap">
                <x-text-input id="password"
                                class="auth-password-input"
                                type="password"
                                name="password"
                                required autocomplete="current-password"
                                placeholder="Enter your password" />

                <button
                    class="auth-password-toggle"
                    type="button"
                    data-password-toggle
                    aria-controls="password"
                    aria-pressed="false"
                    aria-label="Show password"
                >
                    <svg class="auth-password-icon icon-show" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12s3.75-7.5 9.75-7.5S21.75 12 21.75 12s-3.75 7.5-9.75 7.5S2.25 12 2.25 12Z" />
                        <circle cx="12" cy="12" r="3.25" />
                    </svg>
                    <svg class="auth-password-icon icon-hide" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 3l18 18" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.58 10.58A2 2 0 0 0 12 16c.55 0 1.05-.22 1.42-.58" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.88 5.09A10.94 10.94 0 0 1 12 4.5c6 0 9.75 7.5 9.75 7.5a17.6 17.6 0 0 1-4.09 4.77" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.61 6.61A17.33 17.33 0 0 0 2.25 12s3.75 7.5 9.75 7.5a10.7 10.7 0 0 0 5.39-1.44" />
                    </svg>
                    <span class="sr-only">Show password</span>
                </button>
            </div>

            <x-input-error :messages="$errors->get('password')" />
        </div>

        <div class="auth-row">
            <label for="remember_me" class="auth-check">
                <input id="remember_me" type="checkbox" name="remember">
                <span>{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="auth-submit">
            <x-primary-button>
                {{ __('Log in') }}
            </x-primary-button>
        </div>

        <div class="auth-footer">
            <a href="{{ route('register') }}">
                {{ __("Don't have an account? Register") }}
            </a>
        </div>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const passwordInput = document.getElementById('password');
            const passwordToggle = document.querySelector('[data-password-toggle]');

            if (!passwordInput || !passwordToggle) {
                return;
            }

            passwordToggle.addEventListener('click', function () {
                const isHidden = passwordInput.type === 'password';

                passwordInput.type = isHidden ? 'text' : 'password';
                passwordToggle.classList.toggle('is-visible', isHidden);
                passwordToggle.setAttribute('aria-pressed', String(isHidden));
                passwordToggle.setAttribute('aria-label', isHidden ? 'Hide password' : 'Show password');
                const label = passwordToggle.querySelector('.sr-only');
                if (label) {
                    label.textContent = isHidden ? 'Hide password' : 'Show password';
                }
            });
        });
    </script>
</x-guest-layout>

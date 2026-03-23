@php($title = 'Payment')
@extends('layouts.ms')

@section('content')
    <style>
        .payment-page {
            max-width: 980px;
            margin: 0 auto;
            padding: 10px 14px 28px;
            font-family: Arial, sans-serif;
            color: #111827;
        }

        .payment-shell {
            display: grid;
            grid-template-columns: 1.15fr 0.85fr;
            gap: 22px;
        }

        .payment-card {
            padding: 26px;
            border-radius: 26px;
            background: #fff;
            border: 1px solid #dbe3ee;
            box-shadow: 0 12px 28px rgba(15, 23, 42, 0.06);
        }

        .payment-hero {
            background: linear-gradient(135deg, #0f172a 0%, #1d4ed8 100%);
            color: #fff;
        }

        .payment-hero h1 {
            margin: 0 0 12px;
            font-size: 34px;
        }

        .payment-hero p {
            margin: 0;
            max-width: 520px;
            line-height: 1.7;
            color: rgba(255, 255, 255, 0.82);
        }

        .payment-status {
            display: inline-flex;
            align-items: center;
            margin-top: 18px;
            padding: 7px 12px;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.14);
            font-size: 13px;
            font-weight: 700;
        }

        .payment-demo-note {
            margin-top: 16px;
            max-width: 560px;
            font-size: 13px;
            line-height: 1.7;
            color: rgba(255, 255, 255, 0.78);
        }

        .payment-list {
            display: grid;
            gap: 12px;
            margin-top: 18px;
        }

        .payment-item {
            padding: 14px 16px;
            border-radius: 16px;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
        }

        .payment-item strong {
            display: block;
            margin-bottom: 6px;
            font-size: 14px;
        }

        .payment-item span {
            font-size: 13px;
            color: #475569;
            line-height: 1.6;
        }

        .payment-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 48px;
            margin-top: 18px;
            border: 0;
            border-radius: 16px;
            background: #0ea5e9;
            color: #fff;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
        }

        .payment-button:disabled {
            background: #94a3b8;
            cursor: default;
        }

        .payment-note {
            margin-top: 12px;
            font-size: 13px;
            color: #64748b;
            line-height: 1.6;
        }

        .payment-alert {
            margin-bottom: 18px;
            padding: 14px 16px;
            border-radius: 16px;
            font-size: 14px;
            font-weight: 600;
        }

        .payment-alert.success {
            background: #dcfce7;
            color: #166534;
        }

        .payment-alert.info {
            background: #e0f2fe;
            color: #0c4a6e;
        }

        @media (max-width: 900px) {
            .payment-shell {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <div class="payment-page">
        @if (session('payment_success'))
            <div class="payment-alert success">{{ session('payment_success') }}</div>
        @endif

        @if (session('payment_notice'))
            <div class="payment-alert info">{{ session('payment_notice') }}</div>
        @endif

        <div class="payment-shell">
            <section class="payment-card payment-hero">
                <h1>Premium Movie Access</h1>
                <p>This sample payment page works as an instant premium unlock. Once the user clicks the activate button, the account is automatically upgraded right away and the extra movie features become available immediately.</p>
                <div class="payment-status">
                    {{ $hasPaid ? 'Payment Active Right Now' : 'One Click Instant Activation' }}
                </div>
                <div class="payment-demo-note">
                    Since this is a prototype system, there is no real payment gateway here. The button simply simulates a successful payment so you can demonstrate the premium flow smoothly inside your project.
                </div>
            </section>

            <section class="payment-card">
                <h2 style="margin: 0 0 14px; font-size: 24px;">Unlocked Features</h2>

                <div class="payment-list">
                    <div class="payment-item">
                        <strong>Favorite Button on Movies</strong>
                        <span>As soon as payment is activated, users can mark movies they love directly from the movie detail page.</span>
                    </div>

                    <div class="payment-item">
                        <strong>Favorites in Sidebar</strong>
                        <span>Saved movies appear in a dedicated favorites section so users can quickly go back to the titles they like most.</span>
                    </div>

                    <div class="payment-item">
                        <strong>Instant Demo Upgrade</strong>
                        <span>The activation is automatic in one click, which makes it easy to present the sample system without adding real payment processing yet.</span>
                    </div>
                </div>

                <div class="payment-note">
                    Current saved favorites: {{ $favoriteCount }} movie(s).
                </div>

                <form method="POST" action="{{ route('payment.activate') }}">
                    @csrf
                    <button type="submit" class="payment-button" @disabled($hasPaid)>
                        {{ $hasPaid ? 'Payment Already Activated' : 'Activate Payment Instantly' }}
                    </button>
                </form>

                <div class="payment-note">
                    Clicking the button instantly updates the account in this sample project. After that, users can immediately save favorite movies and open them from the sidebar.
                </div>
            </section>
        </div>
    </div>
@endsection

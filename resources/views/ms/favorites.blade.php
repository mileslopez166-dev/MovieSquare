@php($title = 'Favorites')
@extends('layouts.ms')

@section('content')
    <style>
        .favorites-page {
            max-width: 1200px;
            margin: 0 auto;
            padding: 10px 14px 28px;
            font-family: Arial, sans-serif;
            color: #111827;
        }

        .favorites-hero {
            padding: 28px;
            border-radius: 28px;
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            color: #fff;
            margin-bottom: 24px;
        }

        .favorites-hero h1 {
            margin: 0 0 10px;
            font-size: 34px;
        }

        .favorites-hero p {
            margin: 0;
            max-width: 620px;
            color: rgba(255, 255, 255, 0.82);
            line-height: 1.7;
        }

        .favorites-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-top: 18px;
            height: 42px;
            padding: 0 18px;
            border-radius: 999px;
            background: #fff;
            color: #0f172a;
            text-decoration: none;
            font-size: 14px;
            font-weight: 700;
        }

        .favorites-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
            gap: 18px;
        }

        .favorites-card {
            display: block;
            color: inherit;
            text-decoration: none;
        }

        .favorites-poster {
            border-radius: 16px;
            overflow: hidden;
            aspect-ratio: 2 / 3;
            background: #e5e7eb;
            box-shadow: 0 1px 3px rgba(15, 23, 42, 0.12);
        }

        .favorites-poster img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .favorites-title {
            margin-top: 10px;
            font-size: 14px;
            font-weight: 700;
        }

        .favorites-meta {
            margin-top: 6px;
            font-size: 12px;
            color: #4b5563;
        }

        .favorites-empty {
            padding: 24px;
            border: 1px dashed #cbd5e1;
            border-radius: 20px;
            background: #fff;
            text-align: center;
            color: #64748b;
        }
    </style>

    <div class="favorites-page">
        <section class="favorites-hero">
            <h1>Favorite Movies</h1>
            <p>Keep the movies you love in one place and jump back into them anytime from your own favorites shelf.</p>

            @if (! $hasPaid)
                <a href="{{ route('payment') }}" class="favorites-link">Unlock Favorites</a>
            @endif
        </section>

        @if (! $hasPaid)
            <div class="favorites-empty">Favorites are available after payment is activated on your account.</div>
        @elseif (count($favoriteMovies))
            <div class="favorites-grid">
                @foreach ($favoriteMovies as $movie)
                    <a href="{{ route('movies.show', $movie['id']) }}" class="favorites-card">
                        <div class="favorites-poster">
                            <img src="{{ $movie['image'] }}" alt="{{ $movie['title'] }}">
                        </div>
                        <div class="favorites-title">{{ $movie['title'] }}</div>
                        <div class="favorites-meta">{{ $movie['year'] }} | {{ $movie['genre'] }}</div>
                    </a>
                @endforeach
            </div>
        @else
            <div class="favorites-empty">You do not have any favorite movies yet. Open a movie and tap the favorite button.</div>
        @endif
    </div>
@endsection

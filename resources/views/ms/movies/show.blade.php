@php($title = $movie['title'] ?? 'Movie')
@extends('layouts.ms')

@section('content')
    <style>
        .movie-view {
            max-width: 1180px;
            margin: 0 auto;
            padding: 10px 14px 28px;
            font-family: Arial, sans-serif;
            color: #111827;
        }

        .movie-topbar {
            margin-bottom: 18px;
        }

        .movie-search {
            position: relative;
            width: min(100%, 420px);
        }

        .movie-search svg {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            width: 18px;
            height: 18px;
            color: #6b7280;
        }

        .movie-search input {
            width: 100%;
            height: 42px;
            padding: 0 14px 0 42px;
            border: 1px solid #d1d5db;
            border-radius: 999px;
            background: #fff;
            font-size: 14px;
            outline: none;
        }

        .movie-search input:focus {
            border-color: #60a5fa;
            box-shadow: 0 0 0 3px rgba(96, 165, 250, 0.18);
        }

        .movie-stage {
            border-radius: 28px;
            overflow: hidden;
            background: #f8fafc;
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.08);
        }

        .movie-hero {
            display: grid;
            grid-template-columns: 320px minmax(0, 1fr);
            min-height: 420px;
            background: linear-gradient(135deg, #dbeafe 0%, #eff6ff 45%, #ffffff 100%);
        }

        .movie-poster {
            height: 100%;
            background: #0f172a;
        }

        .movie-poster img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .movie-info {
            padding: 34px;
            display: flex;
            flex-direction: column;
            gap: 22px;
        }

        .movie-info-top {
            display: flex;
            justify-content: space-between;
            gap: 16px;
            align-items: flex-start;
        }

        .movie-title {
            margin: 0 0 10px;
            font-size: 38px;
            line-height: 1.05;
            font-weight: 800;
        }

        .movie-meta {
            font-size: 14px;
            color: #475569;
            line-height: 1.7;
        }

        .movie-rating {
            white-space: nowrap;
            font-size: 18px;
            font-weight: 700;
            color: #f59e0b;
        }

        .movie-description {
            margin: 0;
            max-width: 620px;
            font-size: 15px;
            line-height: 1.7;
            color: #334155;
        }

        .movie-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        .movie-button {
            min-width: 150px;
            height: 44px;
            border-radius: 10px;
            border: 1px solid #cbd5e1;
            background: #ffffff;
            color: #111827;
            font-size: 14px;
            font-weight: 700;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .movie-button.primary {
            background: #0f172a;
            border-color: #0f172a;
            color: #ffffff;
        }

        .movie-button.favorite {
            background: #fff7ed;
            border-color: #fdba74;
            color: #9a3412;
        }

        .movie-button.locked {
            background: #f8fafc;
            border-color: #cbd5e1;
            color: #475569;
        }

        .movie-favorite-form {
            margin: 0;
        }

        .movie-section {
            padding: 24px;
            background: #ffffff;
            border-top: 1px solid #e2e8f0;
        }

        .movie-section h2 {
            margin: 0 0 16px;
            font-size: 24px;
        }

        .movie-player {
            border-radius: 22px;
            overflow: hidden;
            background: #0f172a;
            min-height: 420px;
            position: relative;
        }

        .movie-player img {
            width: 100%;
            height: 100%;
            min-height: 420px;
            object-fit: cover;
            display: block;
            filter: brightness(0.65);
        }

        .movie-player-overlay {
            position: absolute;
            inset: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 14px;
            color: #ffffff;
            text-align: center;
            padding: 20px;
        }

        .movie-play-icon {
            width: 74px;
            height: 74px;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.18);
            border: 1px solid rgba(255, 255, 255, 0.3);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
        }

        .movie-cast-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
            gap: 18px;
        }

        .movie-cast-card {
            border-radius: 18px;
            overflow: hidden;
            background: #f8fafc;
            box-shadow: 0 1px 3px rgba(15, 23, 42, 0.08);
        }

        .movie-cast-icon {
            width: 100%;
            height: 190px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #e2e8f0;
            color: #475569;
        }

        .movie-cast-icon svg {
            width: 66px;
            height: 66px;
        }

        .movie-cast-body {
            padding: 14px;
        }

        .movie-cast-name {
            font-size: 15px;
            font-weight: 700;
        }

        .movie-cast-role {
            margin-top: 6px;
            font-size: 13px;
            color: #64748b;
        }

        .movie-review-list {
            display: grid;
            gap: 14px;
        }

        .movie-review-card {
            padding: 18px;
            border-radius: 16px;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
        }

        .movie-review-author {
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: 700;
        }

        .movie-review-text {
            margin: 0;
            line-height: 1.7;
            color: #334155;
        }

        .movie-strip {
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 22px 24px 24px;
            background: #ffffff;
            border-top: 1px solid #e2e8f0;
            overflow-x: auto;
        }

        .movie-thumb {
            flex: 0 0 120px;
            text-decoration: none;
            color: inherit;
        }

        .movie-thumb-frame {
            height: 82px;
            border-radius: 12px;
            overflow: hidden;
            background: #cbd5e1;
            box-shadow: 0 1px 3px rgba(15, 23, 42, 0.12);
        }

        .movie-thumb-frame img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .movie-thumb-title {
            margin-top: 8px;
            font-size: 12px;
            font-weight: 700;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .movie-strip-more {
            flex: 0 0 auto;
            width: 42px;
            height: 42px;
            border-radius: 999px;
            border: 1px solid #94a3b8;
            background: #ffffff;
            color: #0f172a;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            text-decoration: none;
        }

        @media (max-width: 900px) {
            .movie-search {
                width: 100%;
            }

            .movie-hero {
                grid-template-columns: 1fr;
            }

            .movie-poster {
                height: 360px;
            }

            .movie-info,
            .movie-section {
                padding: 24px 20px;
            }

            .movie-info-top {
                flex-direction: column;
            }

            .movie-player,
            .movie-player img {
                min-height: 300px;
            }
        }
    </style>

    <div class="movie-view">
        <div class="movie-topbar">
            <label class="movie-search" for="movie-page-search">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <circle cx="11" cy="11" r="7"></circle>
                    <path d="M21 21l-4.3-4.3"></path>
                </svg>
                <input id="movie-page-search" type="text" value="{{ $movie['title'] }}" readonly>
            </label>
        </div>

        <section class="movie-stage">
            <div class="movie-hero">
                <div class="movie-poster">
                    <img src="{{ $movie['image'] }}" alt="{{ $movie['title'] }}">
                </div>

                <div class="movie-info">
                    <div class="movie-info-top">
                        <div>
                            <h1 class="movie-title">{{ $movie['title'] }}</h1>
                            <div class="movie-meta">
                                <div>{{ $movie['year'] }} | {{ $movie['duration'] }}</div>
                                <div>{{ $movie['genre'] }}</div>
                            </div>
                        </div>

                        <div class="movie-rating">{{ $movie['rating'] }} / 5</div>
                    </div>

                    <p class="movie-description">{{ $movie['description'] }}</p>

                    <div class="movie-actions">
                        <a href="#movie-reviews" class="movie-button">Comments</a>
                        <a href="{{ route('movies.watch', $movie['id']) }}" class="movie-button primary">Watch now!</a>
                        @if ($hasPaid)
                            <form method="POST" action="{{ route('movies.favorite', $movie['id']) }}" class="movie-favorite-form">
                                @csrf
                                <button type="submit" class="movie-button favorite">
                                    {{ $isFavorite ? 'Remove Favorite' : 'Add to Favorites' }}
                                </button>
                            </form>
                        @else
                            <a href="{{ route('payment') }}" class="movie-button locked">Unlock Favorites</a>
                        @endif
                    </div>
                </div>
            </div>

            <div class="movie-section">
                <h2>Cast Profile</h2>
                <div class="movie-cast-grid">
                    @foreach($movie['cast'] as $actor)
                        <article class="movie-cast-card">
                            <div class="movie-cast-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                    <path d="M20 21a8 8 0 0 0-16 0"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                            </div>
                            <div class="movie-cast-body">
                                <div class="movie-cast-name">{{ $actor['name'] }}</div>
                                <div class="movie-cast-role">{{ $actor['role'] }}</div>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>

            <div id="movie-reviews" class="movie-section">
                <h2>Comments</h2>
                <div class="movie-review-list">
                    @foreach($movie['reviews'] as $review)
                        <article class="movie-review-card">
                            <div class="movie-review-author">{{ $review['author'] }}</div>
                            <p class="movie-review-text">{{ $review['comment'] }}</p>
                        </article>
                    @endforeach
                </div>
            </div>

            <div class="movie-strip">
                @foreach($movies as $related)
                    <a href="{{ route('movies.show', $related['id']) }}" class="movie-thumb">
                        <div class="movie-thumb-frame">
                            <img src="{{ $related['image'] }}" alt="{{ $related['title'] }}">
                        </div>
                        <div class="movie-thumb-title">{{ $related['title'] }}</div>
                    </a>
                @endforeach

                <a href="{{ route('dashboard') }}" class="movie-strip-more">&#8594;</a>
            </div>
        </section>
    </div>
@endsection

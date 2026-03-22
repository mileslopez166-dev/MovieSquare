@php($title = 'Watch ' . ($movie['title'] ?? 'Movie'))
@extends('layouts.ms')

@section('content')
    <style>
        .watch-page {
            max-width: 1280px;
            margin: 0 auto;
            padding: 10px 14px 28px;
            font-family: Arial, sans-serif;
            color: #e5e7eb;
        }

        .watch-topbar {
            margin-bottom: 18px;
        }

        .watch-search {
            position: relative;
            width: min(100%, 420px);
        }

        .watch-search svg {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            width: 18px;
            height: 18px;
            color: #94a3b8;
        }

        .watch-search input {
            width: 100%;
            height: 42px;
            padding: 0 14px 0 42px;
            border: 1px solid #334155;
            border-radius: 999px;
            background: #0f172a;
            color: #e5e7eb;
            font-size: 14px;
            outline: none;
        }

        .watch-shell {
            overflow: hidden;
            border-radius: 24px;
            background: #111827;
            box-shadow: 0 18px 40px rgba(15, 23, 42, 0.25);
        }

        .watch-player-grid {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 320px;
            min-height: 420px;
            background: #111827;
        }

        .watch-player {
            position: relative;
            background: #020617;
        }

        .watch-player img {
            width: 100%;
            height: 100%;
            min-height: 420px;
            object-fit: cover;
            display: block;
            filter: brightness(0.42);
        }

        .watch-player-overlay {
            position: absolute;
            inset: 0;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 20px;
            background: linear-gradient(180deg, rgba(2, 6, 23, 0.2) 0%, rgba(2, 6, 23, 0.55) 100%);
        }

        .watch-float-ad {
            align-self: center;
            width: min(100%, 520px);
            padding: 18px 20px;
            border-radius: 16px;
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.94), rgba(16, 185, 129, 0.94));
            color: #ffffff;
            text-align: center;
            box-shadow: 0 16px 30px rgba(0, 0, 0, 0.24);
        }

        .watch-float-ad strong {
            display: block;
            font-size: 24px;
            margin-bottom: 8px;
        }

        .watch-controls {
            display: flex;
            align-items: center;
            gap: 14px;
            padding-top: 16px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            font-size: 14px;
            color: #e2e8f0;
        }

        .watch-play {
            width: 42px;
            height: 42px;
            border-radius: 999px;
            background: #ffffff;
            color: #0f172a;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
        }

        .watch-progress {
            flex: 1;
            height: 6px;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.2);
            overflow: hidden;
        }

        .watch-progress-bar {
            width: 28%;
            height: 100%;
            background: #ffffff;
        }

        .watch-side {
            border-left: 1px solid #1f2937;
            background: #1f2937;
            padding: 20px;
        }

        .watch-side h2 {
            margin: 0 0 14px;
            font-size: 18px;
            color: #ffffff;
        }

        .watch-side-item + .watch-side-item {
            margin-top: 14px;
        }

        .watch-side-item {
            padding: 14px;
            border-radius: 14px;
            background: rgba(255, 255, 255, 0.04);
        }

        .watch-side-label {
            font-size: 12px;
            color: #94a3b8;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            margin-bottom: 6px;
        }

        .watch-side-value {
            font-size: 14px;
            color: #f8fafc;
            line-height: 1.6;
        }

        .watch-banner {
            display: grid;
            grid-template-columns: 1.2fr 1fr;
            gap: 20px;
            align-items: center;
            padding: 22px 24px;
            background: linear-gradient(90deg, #22d3ee 0%, #4ade80 100%);
            color: #062c30;
        }

        .watch-banner-title {
            font-size: 22px;
            font-weight: 800;
        }

        .watch-banner-actions {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
        }

        .watch-banner-button {
            height: 46px;
            padding: 0 22px;
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.92);
            color: #0f172a;
            text-decoration: none;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .watch-info {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 220px;
            gap: 24px;
            padding: 24px;
            background: #111827;
        }

        .watch-title {
            margin: 0 0 10px;
            font-size: 36px;
            color: #ffffff;
        }

        .watch-meta {
            color: #cbd5e1;
            font-size: 14px;
            line-height: 1.8;
        }

        .watch-description {
            margin-top: 12px;
            color: #e2e8f0;
            line-height: 1.8;
        }

        .watch-score {
            align-self: start;
            padding: 18px;
            border-radius: 18px;
            background: rgba(255, 255, 255, 0.05);
            text-align: center;
        }

        .watch-score strong {
            display: block;
            font-size: 34px;
            color: #ffffff;
        }

        .watch-score span {
            color: #94a3b8;
            font-size: 13px;
        }

        @media (max-width: 980px) {
            .watch-player-grid,
            .watch-banner,
            .watch-info {
                grid-template-columns: 1fr;
            }

            .watch-side {
                border-left: 0;
                border-top: 1px solid #1f2937;
            }

            .watch-banner-actions {
                justify-content: flex-start;
                flex-wrap: wrap;
            }

            .watch-player img {
                min-height: 300px;
            }
        }
    </style>

    <div class="watch-page">
        <div class="watch-topbar">
            <label class="watch-search" for="watch-search">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <circle cx="11" cy="11" r="7"></circle>
                    <path d="M21 21l-4.3-4.3"></path>
                </svg>
                <input id="watch-search" type="text" value="{{ $movie['title'] }}" readonly>
            </label>
        </div>

        <section class="watch-shell">
            <div class="watch-player-grid">
                <div class="watch-player">
                    <img src="{{ $movie['image'] }}" alt="{{ $movie['title'] }}">

                    <div class="watch-player-overlay">
                        <div class="watch-float-ad">
                            <strong>Now Playing</strong>
                            <div>{{ $movie['title'] }} is on the big player screen.</div>
                        </div>

                        <div class="watch-controls">
                            <div class="watch-play">&#9658;</div>
                            <div>01:04 / {{ $movie['duration'] }}</div>
                            <div class="watch-progress">
                                <div class="watch-progress-bar"></div>
                            </div>
                            <div>HD</div>
                            <div>Full Screen</div>
                        </div>
                    </div>
                </div>

                <aside class="watch-side">
                    <h2>Now Watching</h2>

                    <div class="watch-side-item">
                        <div class="watch-side-label">Title</div>
                        <div class="watch-side-value">{{ $movie['title'] }}</div>
                    </div>

                    <div class="watch-side-item">
                        <div class="watch-side-label">Genre</div>
                        <div class="watch-side-value">{{ $movie['genre'] }}</div>
                    </div>

                    <div class="watch-side-item">
                        <div class="watch-side-label">Subtitles</div>
                        <div class="watch-side-value">English, Filipino, French</div>
                    </div>

                    <div class="watch-side-item">
                        <div class="watch-side-label">Quality</div>
                        <div class="watch-side-value">1080p HD</div>
                    </div>
                </aside>
            </div>

            <div class="watch-banner">
                <div>
                    <div class="watch-banner-title">Download MovieSquare Free</div>
                    <div>Save movies offline, sync your watchlist, and continue watching anytime.</div>
                </div>

                <div class="watch-banner-actions">
                    <a href="#" class="watch-banner-button">Video Download</a>
                    <a href="#" class="watch-banner-button">Share</a>
                </div>
            </div>

            <div class="watch-info">
                <div>
                    <h1 class="watch-title">{{ $movie['title'] }}</h1>
                    <div class="watch-meta">{{ $movie['year'] }} | {{ $movie['duration'] }} | {{ $movie['genre'] }}</div>
                    <p class="watch-description">{{ $movie['description'] }}</p>
                </div>

                <div class="watch-score">
                    <strong>{{ $movie['rating'] }}</strong>
                    <span>Movie rating</span>
                </div>
            </div>
        </section>
    </div>
@endsection

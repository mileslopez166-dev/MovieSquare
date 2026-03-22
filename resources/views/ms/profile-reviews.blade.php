@php($title = 'My Reviews')

@extends('layouts.ms')

@section('content')
    <style>
        .review-shell {
            max-width: 1100px;
            margin: 0 auto;
            padding: 14px;
            font-family: Arial, sans-serif;
            color: #111827;
        }

        .review-header {
            margin-bottom: 22px;
        }

        .review-header h1 {
            margin: 0;
            font-size: 34px;
        }

        .review-header p {
            margin: 8px 0 0;
            color: #64748b;
        }

        .review-list {
            display: grid;
            gap: 18px;
        }

        .review-card {
            display: grid;
            grid-template-columns: 140px minmax(0, 1fr);
            gap: 18px;
            border-radius: 22px;
            background: #ffffff;
            padding: 18px;
            box-shadow: 0 10px 28px rgba(15, 23, 42, 0.06);
        }

        .review-card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 16px;
            display: block;
        }

        .review-title {
            font-size: 20px;
            font-weight: 700;
            color: #111827;
            text-decoration: none;
        }

        .review-meta {
            margin-top: 8px;
            font-size: 13px;
            color: #64748b;
        }

        .review-text {
            margin-top: 14px;
            line-height: 1.8;
            color: #334155;
        }

        .review-actions {
            margin-top: 16px;
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .review-button {
            height: 40px;
            padding: 0 16px;
            border-radius: 999px;
            text-decoration: none;
            font-size: 13px;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: #eff6ff;
            color: #1d4ed8;
        }

        @media (max-width: 760px) {
            .review-card {
                grid-template-columns: 1fr;
            }

            .review-card img {
                height: 240px;
            }
        }
    </style>

    <div class="review-shell">
        <div class="review-header">
            <h1>My Reviews</h1>
            <p>These are the comments and ratings connected to the movies you watched.</p>
        </div>

        <div class="review-list">
            @foreach($userReviews as $review)
                <article class="review-card">
                    <img src="{{ $review['movie_image'] }}" alt="{{ $review['movie_title'] }}">

                    <div>
                        <a href="{{ route('movies.show', $review['movie_id']) }}" class="review-title">{{ $review['movie_title'] }}</a>
                        <div class="review-meta">Rating: {{ $review['rating'] }} / 5</div>
                        <div class="review-text">{{ $review['comment'] }}</div>

                        <div class="review-actions">
                            <a href="{{ route('movies.show', $review['movie_id']) }}" class="review-button">Open Movie</a>
                            <a href="{{ route('movies.watch', $review['movie_id']) }}" class="review-button">Watch Again</a>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
@endsection

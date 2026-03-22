@php
    $title = 'Movies';
@endphp

@extends('layouts.ms')

@section('content')
    <style>
        .movies-page {
            max-width: 1380px;
            margin: 0 auto;
            padding: 10px 14px 32px;
            font-family: Arial, sans-serif;
            color: #111827;
        }

        .movies-toolbar {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            gap: 16px;
            margin-bottom: 18px;
        }

        .movies-search {
            position: relative;
            width: min(100%, 420px);
        }

        .movies-search-icon {
            position: absolute;
            left: 14px;
            top: 50%;
            width: 18px;
            height: 18px;
            color: #6b7280;
            transform: translateY(-50%);
            pointer-events: none;
        }

        .movies-search-input {
            width: 100%;
            height: 44px;
            padding: 0 14px 0 42px;
            border: 1px solid #d1d5db;
            border-radius: 999px;
            background: #fff;
            color: #111827;
            font-size: 14px;
            outline: none;
        }

        .movies-search-input:focus {
            border-color: #60a5fa;
            box-shadow: 0 0 0 3px rgba(96, 165, 250, 0.18);
        }

        .movies-hero {
            position: relative;
            min-height: 430px;
            margin-bottom: 30px;
            overflow: hidden;
            border-radius: 28px;
            background: linear-gradient(135deg, #0f172a 0%, #111827 52%, #1f2937 100%);
        }

        .movies-hero-slide {
            position: absolute;
            inset: 0;
        }

        .movies-hero-slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            filter: brightness(0.5);
        }

        .movies-hero-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(90deg, rgba(15, 23, 42, 0.9) 0%, rgba(15, 23, 42, 0.55) 48%, rgba(15, 23, 42, 0.12) 100%);
        }

        .movies-hero-content {
            position: absolute;
            inset: 34px;
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: 28px;
        }

        .movies-hero-copy {
            max-width: 560px;
            color: #fff;
        }

        .movies-hero-copy h1 {
            margin: 0 0 10px;
            font-size: 46px;
            line-height: 1.02;
            font-weight: 700;
        }

        .movies-hero-copy a {
            color: inherit;
            text-decoration: none;
        }

        .movies-kicker {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 14px;
            color: #bfdbfe;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.14em;
            text-transform: uppercase;
        }

        .movies-kicker span:first-child {
            padding: 5px 10px;
            border-radius: 999px;
            background: #2563eb;
            color: #fff;
        }

        .movies-meta {
            margin-bottom: 12px;
            color: rgba(255, 255, 255, 0.82);
            font-size: 14px;
        }

        .movies-description {
            margin: 0 0 18px;
            max-width: 500px;
            color: rgba(255, 255, 255, 0.84);
            font-size: 14px;
            line-height: 1.6;
        }

        .movies-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        .movies-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 132px;
            height: 42px;
            padding: 0 18px;
            border-radius: 999px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 700;
        }

        .movies-button.primary {
            background: #fff;
            color: #0f172a;
        }

        .movies-button.secondary {
            border: 1px solid rgba(255, 255, 255, 0.28);
            background: rgba(255, 255, 255, 0.08);
            color: #fff;
        }

        .movies-hero-nav {
            display: flex;
            gap: 10px;
        }

        .movies-hero-arrow {
            width: 48px;
            height: 48px;
            border: 1px solid rgba(255, 255, 255, 0.34);
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.12);
            color: #fff;
            font-size: 20px;
            cursor: pointer;
        }

        .movies-section-title {
            margin: 0 0 16px;
            font-size: 18px;
            font-weight: 700;
        }

        .movies-categories {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(165px, 1fr));
            gap: 14px;
            margin-bottom: 30px;
        }

        .movies-category {
            position: relative;
            min-height: 92px;
            padding: 18px;
            border: 0;
            border-radius: 18px;
            overflow: hidden;
            text-align: left;
            color: #fff;
            cursor: pointer;
            background: #1e293b;
        }

        .movies-category img {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0.24;
        }

        .movies-category::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(15, 23, 42, 0.74), rgba(30, 41, 59, 0.32));
        }

        .movies-category span {
            position: relative;
            z-index: 1;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            font-size: 16px;
            font-weight: 700;
        }

        .movies-category.is-active {
            outline: 2px solid #60a5fa;
            box-shadow: 0 18px 36px rgba(37, 99, 235, 0.18);
        }

        .movies-results-bar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            margin-bottom: 18px;
        }

        .movies-results-bar h2 {
            margin: 0;
            font-size: 22px;
            font-weight: 700;
        }

        .movies-results-note {
            font-size: 13px;
            color: #4b5563;
        }

        .movies-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(170px, 1fr));
            gap: 18px;
        }

        .movies-card {
            display: block;
            color: inherit;
            text-decoration: none;
        }

        .movies-poster {
            position: relative;
            border-radius: 14px;
            overflow: hidden;
            background: #e5e7eb;
            aspect-ratio: 2 / 3;
            box-shadow: 0 1px 3px rgba(15, 23, 42, 0.12);
        }

        .movies-poster img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .movies-badge {
            position: absolute;
            top: 10px;
            right: 10px;
            padding: 3px 7px;
            border-radius: 3px;
            background: #fff;
            color: #111827;
            font-size: 12px;
            font-weight: 700;
        }

        .movies-card-title {
            margin-top: 10px;
            font-size: 14px;
            font-weight: 700;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .movies-card-meta {
            margin-top: 7px;
            display: flex;
            align-items: center;
            gap: 7px;
            font-size: 12px;
            color: #4b5563;
        }

        .movies-tag {
            display: inline-block;
            margin-top: 7px;
            padding: 2px 7px;
            border: 1px solid #c7ccd4;
            border-radius: 3px;
            background: #fff;
            font-size: 12px;
            color: #4b5563;
        }

        .movies-empty {
            padding: 28px 20px;
            border: 1px dashed #cbd5e1;
            border-radius: 16px;
            background: #f8fafc;
            color: #64748b;
            text-align: center;
        }

        [x-cloak] {
            display: none !important;
        }

        @media (max-width: 900px) {
            .movies-page {
                padding-left: 6px;
                padding-right: 6px;
            }

            .movies-search {
                width: 100%;
            }

            .movies-toolbar,
            .movies-results-bar,
            .movies-hero-content {
                flex-direction: column;
                align-items: flex-start;
            }

            .movies-hero-content {
                inset: 22px;
            }

            .movies-hero-copy h1 {
                font-size: 34px;
            }

            .movies-grid {
                grid-template-columns: repeat(auto-fill, minmax(145px, 1fr));
                gap: 14px;
            }
        }
    </style>

    <div
        x-data="{
            query: '',
            slide: 0,
            activeCategory: 'all',
            heroItems: @js($heroItems),
            categories: @js($categories),
            movies: @js($movies),
            get activeMovieIds() {
                const selected = this.categories.find(category => category.id === this.activeCategory);
                return selected ? selected.movie_ids : this.movies.map(movie => movie.id);
            },
            get filteredMovies() {
                const search = this.query.toLowerCase().trim();
                return this.movies.filter(movie => {
                    const inCategory = this.activeMovieIds.includes(movie.id);
                    const matchesSearch = !search
                        || movie.title.toLowerCase().includes(search)
                        || movie.genre.toLowerCase().includes(search);
                    return inCategory && matchesSearch;
                });
            },
            get activeCategoryLabel() {
                const selected = this.categories.find(category => category.id === this.activeCategory);
                return selected ? selected.label : 'Trending Movies';
            },
            nextSlide() {
                this.slide = (this.slide + 1) % this.heroItems.length;
            },
            prevSlide() {
                this.slide = (this.slide - 1 + this.heroItems.length) % this.heroItems.length;
            }
        }"
        x-init="setInterval(() => nextSlide(), 5000)"
        class="movies-page"
    >
        <div class="movies-toolbar">
            <label class="movies-search" for="movies-search">
                <svg class="movies-search-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <circle cx="11" cy="11" r="7"></circle>
                    <path d="M21 21l-4.3-4.3"></path>
                </svg>
                <input
                    id="movies-search"
                    x-model="query"
                    type="text"
                    class="movies-search-input"
                    placeholder="Search movies / TV shows"
                    autocomplete="off"
                >
            </label>
        </div>

        <section class="movies-hero">
            <template x-for="(item, index) in heroItems" :key="item.id">
                <div class="movies-hero-slide" x-show="slide === index" x-transition.opacity x-cloak>
                    <img :src="item.image" :alt="item.title">
                    <div class="movies-hero-overlay"></div>

                    <div class="movies-hero-content">
                        <div class="movies-hero-copy">
                            <div class="movies-kicker">
                                <span>Movie</span>
                                <span>Featured Pick</span>
                            </div>

                            <a :href="item.detail_url">
                                <h1 x-text="item.title"></h1>
                            </a>

                            <div class="movies-meta">
                                <span x-text="item.year"></span>
                                <span> | </span>
                                <span x-text="item.meta"></span>
                            </div>

                            <p class="movies-description" x-text="item.description"></p>

                            <div class="movies-actions">
                                <a class="movies-button primary" :href="item.watch_url">Watch now</a>
                                <a class="movies-button secondary" :href="item.detail_url">Comments</a>
                            </div>
                        </div>

                        <div class="movies-hero-nav">
                            <button type="button" class="movies-hero-arrow" @click="prevSlide()">&#8249;</button>
                            <button type="button" class="movies-hero-arrow" @click="nextSlide()">&#8250;</button>
                        </div>
                    </div>
                </div>
            </template>
        </section>

        <section>
            <h2 class="movies-section-title">Categories</h2>

            <div class="movies-categories">
                <template x-for="category in categories" :key="category.id">
                    <button
                        type="button"
                        class="movies-category"
                        :class="{ 'is-active': activeCategory === category.id }"
                        @click="activeCategory = category.id"
                    >
                        <img :src="category.image" :alt="category.label">
                        <span x-text="category.label"></span>
                    </button>
                </template>
            </div>
        </section>

        <section>
            <div class="movies-results-bar">
                <h2 x-text="activeCategoryLabel"></h2>
                <div class="movies-results-note" x-text="`${filteredMovies.length} movie(s) found`"></div>
            </div>

            <template x-if="filteredMovies.length">
                <div class="movies-grid">
                    <template x-for="movie in filteredMovies" :key="movie.id">
                        <a :href="`{{ url('/movies') }}/${movie.id}`" class="movies-card">
                            <div class="movies-poster">
                                <img :src="movie.image" :alt="movie.title">
                                <span class="movies-badge">HD</span>
                            </div>

                            <div class="movies-card-title" x-text="movie.title"></div>
                            <div class="movies-card-meta">
                                <span x-text="movie.year"></span>
                                <span>&bull;</span>
                                <span x-text="movie.duration"></span>
                            </div>
                            <span class="movies-tag">Movie</span>
                        </a>
                    </template>
                </div>
            </template>

            <template x-if="!filteredMovies.length">
                <div class="movies-empty">No movies match that search in this category yet.</div>
            </template>
        </section>
    </div>
@endsection

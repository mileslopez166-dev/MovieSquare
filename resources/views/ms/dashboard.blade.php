@php
    $title = 'Dashboard';

    $trendingItems = [
        [
            'id' => 'real-steel',
            'title' => 'Real Steel',
            'image' => asset('images/movies/first1.jpg'),
            'year' => '2011',
            'meta' => 'Sci-Fi, Action, Drama',
            'badge' => 'New',
            'description' => 'A washed-up fighter discovers a second chance through a discarded boxing robot.',
            'detail_url' => route('movies.show', 'real-steel'),
            'watch_url' => route('movies.watch', 'real-steel'),
        ],
        [
            'id' => 'pacific-rim',
            'title' => 'Pacific Rim',
            'image' => asset('images/movies/first2.jpg'),
            'year' => '2013',
            'meta' => 'Action, Adventure, Sci-Fi',
            'badge' => 'Trending',
            'description' => 'Humanity fights monstrous kaiju with giant robots piloted by unlikely heroes.',
            'detail_url' => route('movies.show', 'pacific-rim'),
            'watch_url' => route('movies.watch', 'pacific-rim'),
        ],
        [
            'id' => 'maze-runner',
            'title' => 'The Maze Runner',
            'image' => asset('images/movies/first3.jpg'),
            'year' => '2014',
            'meta' => 'Mystery, Thriller, Sci-Fi',
            'badge' => 'Hot',
            'description' => 'A group of teens trapped in a maze race to uncover the truth behind their world.',
            'detail_url' => route('movies.show', 'maze-runner'),
            'watch_url' => route('movies.watch', 'maze-runner'),
        ],
    ];

    $sections = [
        [
            'title' => 'Western Drama',
            'items' => [
                ['id' => 'real-steel', 'title' => 'Real Steel', 'image' => asset('images/movies/first1.jpg'), 'year' => '2011', 'duration' => '127m', 'badge' => 'HD'],
                ['id' => 'wolf-of-wall-street', 'title' => 'The Wolf of Wall Street', 'image' => asset('images/movies/first4.jpg'), 'year' => '2013', 'duration' => '180m', 'badge' => 'HD'],
                ['id' => 'i-am-legend', 'title' => 'I Am Legend', 'image' => asset('images/movies/first5.jpg'), 'year' => '2007', 'duration' => '101m', 'badge' => 'HD'],
                ['id' => 'fast-and-furious', 'title' => 'The Fast and the Furious', 'image' => asset('images/movies/first6.jpg'), 'year' => '2001', 'duration' => '106m', 'badge' => 'HD'],
            ],
        ],
        [
            'title' => 'Asian Drama',
            'items' => [
                ['id' => 'pacific-rim', 'title' => 'Pacific Rim', 'image' => asset('images/movies/first2.jpg'), 'year' => '2013', 'duration' => '131m', 'badge' => 'HD'],
                ['id' => 'maze-runner', 'title' => 'The Maze Runner', 'image' => asset('images/movies/first3.jpg'), 'year' => '2014', 'duration' => '113m', 'badge' => 'HD'],
                ['id' => 'real-steel', 'title' => 'Real Steel', 'image' => asset('images/movies/first1.jpg'), 'year' => '2011', 'duration' => '127m', 'badge' => 'HD'],
                ['id' => 'i-am-legend', 'title' => 'I Am Legend', 'image' => asset('images/movies/first5.jpg'), 'year' => '2007', 'duration' => '101m', 'badge' => 'HD'],
            ],
        ],
        [
            'title' => 'Action Picks',
            'items' => [
                ['id' => 'fast-and-furious', 'title' => 'The Fast and the Furious', 'image' => asset('images/movies/first6.jpg'), 'year' => '2001', 'duration' => '106m', 'badge' => 'HD'],
                ['id' => 'pacific-rim', 'title' => 'Pacific Rim', 'image' => asset('images/movies/first2.jpg'), 'year' => '2013', 'duration' => '131m', 'badge' => 'HD'],
                ['id' => 'maze-runner', 'title' => 'The Maze Runner', 'image' => asset('images/movies/first3.jpg'), 'year' => '2014', 'duration' => '113m', 'badge' => 'HD'],
                ['id' => 'real-steel', 'title' => 'Real Steel', 'image' => asset('images/movies/first1.jpg'), 'year' => '2011', 'duration' => '127m', 'badge' => 'HD'],
            ],
        ],
    ];
@endphp

@extends('layouts.ms')

@section('content')
    <style>
        .stream-home {
            max-width: 1380px;
            margin: 0 auto;
            padding: 10px 14px 32px;
            font-family: Arial, sans-serif;
            color: #111827;
        }

        .stream-topbar {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            gap: 16px;
            margin-bottom: 18px;
        }

        .stream-search {
            position: relative;
            width: min(100%, 420px);
        }

        .stream-search-icon {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            width: 18px;
            height: 18px;
            color: #6b7280;
            pointer-events: none;
        }

        .stream-search-input {
            width: 100%;
            height: 44px;
            padding: 0 14px 0 42px;
            border: 1px solid #d1d5db;
            border-radius: 999px;
            background: #ffffff;
            color: #111827;
            font-size: 14px;
            outline: none;
        }

        .stream-search-input:focus {
            border-color: #60a5fa;
            box-shadow: 0 0 0 3px rgba(96, 165, 250, 0.18);
        }

        .stream-hero {
            position: relative;
            min-height: 430px;
            border-radius: 28px;
            overflow: hidden;
            margin-bottom: 30px;
            background:
                radial-gradient(circle at top right, rgba(59, 130, 246, 0.24), transparent 28%),
                linear-gradient(135deg, #0f172a 0%, #111827 52%, #1f2937 100%);
        }

        .stream-hero-slide {
            position: absolute;
            inset: 0;
        }

        .stream-hero-bg {
            position: absolute;
            inset: 0;
        }

        .stream-hero-bg img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center center;
            display: block;
            filter: brightness(0.5);
        }

        .stream-hero-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(90deg, rgba(15, 23, 42, 0.88) 0%, rgba(15, 23, 42, 0.56) 45%, rgba(15, 23, 42, 0.28) 100%);
        }

        .stream-hero-content {
            position: absolute;
            inset: 34px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 28px;
        }

        .stream-hero-copy {
            max-width: 540px;
            color: #ffffff;
        }

        .stream-hero-kicker {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 14px;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.12em;
            color: #93c5fd;
        }

        .stream-hero-badge {
            padding: 5px 10px;
            border-radius: 999px;
            background: rgba(59, 130, 246, 0.9);
            color: #ffffff;
        }

        .stream-hero-copy h1 {
            margin: 0 0 10px;
            font-size: 42px;
            line-height: 1.05;
            font-weight: 700;
        }

        .stream-hero-copy a {
            color: inherit;
            text-decoration: none;
        }

        .stream-hero-meta {
            margin-bottom: 12px;
            font-size: 14px;
            color: rgba(255, 255, 255, 0.8);
        }

        .stream-hero-description {
            margin: 0 0 18px;
            max-width: 480px;
            line-height: 1.6;
            font-size: 14px;
            color: rgba(255, 255, 255, 0.84);
        }

        .stream-hero-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        .stream-hero-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 128px;
            height: 42px;
            padding: 0 18px;
            border-radius: 999px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 700;
        }

        .stream-hero-button.primary {
            background: #ffffff;
            color: #0f172a;
        }

        .stream-hero-button.secondary {
            border: 1px solid rgba(255, 255, 255, 0.28);
            background: rgba(255, 255, 255, 0.08);
            color: #ffffff;
        }

        .stream-hero-nav {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-left: auto;
        }

        .stream-arrow {
            width: 48px;
            height: 48px;
            border-radius: 999px;
            border: 1px solid rgba(255, 255, 255, 0.34);
            background: rgba(255, 255, 255, 0.12);
            color: #ffffff;
            font-size: 20px;
            cursor: pointer;
            backdrop-filter: blur(6px);
        }

        .stream-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            margin-bottom: 14px;
        }

        .stream-heading h2 {
            margin: 0;
            font-size: 28px;
            font-weight: 300;
        }

        .stream-tabs {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .stream-tab {
            border: 0;
            border-radius: 999px;
            background: #ffffff;
            color: #111827;
            padding: 8px 14px;
            font-size: 14px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            box-shadow: inset 0 0 0 1px #d1d5db;
            cursor: pointer;
        }

        .stream-tab.is-active {
            background: #3b82f6;
            box-shadow: none;
            color: #ffffff;
        }

        .stream-tab-icon {
            width: 16px;
            text-align: center;
            font-size: 12px;
        }

        .stream-search-result {
            margin-bottom: 22px;
            font-size: 13px;
            color: #4b5563;
        }

        .stream-section + .stream-section {
            margin-top: 30px;
        }

        .stream-section-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 14px;
        }

        .stream-section-header h3 {
            margin: 0;
            font-size: 24px;
            font-weight: 700;
        }

        .stream-section-link {
            font-size: 14px;
            font-weight: 600;
            color: #4b5563;
            text-decoration: none;
        }

        .stream-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(165px, 1fr));
            gap: 18px;
        }

        .stream-card {
            text-decoration: none;
            color: inherit;
            display: block;
        }

        .stream-poster {
            position: relative;
            border-radius: 14px;
            overflow: hidden;
            background: #e5e7eb;
            aspect-ratio: 2 / 3;
            box-shadow: 0 1px 3px rgba(15, 23, 42, 0.12);
        }

        .stream-poster img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .stream-badge {
            position: absolute;
            top: 10px;
            right: 10px;
            padding: 3px 7px;
            border-radius: 3px;
            background: #ffffff;
            color: #111827;
            font-size: 12px;
            font-weight: 700;
            box-shadow: 0 1px 2px rgba(15, 23, 42, 0.1);
        }

        .stream-card-title {
            margin-top: 10px;
            font-size: 14px;
            font-weight: 700;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .stream-card-meta {
            margin-top: 7px;
            display: flex;
            align-items: center;
            gap: 7px;
            font-size: 12px;
            color: #4b5563;
        }

        .stream-tag {
            margin-top: 7px;
            display: inline-block;
            padding: 2px 7px;
            border: 1px solid #c7ccd4;
            border-radius: 3px;
            font-size: 12px;
            color: #4b5563;
            background: #ffffff;
        }

        .stream-empty {
            padding: 28px 20px;
            border: 1px dashed #cbd5e1;
            border-radius: 16px;
            text-align: center;
            color: #64748b;
            background: #f8fafc;
        }

        [x-cloak] {
            display: none !important;
        }

        @media (max-width: 900px) {
            .stream-home {
                padding-left: 6px;
                padding-right: 6px;
            }

            .stream-search {
                width: 100%;
            }

            .stream-topbar,
            .stream-heading,
            .stream-section-header,
            .stream-hero-content {
                flex-direction: column;
                align-items: flex-start;
            }

            .stream-hero-content {
                inset: 22px;
            }

            .stream-hero-copy h1 {
                font-size: 32px;
            }

            .stream-grid {
                grid-template-columns: repeat(auto-fill, minmax(145px, 1fr));
                gap: 14px;
            }
        }
    </style>

    <div
        x-data="{
            tab: 'movies',
            query: '',
            slide: 0,
            trendingItems: @js($trendingItems),
            sections: @js($sections),
            get filteredSections() {
                const search = this.query.toLowerCase().trim();
                return this.sections.map(section => ({
                    ...section,
                    items: section.items.filter(item => !search || item.title.toLowerCase().includes(search)),
                })).filter(section => section.items.length);
            },
            nextSlide() {
                this.slide = (this.slide + 1) % this.trendingItems.length;
            },
            prevSlide() {
                this.slide = (this.slide - 1 + this.trendingItems.length) % this.trendingItems.length;
            }
        }"
        x-init="setInterval(() => nextSlide(), 5000)"
        class="stream-home"
    >
        <div class="stream-topbar">
            <label class="stream-search" for="movie-search">
                <svg class="stream-search-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <circle cx="11" cy="11" r="7"></circle>
                    <path d="M21 21l-4.3-4.3"></path>
                </svg>
                <input
                    id="movie-search"
                    x-model="query"
                    type="text"
                    class="stream-search-input"
                    placeholder="Search movies / TV shows"
                    autocomplete="off"
                >
            </label>
        </div>

        <section class="stream-hero">
            <template x-for="(item, index) in trendingItems" :key="item.id">
                <div class="stream-hero-slide" x-show="slide === index" x-transition.opacity x-cloak>
                    <div class="stream-hero-bg">
                        <img :src="item.image" :alt="item.title">
                    </div>

                    <div class="stream-hero-overlay"></div>

                    <div class="stream-hero-content">
                        <div class="stream-hero-copy">
                            <div class="stream-hero-kicker">
                                <span class="stream-hero-badge" x-text="item.badge"></span>
                                <span>Trending Now</span>
                            </div>

                            <a :href="item.detail_url">
                                <h1 x-text="item.title"></h1>
                            </a>

                            <div class="stream-hero-meta">
                                <span x-text="item.year"></span>
                                <span> | </span>
                                <span x-text="item.meta"></span>
                            </div>

                            <p class="stream-hero-description" x-text="item.description"></p>

                            <div class="stream-hero-actions">
                                <a class="stream-hero-button primary" :href="item.watch_url">Watch now</a>
                                <a class="stream-hero-button secondary" :href="item.detail_url">Movie review</a>
                            </div>
                        </div>

                        <div class="stream-hero-nav">
                            <button type="button" class="stream-arrow" @click="prevSlide()">&#8249;</button>
                            <button type="button" class="stream-arrow" @click="nextSlide()">&#8250;</button>
                        </div>
                    </div>
                </div>
            </template>
        </section>

        <div class="stream-heading">
            <h2>Trending</h2>

            <div class="stream-tabs">
                <button
                    type="button"
                    class="stream-tab"
                    :class="{ 'is-active': tab === 'movies' }"
                    @click="tab = 'movies'"
                >
                    <span class="stream-tab-icon">&gt;</span>
                    <span>Movies</span>
                </button>

                <button
                    type="button"
                    class="stream-tab"
                    :class="{ 'is-active': tab === 'shows' }"
                    @click="tab = 'shows'"
                >
                    <span class="stream-tab-icon">|||</span>
                    <span>TV Shows</span>
                </button>
            </div>
        </div>

        <div class="stream-search-result" x-show="query.trim().length > 0">
            <span x-text="`${filteredSections.reduce((count, section) => count + section.items.length, 0)} result(s) found`"></span>
        </div>

        <div x-show="tab === 'movies'">
            <template x-if="filteredSections.length">
                <div>
                    <template x-for="section in filteredSections" :key="section.title">
                        <section class="stream-section">
                            <div class="stream-section-header">
                                <h3 x-text="section.title"></h3>
                                <a href="{{ route('movies.index') }}" class="stream-section-link">More</a>
                            </div>

                            <div class="stream-grid">
                                <template x-for="item in section.items" :key="`${section.title}-${item.id}`">
                                    <a :href="`{{ url('/movies') }}/${item.id}`" class="stream-card">
                                        <div class="stream-poster">
                                            <img :src="item.image" :alt="item.title">
                                            <span class="stream-badge" x-text="item.badge"></span>
                                        </div>

                                        <div class="stream-card-title" x-text="item.title"></div>
                                        <div class="stream-card-meta">
                                            <span x-text="item.year"></span>
                                            <span>&bull;</span>
                                            <span x-text="item.duration"></span>
                                        </div>
                                        <span class="stream-tag">Movie</span>
                                    </a>
                                </template>
                            </div>
                        </section>
                    </template>
                </div>
            </template>

            <template x-if="!filteredSections.length">
                <div class="stream-empty">No movies match that search yet.</div>
            </template>
        </div>

        <div x-show="tab === 'shows'" style="display: none;">
            <div class="stream-empty">TV show sections can be added next with their own categories.</div>
        </div>
    </div>
@endsection

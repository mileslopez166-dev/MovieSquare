<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

if (! function_exists('movieCatalog')) {
    function movieCatalog(): array
    {
        return [
            'real-steel' => [
                'id' => 'real-steel',
                'title' => 'Real Steel',
                'image' => asset('images/movies/first1.jpg'),
                'year' => '2011',
                'duration' => '127m',
                'genre' => 'Sci-Fi, Action, Drama',
                'rating' => '4.5',
                'description' => 'A former boxer rebuilds his life by training a discarded robot into an underground fighting champion.',
                'cast' => [
                    ['name' => 'Hugh Jackman', 'role' => 'Charlie Kenton', 'image' => asset('images/movies/first1.jpg')],
                    ['name' => 'Dakota Goyo', 'role' => 'Max Kenton', 'image' => asset('images/movies/first2.jpg')],
                    ['name' => 'Evangeline Lilly', 'role' => 'Bailey Tallet', 'image' => asset('images/movies/first3.jpg')],
                ],
                'reviews' => [
                    ['author' => 'Miles', 'comment' => 'The robot fights were fun and the father-son story was easy to connect with.'],
                    ['author' => 'Ayen', 'comment' => 'Good action scenes and a nice emotional ending.'],
                ],
                'gallery' => [
                    asset('images/movies/first1.jpg'),
                    asset('images/movies/first2.jpg'),
                    asset('images/movies/first3.jpg'),
                    asset('images/movies/first4.jpg'),
                ],
            ],
            'pacific-rim' => [
                'id' => 'pacific-rim',
                'title' => 'Pacific Rim',
                'image' => asset('images/movies/first2.jpg'),
                'year' => '2013',
                'duration' => '131m',
                'genre' => 'Action, Adventure, Sci-Fi',
                'rating' => '4.3',
                'description' => 'Massive robots are humanity\'s final defense against giant sea monsters rising from another dimension.',
                'cast' => [
                    ['name' => 'Charlie Hunnam', 'role' => 'Raleigh Becket', 'image' => asset('images/movies/first2.jpg')],
                    ['name' => 'Rinko Kikuchi', 'role' => 'Mako Mori', 'image' => asset('images/movies/first3.jpg')],
                    ['name' => 'Idris Elba', 'role' => 'Stacker Pentecost', 'image' => asset('images/movies/first5.jpg')],
                ],
                'reviews' => [
                    ['author' => 'Ken', 'comment' => 'Huge scale, great action, and the Jaegers still look awesome.'],
                    ['author' => 'Jade', 'comment' => 'A really entertaining sci-fi movie with strong visuals.'],
                ],
                'gallery' => [
                    asset('images/movies/first2.jpg'),
                    asset('images/movies/first5.jpg'),
                    asset('images/movies/first6.jpg'),
                    asset('images/movies/first1.jpg'),
                ],
            ],
            'maze-runner' => [
                'id' => 'maze-runner',
                'title' => 'The Maze Runner',
                'image' => asset('images/movies/first3.jpg'),
                'year' => '2014',
                'duration' => '113m',
                'genre' => 'Mystery, Thriller, Sci-Fi',
                'rating' => '4.1',
                'description' => 'A teenager wakes up in a strange maze community and joins others searching for the way out.',
                'cast' => [
                    ['name' => 'Dylan O\'Brien', 'role' => 'Thomas', 'image' => asset('images/movies/first3.jpg')],
                    ['name' => 'Kaya Scodelario', 'role' => 'Teresa', 'image' => asset('images/movies/first4.jpg')],
                    ['name' => 'Thomas Brodie-Sangster', 'role' => 'Newt', 'image' => asset('images/movies/first2.jpg')],
                ],
                'reviews' => [
                    ['author' => 'Sam', 'comment' => 'The mystery kept me watching until the end.'],
                    ['author' => 'Chris', 'comment' => 'Fast-paced and easy to binge if you like survival thrillers.'],
                ],
                'gallery' => [
                    asset('images/movies/first3.jpg'),
                    asset('images/movies/first4.jpg'),
                    asset('images/movies/first2.jpg'),
                    asset('images/movies/first5.jpg'),
                ],
            ],
            'wolf-of-wall-street' => [
                'id' => 'wolf-of-wall-street',
                'title' => 'The Wolf of Wall Street',
                'image' => asset('images/movies/first4.jpg'),
                'year' => '2013',
                'duration' => '180m',
                'genre' => 'Biography, Comedy, Crime',
                'rating' => '4.4',
                'description' => 'Jordan Belfort rises to wealth and excess through stock market fraud and relentless ambition.',
                'cast' => [
                    ['name' => 'Leonardo DiCaprio', 'role' => 'Jordan Belfort', 'image' => asset('images/movies/first4.jpg')],
                    ['name' => 'Margot Robbie', 'role' => 'Naomi Lapaglia', 'image' => asset('images/movies/first1.jpg')],
                    ['name' => 'Jonah Hill', 'role' => 'Donnie Azoff', 'image' => asset('images/movies/first6.jpg')],
                ],
                'reviews' => [
                    ['author' => 'Paolo', 'comment' => 'Wild energy from start to finish and very memorable performances.'],
                    ['author' => 'Mira', 'comment' => 'Long movie but never boring for me.'],
                ],
                'gallery' => [
                    asset('images/movies/first4.jpg'),
                    asset('images/movies/first1.jpg'),
                    asset('images/movies/first6.jpg'),
                    asset('images/movies/first3.jpg'),
                ],
            ],
            'i-am-legend' => [
                'id' => 'i-am-legend',
                'title' => 'I Am Legend',
                'image' => asset('images/movies/first5.jpg'),
                'year' => '2007',
                'duration' => '101m',
                'genre' => 'Drama, Horror, Sci-Fi',
                'rating' => '4.2',
                'description' => 'The last known survivor in New York searches for a cure while hiding from infected mutants.',
                'cast' => [
                    ['name' => 'Will Smith', 'role' => 'Robert Neville', 'image' => asset('images/movies/first5.jpg')],
                    ['name' => 'Alice Braga', 'role' => 'Anna', 'image' => asset('images/movies/first2.jpg')],
                    ['name' => 'Charlie Tahan', 'role' => 'Ethan', 'image' => asset('images/movies/first1.jpg')],
                ],
                'reviews' => [
                    ['author' => 'Noel', 'comment' => 'Still one of the most memorable post-apocalyptic movies for me.'],
                    ['author' => 'Grace', 'comment' => 'The lonely atmosphere was really effective.'],
                ],
                'gallery' => [
                    asset('images/movies/first5.jpg'),
                    asset('images/movies/first2.jpg'),
                    asset('images/movies/first1.jpg'),
                    asset('images/movies/first6.jpg'),
                ],
            ],
            'fast-and-furious' => [
                'id' => 'fast-and-furious',
                'title' => 'The Fast and the Furious',
                'image' => asset('images/movies/first6.jpg'),
                'year' => '2001',
                'duration' => '106m',
                'genre' => 'Action, Crime, Thriller',
                'rating' => '4.0',
                'description' => 'An undercover cop enters the street-racing world and gets pulled into a dangerous new family.',
                'cast' => [
                    ['name' => 'Paul Walker', 'role' => 'Brian O\'Conner', 'image' => asset('images/movies/first6.jpg')],
                    ['name' => 'Vin Diesel', 'role' => 'Dominic Toretto', 'image' => asset('images/movies/first5.jpg')],
                    ['name' => 'Michelle Rodriguez', 'role' => 'Letty Ortiz', 'image' => asset('images/movies/first4.jpg')],
                ],
                'reviews' => [
                    ['author' => 'Bry', 'comment' => 'Classic street racing movie with a lot of style.'],
                    ['author' => 'Anne', 'comment' => 'Simple story, but the chemistry and cars still work.'],
                ],
                'gallery' => [
                    asset('images/movies/first6.jpg'),
                    asset('images/movies/first5.jpg'),
                    asset('images/movies/first4.jpg'),
                    asset('images/movies/first2.jpg'),
                ],
            ],
        ];
    }
}

if (! function_exists('profileSocialLinks')) {
    function profileSocialLinks(\App\Models\User $user): array
    {
        $handle = strtolower(preg_replace('/[^a-z0-9]+/', '', $user->name)) ?: 'moviesquareuser';

        return [
            [
                'label' => 'Facebook',
                'url' => 'https://facebook.com/' . $handle,
            ],
            [
                'label' => 'Instagram',
                'url' => 'https://instagram.com/' . $handle,
            ],
            [
                'label' => 'TikTok',
                'url' => 'https://tiktok.com/@' . $handle,
            ],
        ];
    }
}

if (! function_exists('watchedMovieData')) {
    function watchedMovieData(\App\Models\User $user): array
    {
        $movies = movieCatalog();
        $watchedIds = collect($user->watched_movies ?? [])
            ->filter(fn ($movieId) => isset($movies[$movieId]))
            ->values();

        $watchedMovies = $watchedIds
            ->map(fn ($movieId) => $movies[$movieId])
            ->all();

        if (empty($watchedMovies)) {
            $watchedMovies = array_slice(array_values($movies), 0, 6);
        }

        $genreCounts = collect($watchedMovies)
            ->flatMap(fn ($movie) => array_map('trim', explode(',', $movie['genre'])))
            ->countBy()
            ->sortDesc();

        $maxCount = max(1, (int) $genreCounts->max());

        $genreBars = $genreCounts
            ->take(10)
            ->map(fn ($count, $genre) => [
                'name' => $genre,
                'width' => round(($count / $maxCount) * 100) . '%',
            ])
            ->values()
            ->all();

        $userReviews = collect($watchedMovies)
            ->map(function ($movie, $index) use ($user) {
                $review = $movie['reviews'][$index % max(1, count($movie['reviews']))]['comment'] ?? 'Great watch.';

                return [
                    'movie_id' => $movie['id'],
                    'movie_title' => $movie['title'],
                    'movie_image' => $movie['image'],
                    'rating' => $movie['rating'],
                    'comment' => $user->name . ': ' . $review,
                ];
            })
            ->all();

        return [
            'watchedMovies' => $watchedMovies,
            'genreBars' => $genreBars,
            'recommendedMovies' => array_slice(array_values($movies), 0, 6),
            'userReviews' => $userReviews,
            'socialLinks' => profileSocialLinks($user),
        ];
    }
}

Route::get('/', function () {
    return auth()->check()
        ? redirect()->route('dashboard')
        : redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'nocache'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'nocache'])->group(function () {
    Route::view('/dashboard', 'ms.dashboard')->name('dashboard');

    Route::get('/movies', function () {
        $movies = array_values(movieCatalog());

        $heroItems = [
            [
                'id' => $movies[1]['id'],
                'title' => $movies[1]['title'],
                'image' => $movies[1]['image'],
                'year' => $movies[1]['year'],
                'meta' => $movies[1]['genre'],
                'description' => $movies[1]['description'],
                'detail_url' => route('movies.show', $movies[1]['id']),
                'watch_url' => route('movies.watch', $movies[1]['id']),
            ],
            [
                'id' => $movies[0]['id'],
                'title' => $movies[0]['title'],
                'image' => $movies[0]['image'],
                'year' => $movies[0]['year'],
                'meta' => $movies[0]['genre'],
                'description' => $movies[0]['description'],
                'detail_url' => route('movies.show', $movies[0]['id']),
                'watch_url' => route('movies.watch', $movies[0]['id']),
            ],
            [
                'id' => $movies[4]['id'],
                'title' => $movies[4]['title'],
                'image' => $movies[4]['image'],
                'year' => $movies[4]['year'],
                'meta' => $movies[4]['genre'],
                'description' => $movies[4]['description'],
                'detail_url' => route('movies.show', $movies[4]['id']),
                'watch_url' => route('movies.watch', $movies[4]['id']),
            ],
        ];

        $categories = [
            [
                'id' => 'all',
                'label' => 'All',
                'image' => $movies[0]['image'],
                'movie_ids' => array_column($movies, 'id'),
            ],
            [
                'id' => 'hollywood',
                'label' => 'Hollywood',
                'image' => $movies[3]['image'],
                'movie_ids' => ['real-steel', 'wolf-of-wall-street', 'fast-and-furious'],
            ],
            [
                'id' => 'filipino',
                'label' => 'Filipino',
                'image' => $movies[2]['image'],
                'movie_ids' => ['maze-runner', 'i-am-legend'],
            ],
            [
                'id' => 'english-dub',
                'label' => 'English Dub',
                'image' => $movies[1]['image'],
                'movie_ids' => ['pacific-rim', 'real-steel', 'i-am-legend'],
            ],
            [
                'id' => 'horror',
                'label' => 'Horror Movies',
                'image' => $movies[4]['image'],
                'movie_ids' => ['i-am-legend', 'maze-runner'],
            ],
            [
                'id' => 'animation',
                'label' => 'Animation',
                'image' => $movies[5]['image'],
                'movie_ids' => ['fast-and-furious', 'real-steel'],
            ],
            [
                'id' => 'korean',
                'label' => 'Korean Movies',
                'image' => $movies[2]['image'],
                'movie_ids' => ['maze-runner', 'pacific-rim'],
            ],
        ];

        return view('ms.movies.index', [
            'heroItems' => $heroItems,
            'categories' => $categories,
            'movies' => $movies,
        ]);
    })->name('movies.index');

    Route::get('/movies/{id}/watch', function ($id) {
        $movies = movieCatalog();
        $movie = $movies[$id] ?? $movies['real-steel'];
        $user = auth()->user();

        $watchedMovies = collect($user->watched_movies ?? [])
            ->reject(fn ($movieId) => $movieId === $movie['id'])
            ->prepend($movie['id'])
            ->take(6)
            ->values()
            ->all();

        $user->forceFill([
            'watched_movies' => $watchedMovies,
        ])->save();

        return view('ms.movies.watch', [
            'movie' => $movie,
        ]);
    })->name('movies.watch');

    Route::get('/movies/{id}', function ($id) {
        $movies = movieCatalog();
        $movie = $movies[$id] ?? $movies['real-steel'];

        return view('ms.movies.show', [
            'movie' => $movie,
            'movies' => array_values($movies),
        ]);
    })->name('movies.show');

    Route::get('/me', function () {
        return view('ms.profile', watchedMovieData(auth()->user()));
    })->name('me');

    Route::get('/me/reviews', function () {
        return view('ms.profile-reviews', watchedMovieData(auth()->user()));
    })->name('me.reviews');

    Route::get('/me/settings', function () {
        return view('ms.profile-settings', watchedMovieData(auth()->user()));
    })->name('me.settings');

    Route::view('/payment', 'ms.payment')->name('payment');
});

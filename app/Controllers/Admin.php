<?php

namespace App\Controllers;

class Admin extends BaseController
{
    /**
     * Placeholder data — nanti diganti sama query dari Model.
     * Struktur ini dipakai oleh view admin/movies/movie-table.php
     */
    private function getMovies(): array
    {
        return [
            [
                'id'          => 1,
                'title'       => 'Swapped',
                'genre'       => 'Animation, Adventure',
                'rating'      => 8.3,
                'year'        => 2026,
                'poster'      => 'https://image.tmdb.org/t/p/w200/placeholder1.jpg',
                'description' => 'A tiny woodland creature and a majestic bird suddenly swap bodies.',
            ],
            [
                'id'          => 2,
                'title'       => 'Midnight Echo',
                'genre'       => 'Thriller, Mystery',
                'rating'      => 7.8,
                'year'        => 2025,
                'poster'      => 'https://image.tmdb.org/t/p/w200/placeholder2.jpg',
                'description' => 'A detective unravels a chain of disappearances tied to a single radio frequency.',
            ],
            [
                'id'          => 3,
                'title'       => 'Crimson Hour',
                'genre'       => 'Action',
                'rating'      => 8.6,
                'year'        => 2026,
                'poster'      => 'https://image.tmdb.org/t/p/w200/placeholder3.jpg',
                'description' => 'An ex-operative has sixty minutes to stop a citywide blackout.',
            ],
            [
                'id'          => 4,
                'title'       => 'Paper Lanterns',
                'genre'       => 'Drama',
                'rating'      => 9.1,
                'year'        => 2024,
                'poster'      => 'https://image.tmdb.org/t/p/w200/placeholder4.jpg',
                'description' => 'A quiet meditation on grief, family, and the festivals that bind a small town.',
            ],
            [
                'id'          => 5,
                'title'       => 'Neon District',
                'genre'       => 'Sci-Fi',
                'rating'      => 8.0,
                'year'        => 2025,
                'poster'      => 'https://image.tmdb.org/t/p/w200/placeholder5.jpg',
                'description' => 'In 2098 Jakarta, a courier discovers her memories are being rented out.',
            ],
        ];
    }

    private function getStats(): array
    {
        return [
            'total_movies' => 248,
            'total_views'  => '1.2M',
            'active_users' => 8420,
            'avg_rating'   => 8.4,
        ];
    }

    /**
     * GET /admin
     * Halaman utama dashboard admin.
     */
    public function index(): string
    {
        return view('admin/dashboard', [
            'title'     => 'Dashboard | Catafilm Admin',
            'pageTitle' => 'Dashboard',
            'active'    => 'dashboard',
            'movies'    => $this->getMovies(),
            'stats'     => $this->getStats(),
        ]);
    }

    /**
     * GET /admin/movies
     * Khusus halaman manage movies (kalau mau dipisah dari dashboard).
     */
    public function movies(): string
    {
        return view('admin/dashboard', [
            'title'     => 'Movies | Catafilm Admin',
            'pageTitle' => 'Movies',
            'active'    => 'movies',
            'movies'    => $this->getMovies(),
            'stats'     => $this->getStats(),
        ]);
    }
}

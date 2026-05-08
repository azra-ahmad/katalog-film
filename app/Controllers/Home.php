<?php

namespace App\Controllers;

use App\Models\FilmModel;
use App\Models\GenreModel;

class Home extends BaseController
{
    public function index(): string
    {
        $filmModel = new FilmModel();
        $genreModel = new GenreModel();
        $filters = [
            'q'        => trim((string) $this->request->getGet('q')),
            'genre_id' => trim((string) $this->request->getGet('genre_id')),
        ];

        $query = $filmModel
            ->select('films.*, genres.name AS genre_name')
            ->join('genres', 'genres.id = films.genre_id', 'left');

        if (! empty($filters['q'])) {
            $search = $filters['q'];
            $query->groupStart()
                ->like('films.title', $search)
                ->orLike('films.director', $search)
                ->orLike('films.actors', $search)
                ->orLike('films.synopsis', $search)
                ->orLike('genres.name', $search)
                ->groupEnd();
        }

        if (! empty($filters['genre_id'])) {
            $query->where('films.genre_id', (int) $filters['genre_id']);
        }

        $films = $query
            ->orderBy('films.id', 'DESC')
            ->findAll();

        $movies = array_map([$this, 'formatMovie'], $films);
        $topMovies = $movies;
        $genres = $genreModel->orderBy('name', 'ASC')->findAll();
        $activeGenre = null;

        if (! empty($filters['genre_id'])) {
            foreach ($genres as $genre) {
                if ((string) $genre['id'] === (string) $filters['genre_id']) {
                    $activeGenre = $genre['name'];
                    break;
                }
            }
        }

        usort($topMovies, static function (array $a, array $b): int {
            return ((float) $b['rating']) <=> ((float) $a['rating']);
        });

        $topMovies = array_slice(array_map(static function (array $movie, int $index): array {
            $movie['rank'] = $index + 1;

            return $movie;
        }, $topMovies, array_keys($topMovies)), 0, 10);

        return view('index', [
            'title'          => 'Catafilm - Modern Film Catalog',
            'featuredMovie'  => $topMovies[0] ?? null,
            'trendingMovies' => array_slice($movies, 0, 8),
            'topMovies'      => $topMovies,
            'genres'         => $genres,
            'filters'        => $filters,
            'currentSearch'  => $filters['q'],
            'currentGenreId' => $filters['genre_id'],
            'activeGenre'    => $activeGenre,
            'trendingTitle'  => $this->sectionTitle($filters, $activeGenre),
        ]);
    }

    public function about(): string
    {
        $genreModel = new GenreModel();

        return view('about-us', array_merge([
            'title'          => 'About Us | Catafilm',
            'genres'         => $genreModel->orderBy('name', 'ASC')->findAll(),
            'currentSearch'  => '',
            'currentGenreId' => '',
        ], $this->groupIntroData()));
    }

    private function sectionTitle(array $filters, ?string $activeGenre): string
    {
        if (! empty($filters['q']) && $activeGenre) {
            return 'Results for "' . $filters['q'] . '" in ' . $activeGenre;
        }

        if (! empty($filters['q'])) {
            return 'Results for "' . $filters['q'] . '"';
        }

        if ($activeGenre) {
            return $activeGenre . ' Movies';
        }

        return 'Trending Today';
    }

    private function formatMovie(array $movie): array
    {
        return [
            'id'       => $movie['id'],
            'title'    => $movie['title'],
            'rating'   => number_format((float) $movie['rating'], 1),
            'year'     => (string) $movie['year'],
            'type'     => $movie['genre_name'] ?? 'Movie',
            'genre'    => $movie['genre_name'] ?? 'Movie',
            'director' => $movie['director'],
            'actors'   => $movie['actors'],
            'synopsis' => $movie['synopsis'] ?? '',
            'image'    => $this->posterUrl($movie['poster'] ?? null),
            'url'      => site_url('movies/' . $movie['id']),
        ];
    }

    private function posterUrl(?string $poster): string
    {
        if (! $poster) {
            return 'https://placehold.co/600x900/171717/ef4444?text=Catafilm';
        }

        if (str_starts_with($poster, 'http://') || str_starts_with($poster, 'https://')) {
            return $poster;
        }

        return base_url($poster);
    }

    private function groupIntroData(): array
    {
        return [
            'groupName'    => 'KELOMPOK UJIAN PRAKTIKUM SISTEM MULTIMEDIA',
            'members'      => [
                'Azra Ahmad Algifari (50422311)',
                'Muhammad Raihan Aditya Hidayat (51422123)',
                'Muhammad Rafi Aditya (51422107)',
                'Zidan Fadla Ahfandani (51422685)',
            ],
            'projectTitle' => 'CATAFILM',
            'subtitle'     => 'Film Catalog Management System',
        ];
    }
}

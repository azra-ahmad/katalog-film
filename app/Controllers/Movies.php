<?php

namespace App\Controllers;

use App\Models\FilmModel;
use App\Models\GenreModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Movies extends BaseController
{
    public function show(int $id): string
    {
        $filmModel = new FilmModel();
        $genreModel = new GenreModel();
        $movie = $filmModel
            ->select('films.*, genres.name AS genre_name')
            ->join('genres', 'genres.id = films.genre_id', 'left')
            ->where('films.id', $id)
            ->first();

        if (! $movie) {
            throw PageNotFoundException::forPageNotFound('Movie not found.');
        }

        $relatedMovies = $filmModel
            ->select('films.*, genres.name AS genre_name')
            ->join('genres', 'genres.id = films.genre_id', 'left')
            ->where('films.id !=', $id)
            ->orderBy('films.rating', 'DESC')
            ->orderBy('films.id', 'DESC')
            ->findAll(10);

        $youMayLike = array_map([$this, 'formatMovie'], $relatedMovies);

        return view('movies/show', [
            'title'         => $movie['title'] . ' | Catafilm',
            'movie'         => $this->formatMovie($movie),
            'sectionTitle'  => 'You May Like',
            'sectionMovies' => $youMayLike,
            'genres'        => $genreModel->orderBy('name', 'ASC')->findAll(),
        ]);
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
            return 'https://placehold.co/900x1350/171717/ef4444?text=Catafilm';
        }

        if (str_starts_with($poster, 'http://') || str_starts_with($poster, 'https://')) {
            return $poster;
        }

        return base_url($poster);
    }
}

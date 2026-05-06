<?php

namespace App\Controllers;

use App\Models\FilmModel;
use App\Models\GenreModel;
use CodeIgniter\HTTP\RedirectResponse;

class Admin extends BaseController
{
    private FilmModel $filmModel;
    private GenreModel $genreModel;

    public function __construct()
    {
        $this->filmModel = new FilmModel();
        $this->genreModel = new GenreModel();
    }

    public function index(): string
    {
        return $this->renderDashboard('dashboard', 'Dashboard', 'Dashboard | Catafilm Admin');
    }

    public function movies(): string
    {
        return $this->renderDashboard('movies', 'Movies', 'Movies | Catafilm Admin');
    }

    public function storeMovie(): RedirectResponse
    {
        if (! $this->validate($this->movieRules(), $this->movieMessages())) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors())->with('modal', 'add');
        }

        $data = $this->movieDataFromRequest();
        $data['poster'] = $this->storePoster();
        $data['created_at'] = date('Y-m-d H:i:s');

        $this->filmModel->insert($data);

        return redirect()->to('/admin/movies')->with('success', 'Movie added successfully.');
    }

    public function updateMovie(int $id): RedirectResponse
    {
        $movie = $this->filmModel->find($id);

        if (! $movie) {
            return redirect()->to('/admin/movies')->with('error', 'Movie not found.');
        }

        if (! $this->validate($this->movieRules(), $this->movieMessages())) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors())
                ->with('modal', 'edit')
                ->with('editMovieId', $id);
        }

        $data = $this->movieDataFromRequest();
        $data['poster'] = $this->storePoster($movie['poster'] ?? null);

        if (($movie['poster'] ?? null) && $data['poster'] !== $movie['poster']) {
            $this->deletePosterFile($movie['poster']);
        }

        $this->filmModel->update($id, $data);

        return redirect()->to('/admin/movies')->with('success', 'Movie updated successfully.');
    }

    public function deleteMovie(int $id): RedirectResponse
    {
        $movie = $this->filmModel->find($id);

        if (! $movie) {
            return redirect()->to('/admin/movies')->with('error', 'Movie not found.');
        }

        $this->filmModel->delete($id);
        $this->deletePosterFile($movie['poster'] ?? null);

        return redirect()->to('/admin/movies')->with('success', 'Movie deleted successfully.');
    }

    private function renderDashboard(string $active, string $pageTitle, string $title): string
    {
        $filters = [
            'q'        => trim((string) $this->request->getGet('q')),
            'genre_id' => trim((string) $this->request->getGet('genre_id')),
        ];
        $movies = $this->getMovies($filters);
        $movieCount = count($movies);

        return view('admin/dashboard', [
            'title'      => $title,
            'pageTitle'  => $pageTitle,
            'active'     => $active,
            'movies'     => $movies,
            'genres'     => $this->genreModel->orderBy('name', 'ASC')->findAll(),
            'filters'    => $filters,
            'stats'      => $this->getStats(),
            'movieCount' => $movieCount,
        ]);
    }

    private function getMovies(array $filters = []): array
    {
        $query = $this->filmModel
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

        $movies = $query
            ->orderBy('films.created_at', 'DESC')
            ->orderBy('films.id', 'DESC')
            ->findAll();

        return array_map(function (array $movie): array {
            $movie['genre'] = $movie['genre_name'] ?? 'Uncategorized';
            $movie['description'] = $movie['synopsis'] ?? '';
            $movie['poster_url'] = $this->posterUrl($movie['poster'] ?? null);

            return $movie;
        }, $movies);
    }

    private function getStats(): array
    {
        $db = db_connect();
        $totalMovies = (int) $db->table('films')->countAllResults();
        $totalGenres = (int) $db->table('genres')->countAllResults();
        $uploadedPosters = (int) $db->table('films')->where('poster IS NOT NULL', null, false)->countAllResults();
        $avgRating = (float) ($db->table('films')->selectAvg('rating', 'rating')->get()->getRow('rating') ?? 0);

        return [
            [
                'label' => 'Total Movies',
                'value' => (string) $totalMovies,
                'delta' => 'Live',
                'positive' => true,
                'icon'  => 'film',
                'note'  => 'from database',
            ],
            [
                'label' => 'Genres',
                'value' => (string) $totalGenres,
                'delta' => 'Live',
                'positive' => true,
                'icon'  => 'tag',
                'note'  => 'available categories',
            ],
            [
                'label' => 'Posters',
                'value' => (string) $uploadedPosters,
                'delta' => 'Local',
                'positive' => true,
                'icon'  => 'image',
                'note'  => 'stored uploads',
            ],
            [
                'label' => 'Avg. Rating',
                'value' => number_format($avgRating, 1),
                'delta' => 'Live',
                'positive' => true,
                'icon'  => 'star',
                'note'  => 'all movies',
            ],
        ];
    }

    private function movieRules(): array
    {
        $rules = [
            'title'    => 'required|max_length[255]',
            'genre_id' => 'required|is_not_unique[genres.id]',
            'director' => 'required|max_length[255]',
            'actors'   => 'required|max_length[255]',
            'year'     => 'required|integer|greater_than_equal_to[1900]|less_than_equal_to[2099]',
            'rating'   => 'required|numeric|greater_than_equal_to[0]|less_than_equal_to[9.9]',
            'synopsis' => 'permit_empty',
        ];

        $poster = $this->request->getFile('poster');

        if ($poster && $poster->getError() !== UPLOAD_ERR_NO_FILE) {
            $rules['poster'] = 'max_size[poster,2048]|is_image[poster]|mime_in[poster,image/jpg,image/jpeg,image/png,image/webp]';
        }

        return $rules;
    }

    private function movieMessages(): array
    {
        return [
            'genre_id' => [
                'is_not_unique' => 'Please choose an available genre.',
            ],
            'poster' => [
                'max_size' => 'Poster must not be larger than 2MB.',
                'is_image' => 'Poster must be a valid image file.',
                'mime_in'  => 'Poster must be a JPG, PNG, or WebP image.',
            ],
            'rating' => [
                'less_than_equal_to' => 'Rating must be 9.9 or lower to match the current database schema.',
            ],
        ];
    }

    private function movieDataFromRequest(): array
    {
        return [
            'genre_id' => (int) $this->request->getPost('genre_id'),
            'title'    => trim((string) $this->request->getPost('title')),
            'director' => trim((string) $this->request->getPost('director')),
            'actors'   => trim((string) $this->request->getPost('actors')),
            'year'     => (int) $this->request->getPost('year'),
            'rating'   => (float) $this->request->getPost('rating'),
            'synopsis' => trim((string) $this->request->getPost('synopsis')),
        ];
    }

    private function storePoster(?string $currentPoster = null): ?string
    {
        $poster = $this->request->getFile('poster');

        if (! $poster || $poster->getError() === UPLOAD_ERR_NO_FILE) {
            return $currentPoster;
        }

        if (! $poster->isValid() || $poster->hasMoved()) {
            return $currentPoster;
        }

        $uploadPath = FCPATH . 'uploads' . DIRECTORY_SEPARATOR . 'posters';

        if (! is_dir($uploadPath)) {
            mkdir($uploadPath, 0775, true);
        }

        $newName = $poster->getRandomName();
        $poster->move($uploadPath, $newName);

        return 'uploads/posters/' . $newName;
    }

    private function posterUrl(?string $poster): string
    {
        if (! $poster) {
            return 'https://placehold.co/120x160/27272a/ef4444?text=No+Poster';
        }

        if (str_starts_with($poster, 'http://') || str_starts_with($poster, 'https://')) {
            return $poster;
        }

        return base_url($poster);
    }

    private function deletePosterFile(?string $poster): void
    {
        if (! $poster || str_starts_with($poster, 'http://') || str_starts_with($poster, 'https://')) {
            return;
        }

        $posterDir = realpath(FCPATH . 'uploads' . DIRECTORY_SEPARATOR . 'posters');
        $posterFile = realpath(FCPATH . str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $poster));

        if (! $posterDir || ! $posterFile || ! str_starts_with($posterFile, $posterDir) || ! is_file($posterFile)) {
            return;
        }

        unlink($posterFile);
    }
}

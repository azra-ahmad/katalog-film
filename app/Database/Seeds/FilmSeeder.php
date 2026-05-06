<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class FilmSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'genre_id' => 5,
                'title'    => 'Interstellar',
                'director' => 'Christopher Nolan',
                'actors'   => 'Matthew McConaughey, Anne Hathaway, Jessica Chastain',
                'year'     => 2014,
                'rating'   => 8.7,
                'synopsis' => 'A team of explorers travel through a wormhole in space in an attempt to ensure humanitys survival.',
                'poster'   => null,
            ],
            [
                'genre_id' => 1,
                'title'    => 'The Dark Knight',
                'director' => 'Christopher Nolan',
                'actors'   => 'Christian Bale, Heath Ledger, Aaron Eckhart',
                'year'     => 2008,
                'rating'   => 9.0,
                'synopsis' => 'When the menace known as the Joker wreaks havoc on Gotham, Batman must fight to restore order.',
                'poster'   => null,
            ],
            [
                'genre_id' => 2,
                'title'    => 'Parasite',
                'director' => 'Bong Joon-ho',
                'actors'   => 'Song Kang-ho, Lee Sun-kyun, Cho Yeo-jeong',
                'year'     => 2019,
                'rating'   => 8.5,
                'synopsis' => 'Greed and class discrimination threaten the symbiotic relationship between the wealthy Park family and the destitute Kim clan.',
                'poster'   => null,
            ],
            [
                'genre_id' => 5,
                'title'    => 'Dune',
                'director' => 'Denis Villeneuve',
                'actors'   => 'Timothee Chalamet, Rebecca Ferguson, Oscar Isaac',
                'year'     => 2021,
                'rating'   => 8.0,
                'synopsis' => 'A noble family becomes embroiled in a war for control over the galaxys most valuable asset.',
                'poster'   => null,
            ],
            [
                'genre_id' => 7,
                'title'    => 'Spider-Man: Into the Spider-Verse',
                'director' => 'Bob Persichetti',
                'actors'   => 'Shameik Moore, Jake Johnson, Hailee Steinfeld',
                'year'     => 2018,
                'rating'   => 8.4,
                'synopsis' => 'Teen Miles Morales becomes Spider-Man and must join five spider-powered individuals to stop a multiversal threat.',
                'poster'   => null,
            ],
        ];

        $this->db->table('films')->insertBatch($data);
    }
}
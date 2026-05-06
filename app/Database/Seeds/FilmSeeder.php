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
                'poster'   => 'uploads/posters/1778058026_4cc931312fe3a4257449.jpg',
            ],
            [
                'genre_id' => 1,
                'title'    => 'The Dark Knight',
                'director' => 'Christopher Nolan',
                'actors'   => 'Christian Bale, Heath Ledger, Aaron Eckhart',
                'year'     => 2008,
                'rating'   => 9.0,
                'synopsis' => 'When the menace known as the Joker wreaks havoc on Gotham, Batman must fight to restore order.',
                'poster'   => 'uploads/posters/1778057966_959c106ef3a3d65c1a1d.jpg',
            ],
            [
                'genre_id' => 2,
                'title'    => 'Parasite',
                'director' => 'Bong Joon-ho',
                'actors'   => 'Song Kang-ho, Lee Sun-kyun, Cho Yeo-jeong',
                'year'     => 2019,
                'rating'   => 8.5,
                'synopsis' => 'Greed and class discrimination threaten the symbiotic relationship between the wealthy Park family and the destitute Kim clan.',
                'poster'   => 'uploads/posters/1778058221_c4211cd6da8c118057ad.jpg',
            ],
            [
                'genre_id' => 5,
                'title'    => 'Dune',
                'director' => 'Denis Villeneuve',
                'actors'   => 'Timothee Chalamet, Rebecca Ferguson, Oscar Isaac',
                'year'     => 2021,
                'rating'   => 8.0,
                'synopsis' => 'A noble family becomes embroiled in a war for control over the galaxys most valuable asset.',
                'poster'   => 'uploads/posters/1778058134_a1fd8bae300e7c41d97a.webp',
            ],
            [
                'genre_id' => 7,
                'title'    => 'Spider-Man: Into the Spider-Verse',
                'director' => 'Bob Persichetti',
                'actors'   => 'Shameik Moore, Jake Johnson, Hailee Steinfeld',
                'year'     => 2018,
                'rating'   => 8.4,
                'synopsis' => 'Teen Miles Morales becomes Spider-Man and must join five spider-powered individuals to stop a multiversal threat.',
                'poster'   => 'uploads/posters/1778057880_ab70dee6eb2966d043df.webp',
            ],
        ];

        $this->db->table('films')->insertBatch($data);
    }
}
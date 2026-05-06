<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class GenreSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['name' => 'Action'],
            ['name' => 'Drama'],
            ['name' => 'Comedy'],
            ['name' => 'Horror'],
            ['name' => 'Sci-Fi'],
            ['name' => 'Thriller'],
            ['name' => 'Animation'],
            ['name' => 'Romance'],
        ];

        $this->db->table('genres')->insertBatch($data);
    }
}
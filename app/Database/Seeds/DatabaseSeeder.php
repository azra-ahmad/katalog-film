<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call('GenreSeeder');
        $this->call('FilmSeeder');
        $this->call('MemberSeeder');
    }
}
<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MemberSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['name' => 'Azra Ahmad Algifari',    'npm' => '50422311', 'role' => 'Dewan'],
            ['name' => 'Muhammad Rafi Aditya',   'npm' => '10123002', 'role' => 'Pesiden'],
            ['name' => 'Muhammad Raihan Aditya', 'npm' => '51422123', 'role' => 'Cw Hyper'],
            ['name' => 'Zidan Fadla',            'npm' => '10123004', 'role' => 'DPR'],
        ];

        $this->db->table('members')->insertBatch($data);
    }
}
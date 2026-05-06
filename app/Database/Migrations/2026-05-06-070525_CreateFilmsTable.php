<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateFilmsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'         => ['type' => 'INT', 'auto_increment' => true],
            'genre_id'   => ['type' => 'INT', 'null' => false],
            'title'      => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => false],
            'director'   => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => false],
            'actors'     => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => false],
            'year'       => ['type' => 'YEAR', 'null' => false],
            'rating'     => ['type' => 'DECIMAL', 'constraint' => '2,1', 'default' => 0.0],
            'synopsis'   => ['type' => 'TEXT', 'null' => true],
            'poster'     => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'created_at' => ['type' => 'TIMESTAMP', 'null' => true],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('genre_id', 'genres', 'id', 'RESTRICT', 'RESTRICT');
        $this->forge->createTable('films');
    }

    public function down()
    {
        $this->forge->dropTable('films');
    }
}

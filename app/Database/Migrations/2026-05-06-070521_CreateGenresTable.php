<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateGenresTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'   => ['type' => 'INT', 'auto_increment' => true],
            'name' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => false],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('genres');
    }

    public function down()
    {
        $this->forge->dropTable('genres');
    }
}

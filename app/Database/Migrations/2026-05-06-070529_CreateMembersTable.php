<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMembersTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'   => ['type' => 'INT', 'auto_increment' => true],
            'name' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => false],
            'npm'  => ['type' => 'VARCHAR', 'constraint' => 20, 'null' => false],
            'role' => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => false],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('members');
    }

    public function down()
    {
        $this->forge->dropTable('members');
    }
}

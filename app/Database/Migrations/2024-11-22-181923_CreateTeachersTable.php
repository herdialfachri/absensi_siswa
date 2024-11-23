<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTeachersTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'        => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'user_id'   => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'name'      => ['type' => 'VARCHAR', 'constraint' => 100],
            'nip'       => ['type' => 'VARCHAR', 'constraint' => 20],
            'phone'     => ['type' => 'VARCHAR', 'constraint' => 15],
            'email'     => ['type' => 'VARCHAR', 'constraint' => 100],
            'address'   => ['type' => 'TEXT', 'null' => true],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('teachers');
    }

    public function down()
    {
        $this->forge->dropTable('teachers');
    }
}

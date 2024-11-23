<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMastersTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'        => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'user_id'   => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'name'      => ['type' => 'VARCHAR', 'constraint' => 100],
            'phone'     => ['type' => 'VARCHAR', 'constraint' => 15],
            'email'     => ['type' => 'VARCHAR', 'constraint' => 100],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('masters');
    }

    public function down()
    {
        $this->forge->dropTable('masters');
    }
}

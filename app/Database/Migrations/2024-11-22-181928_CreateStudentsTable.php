<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateStudentsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'        => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'class_id'  => ['type' => 'INT','unsigned' => true],
            'name'      => ['type' => 'VARCHAR', 'constraint' => 100],
            'nis'       => ['type' => 'VARCHAR', 'constraint' => 20, 'unique' => true], // Nomor Induk Siswa
            'email'     => ['type' => 'VARCHAR', 'constraint' => 100],
            'phone'     => ['type' => 'VARCHAR', 'constraint' => 15, 'null' => true],
            'address'   => ['type' => 'TEXT', 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('class_id', 'classes', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('students');
    }

    public function down()
    {
        $this->forge->dropTable('students');
    }
}

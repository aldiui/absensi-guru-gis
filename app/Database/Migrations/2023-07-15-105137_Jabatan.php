<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Jabatan extends Migration
{
    public function up()
    {
        $this->forge->addKey('id', true);
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'akronim' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'name_jabatan' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->createTable('jabatan');
    }

    public function down()
    {
        $this->forge->dropTable('jabatan');
    }
}
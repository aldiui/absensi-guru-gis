<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tokens extends Migration
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
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'token' => [
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
        $this->forge->createTable('tokens');
    }

    public function down()
    {
        $this->forge->dropTable('tokens');
    }
}
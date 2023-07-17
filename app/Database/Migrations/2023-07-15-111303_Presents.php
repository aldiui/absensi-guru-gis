<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Presents extends Migration
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
            'user_id' => [
                'type' => 'INT',
            ],
            'date' => [
                'type' => 'DATE',
            ],
            'hour_in' => [
                'type' => 'TIME',
            ],
            'hour_out' => [
                'type' => 'TIME',
            ],
            'image_in' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'image_out' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'location_in' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'location_out' => [
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
        $this->forge->createTable('presents');
    }

    public function down()
    {
        $this->forge->dropTable('presents');
    }
}
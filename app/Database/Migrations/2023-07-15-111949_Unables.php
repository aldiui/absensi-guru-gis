<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Unables extends Migration
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
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['Izin', 'Sakit'],
            ],
            'image' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'keterangan' => [
                'type' => 'TEXT',
            ],
            'persetujuan' => [
                'type' => 'BOOLEAN',
                'default' => false,
            ],
            'admin_id' => [
                'type' => 'INT',
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
        $this->forge->createTable('unables');
    }

    public function down()
    {
        $this->forge->dropTable('unables');
    }
}
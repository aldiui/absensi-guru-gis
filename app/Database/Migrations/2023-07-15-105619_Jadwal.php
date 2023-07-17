<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Jadwal extends Migration
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
            'hari' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'jam_masuk' => [
                'type' => 'TIME',
            ],
            'jam_keluar' => [
                'type' => 'TIME',
            ],
            'jam_mengajar' => [
                'type' => 'INT',
            ],
            'status' => [
                'type' => 'BOOLEAN',
                'default' => false,
            ],
            'status_backup' => [
                'type' => 'BOOLEAN',
                'default' => false,
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
        $this->forge->createTable('jadwal');
    }

    public function down()
    {
        $this->forge->dropTable('jadwal');
    }
}
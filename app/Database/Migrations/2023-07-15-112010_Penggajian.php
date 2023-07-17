<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Penggajian extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type' => 'INT',
            ],
            'bulan' => [
                'type' => 'INT',
            ],
            'tahun' => [
                'type' => 'INT',
            ],
            'total_jam' => [
                'type' => 'INT',
            ],
            'total_absensi' => [
                'type' => 'INT',
            ],
            'gaji' => [
                'type' => 'INT',
            ],
            'gaji_pokok' => [
                'type' => 'INT',
            ],
            'tunjangan' => [
                'type' => 'INT',
            ],
            'lain_lain' => [
                'type' => 'INT',
            ],
            'total' => [
                'type' => 'INT',
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

        $this->forge->addKey('id', true);
        $this->forge->createTable('penggajian');
    }

    public function down()
    {
        $this->forge->dropTable('penggajian');
    }
}
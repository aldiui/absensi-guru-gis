<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Settings extends Migration
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
            'name_kantor' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'name_aplikasi' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'logo_kantor' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'address' => [
                'type' => 'TEXT',
            ],
            'long' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'lat' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'radius' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'sebelum_masuk' => [
                'type' => 'INT',
            ],
            'sebelum_pulang' => [
                'type' => 'INT',
            ],
            'setelah_pulang' => [
                'type' => 'INT',
            ],
            'gaji' => [
                'type' => 'INT',
            ],
            'name_ttd' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'jabatan_ttd' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'image_ttd' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'path' => [
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
        $this->forge->createTable('settings');
    }

    public function down()
    {
        $this->forge->dropTable('settings');
    }
}
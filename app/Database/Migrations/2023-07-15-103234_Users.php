<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'phone' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'alamat' => [
                'type' => 'TEXT',
            ],
            'jabatan_id' => [
                'type' => 'INT',
            ],
            'role' => [
                'type' => 'ENUM',
                'constraint' => ['Guru', 'Operator'],
            ],
            'is_active' => [
                'type' => 'BOOLEAN',
                'default' => false,
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'salt' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'image' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'default' => 'default.jpg',
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
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Email extends Migration
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
            'from_email' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'from_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'recipients' => [
                'type' => 'TEXT',
            ],
            'user_agent' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'protocol' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'mail_path' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'smtp_host' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'smtp_user' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'smtp_pass' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'smtp_port' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'smtp_timeout' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'smtp_keep_alive' => [
                'type' => 'BOOLEAN',
            ],
            'smtp_crypto' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'word_wrap' => [
                'type' => 'BOOLEAN',
            ],
            'wrap_chars' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'mail_type' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'charset' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'validate' => [
                'type' => 'BOOLEAN',
            ],
            'priority' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'crlf' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'newline' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'bcc_batch_mode' => [
                'type' => 'BOOLEAN',
            ],
            'bcc_batch_size' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'dsn' => [
                'type' => 'BOOLEAN',
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
        $this->forge->createTable('email');
    }

    public function down()
    {
        $this->forge->dropTable('email');
    }
}
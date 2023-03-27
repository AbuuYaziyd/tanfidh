<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Banks extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'bankId' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'bankName' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'bankShort' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'updated_at' => [
                'type' => 'datetime',
                'null' => true,
            ],
            'created_at datetime default current_timestamp',
        ]);
        $this->forge->addKey('bankId', true);
        $this->forge->createTable('banks');
    }

    public function down()
    {
        $this->forge->dropTable('banks');
    }
}
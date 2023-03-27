<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Universities extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'uni_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'uni_name' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'uni_reg' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'datetime',
                'null' => true,
            ],
            'created_at datetime default current_timestamp',
        ]);
        $this->forge->addKey('uni_id', true);
        $this->forge->createTable('universities');
    }

    public function down()
    {
        $this->forge->dropTable('universities');
    }
}

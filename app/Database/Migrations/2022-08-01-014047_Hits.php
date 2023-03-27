<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Hits extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 255,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'ip' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'created_at datetime default current_timestamp',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('hits');
    }

    public function down()
    {
        $this->forge->dropTable('hits');
    }
}

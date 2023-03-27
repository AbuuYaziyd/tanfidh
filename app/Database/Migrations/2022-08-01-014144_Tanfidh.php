<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tanfidh extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'tnfdhId' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'userId' => [
                'type'           => 'INT',
                'constraint'     => 50,
            ],
            'tasrih' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'tnfdhDate' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'tnfdhName' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'tnfdhSabab' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'tnfdhStatus' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'default' => 0,
            ],
            'miqat' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'makkah' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'tanfdhAmount' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'mushrif' => [
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
        $this->forge->addKey('tnfdhId', true);
        $this->forge->createTable('tanfidh');
    }

    public function down()
    {
        $this->forge->dropTable('tanfidh');
    }
}

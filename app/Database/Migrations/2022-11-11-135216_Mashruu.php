<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Mashruu extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'ism' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'sabab' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'date' => [
                'type'       => 'DATE',
                'null' => true,
            ],
            'status' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'default' => 0,
            ],
            'amount' => [
                'type'       => 'INT',
                'constraint' => 255,
                'null' => true,
            ],
            'bank' => [
                'type'       => 'INT',
                'constraint' => 255,
                'null' => true,
            ],
            'mushrif' => [
                'type'       => 'INT',
                'constraint' => 255,
                'null' => true,
            ],
            'nation' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'userId' => [
                'type'       => 'INT',
                'constraint' => 255,
                'null' => true,
            ],
            'malaf' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'phone' => [
                'type'       => 'INT',
                'constraint' => 255,
                'null' => true,
            ],
            'jamia' => [
                'type'       => 'INT',
                'constraint' => 255,
                'null' => true,
            ],
            'iban' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            // 'miqatLat' => [
            //     'type'       => 'VARCHAR',
            //     'constraint' => 255,
            //     'null' => true,
            // ],
            // 'miqatLong' => [
            //     'type'       => 'VARCHAR',
            //     'constraint' => 255,
            //     'null' => true,
            // ],
            // 'tawafLat' => [
            //     'type'       => 'VARCHAR',
            //     'constraint' => 255,
            //     'null' => true,
            // ],
            // 'tawafLong' => [
            //     'type'       => 'VARCHAR',
            //     'constraint' => 255,
            //     'null' => true,
            // ],
            // 'saiLat' => [
            //     'type'       => 'VARCHAR',
            //     'constraint' => 255,
            //     'null' => true,
            // ],
            // 'saiLong' => [
            //     'type'       => 'VARCHAR',
            //     'constraint' => 255,
            //     'null' => true,
            // ],
            'updated_at' => [
                'type' => 'datetime',
                'null' => true,
            ],
            'created_at datetime default current_timestamp',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('mashruu');
    }

    public function down()
    {
        $this->forge->dropTable('mashruu');
    }
}

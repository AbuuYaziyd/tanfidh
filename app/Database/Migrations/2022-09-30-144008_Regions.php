<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Regions extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'regionId' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'capitalCityId' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'code' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'nameEn' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'nameAr' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'population' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
        ]);
        $this->forge->addKey('regionId', true);
        $this->forge->createTable('regions');
    }

    public function down()
    {
        $this->forge->dropTable('regions');
    }
}

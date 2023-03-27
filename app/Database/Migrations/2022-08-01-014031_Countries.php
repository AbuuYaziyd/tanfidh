<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Countries extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'country_code' => [
                'type'       => 'VARCHAR',
                'constraint' => 2,
            ],
            'country_enName' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'country_arName' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'country_enNationality' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'country_arNationality' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
        ]);
        $this->forge->addKey('country_code', true);
        $this->forge->createTable('countries');
    }

    public function down()
    {
        $this->forge->dropTable('countries');
    }
}
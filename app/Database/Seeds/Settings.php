<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Settings extends Seeder
{
    public function run()
    {
        $this->db->query("INSERT INTO `settings` (`name`, `value`) VALUES
            ('count', '5000'),
            ('tanfidh', '01-01-2000')");
    }
}

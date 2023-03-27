<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Full extends Seeder
{
    public function run()
    {
        $this->call('Banks');
        $this->call('Cities');
        $this->call('Countries');
        $this->call('Regions');
        $this->call('Users');
    }
}

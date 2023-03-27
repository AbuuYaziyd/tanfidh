<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Banks extends Seeder
{
    public function run()
    {
        $this->db->query("INSERT INTO `banks` (`bankId`, `bankName`, `bankShort`) VALUES
(1, 'الأهلي', 'NCBK'),
(2, 'البلاد', 'ALBI'),
(3, 'الإنماء', 'INMA'),
(4, 'الراجحي', 'RJHI'),
(5, 'العربي الوطني', 'ARNB'),
(6, 'السعودي الفرنسي', 'BANK'),
(7, 'الجزيرة', 'BANK'),
(8, 'الرياض', 'BANK'),
(9, 'السعودي للاستثمار', 'SAIB'),
(10, 'سامبا', 'SAMBA'),
(11, 'الخليج الدولي', 'GIB-SA')");
    }
}

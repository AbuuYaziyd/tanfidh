<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Regions extends Seeder
{
    public function run()
    {
        $this->db->query(
            "INSERT INTO `regions` (`regionId`, `capitalCityId`, `code`, `nameAr`, `nameEn`, `population`) VALUES
            (1, 3, 'RD', 'منطقة الرياض', 'Riyadh', 6777146),
            (2, 6, 'MQ', 'منطقة مكة المكرمة', 'Makkah', 6915006),
            (3, 14, 'MN', 'منطقة المدينة المنورة', 'Madinah', 1777933),
            (4, 11, 'QA', 'منطقة القصيم', 'Qassim', 1215858),
            (5, 13, 'SQ', 'المنطقة الشرقية', 'Eastern Province', 4105780),
            (6, 15, 'AS', 'منطقة عسير', 'Asir', 1913392),
            (7, 1, 'TB', 'منطقة تبوك', 'Tabuk', 791535),
            (8, 10, 'HA', 'منطقة حائل', 'Hail', 597144),
            (9, 2213, 'SH', 'منطقة الحدود الشمالية', 'Northern Borders', 320524),
            (10, 17, 'GA', 'منطقة جازان', 'Jazan', 1365110),
            (11, 3417, 'NG', 'منطقة نجران', 'Najran', 505652),
            (12, 1542, 'BA', 'منطقة الباحة', 'Bahah', 411888),
            (13, 2237, 'GO', 'منطقة الجوف', 'Jawf', 440009)"
        );
    }
}

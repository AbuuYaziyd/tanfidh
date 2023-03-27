<?php

namespace App\Models;

use CodeIgniter\Model;

class Umrah extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tanfidh';
    protected $primaryKey       = 'tnfdhId';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'userId',
        'malaf',
        'tasrih',
        'tnfdhName',
        'tnfdhSabab',
        'mashruuId',
        'tnfdhDate',
        'miqatLat',
        'miqatLong',
        'makkahLat',
        'makkahLong',
        'tanfdhAmount',
        'mushrif',
        'mulahadha',
        'tnfdhStatus',
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    function getaddress($lat, $lng)
    {
        $url = 'https://api.geoapify.com/v1/geocode/reverse?'.$lat.'&'.$lng.'&apiKey=4e9787bcc68c4bbb90c2dbf8520d393f';
        $json = @file_get_contents($url);
        $data = json_decode($json);
        return $data;
        // $status = $data->status;
        // if ($status == "OK") {
        //     return $data->results[0]->formatted_address;
        // } else {
        //     return false;
        // }
    }
}

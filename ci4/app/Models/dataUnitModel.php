<?php

namespace App\Models;

use CodeIgniter\Model;

class dataUnitModel extends Model
{
    protected $table = 'setdataUnit';
    protected $primaryKey = 'ID_UNIT';
    protected $allowedFields = [
        'CUSTOMER',
        'UNIT',
        'CATEGORY_CUSTOMER',
        'KODE_PUSAT_BIAYA',
        'DESKRIPSI_PUSAT_BIAYA',
        'JENIS_PEMBANGKIT',
        'STATUS'
    ];
}

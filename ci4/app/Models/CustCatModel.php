<?php

namespace App\Models;

use CodeIgniter\Model;

class CustCatModel extends Model
{
    protected $table = 'mst_category_customer';
    protected $primaryKey = 'ID_CATEGORY_CUSTOMER';
    protected $allowedFields = [
        'INITIAL_CATEGORY_CUSTOMER',
        'KETERANGAN_CATEGORY_CUSTOMER',
        'STATUS',
        'FLAG',
        'NAMA_CATEGORY_CUSTOMER'
    ];
}

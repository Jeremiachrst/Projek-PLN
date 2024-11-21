<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model
{
    protected $table = 'mst_customer';
    protected $primaryKey = 'ID_CUSTOMER';
    protected $allowedFields = [
        'INITIAL_CUSTOMER',
        'STATUS',
        'ID_CATEGORY_CUSTOMER',
        'NAME_CUSTOMER'
    ];
}

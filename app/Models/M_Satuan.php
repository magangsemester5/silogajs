<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Satuan extends Model
{
    protected $table            = 'satuan';
    protected $foreignKey       = 'satid';
    protected $allowedFields    = [
        'satid , satnama'
    ];
}
?>
<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Satuan extends Model
{
    protected $table            = 'satuan';
    protected $primaryKey       = 'id_satuan';
    protected $returnType       = "object";
    protected $allowedFields    = [
        'nama_satuan'
    ];
}
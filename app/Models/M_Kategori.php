<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Kategori extends Model
{
    protected $table            = 'kategori';
    protected $foreignKey       = 'katid';
    protected $returnType       = "object";
    protected $allowedFields    = [
        'katid', 'katnama'
    ];
}

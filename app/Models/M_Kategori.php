<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Kategori extends Model
{
    protected $table            = 'kategori';
    protected $primaryKey       = 'id_kategori';
    protected $returnType       = "object";
    protected $allowedFields    = [
        'nama_kategori'
    ];
}

<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Barang extends Model
{
    protected $table            = 'barang';
    protected $primaryKey       = 'brgkode';
    protected $allowedFields    = [
        'brgkode', 'brgnama' , 'brgkatid' , 'brgsatid' , 'brgharga' , 'brggambar'
    ];
}

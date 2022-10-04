<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Detail_Permintaan_Kabel extends Model
{
    protected $table            = 'detail_permintaan_kabel';
    protected $primaryKey       = 'id_detail_permintaan_kabel';
    protected $useAutoIncrement = true;
    protected $returnType       = "object";
    protected $allowedFields    = [
        'id_detail_permintaan_kabel','id_permintaan_kabel','id_kabel','panjang','status'
    ];
}

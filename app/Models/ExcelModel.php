<?php

namespace App\Models;

use CodeIgniter\Model;

class ExcelModel extends Model
{
    protected $table = 'veriler';
    protected $primaryKey = 'daire_id';
    protected $allowedFields = ['blok_adi', 'daire_no', 'daire_tipi', 'ev_sahibi_id', 'kiraci_id', 'kasa'];
}

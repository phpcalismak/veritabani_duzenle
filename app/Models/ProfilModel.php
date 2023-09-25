<?php 

namespace App\Models;

use CodeIgniter\Model;

class ProfilModel extends Model
{
    protected $table = 'daireler'; 

    public function getProfilData($daire_id)
    {
        return $this->db->table($this->table)
            ->join('hesaplar', 'hesaplar.daire_id = daireler.daire_id')
            ->join('daire_sakinleri', 'daire_sakinleri.daire_id = daireler.daire_id')
            ->where('daireler.daire_id', $daire_id)
            ->get()
            ->getRow();
    }
}

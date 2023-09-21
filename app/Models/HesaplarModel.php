<?php 

namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class HesaplarModel extends Model
{
    protected $table = 'hesaplar';
    protected $primaryKey = 'hesap_id';
    protected $allowedFields = ['hesap_turu','email','sifre','aktivasyon_kodu','hesap_onay','created_at','reset_token','daire_id'];

    public function insertData($data)
    {
        if($this->db->table($this->table)->insert($data))
        {
            return $this->db->insertID(); 
        }
        else
        {
            return false;
        }
    }
}
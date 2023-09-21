<?php 

namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class AidatlarModel extends Model
{
	protected $table = 'aidatlar';
	protected $primaryKey = 'aidat_id';
	protected $allowedFields = ['aciklama','odeme_tarihi','tutar','daire_id','odendi_mi'];

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
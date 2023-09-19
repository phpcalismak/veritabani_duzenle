<?php 

namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class AidatlarModel extends Model
{
	protected $table = 'aidatlar';
	protected $primaryKey = 'aidat_id';
	protected $allowedFields = ['kategori','aciklama','duzenleme_tarihi','odeme_tarihi','tutar'];

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
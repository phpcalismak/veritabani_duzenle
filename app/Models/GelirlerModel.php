<?php 

namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class GelirlerModel extends Model
{
	protected $table = 'gelirler';
	protected $primaryKey = 'gelir_id';
	protected $allowedFields = ['aciklama','tarih','tutar'];

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
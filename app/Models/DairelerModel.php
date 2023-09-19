<?php 

namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class DairelerModel extends Model
{
	protected $table = 'daireler';
	protected $primaryKey = 'daire_id';
	protected $allowedFields = ['blok_adi','daire_no','daire_tipi','kasa'];

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
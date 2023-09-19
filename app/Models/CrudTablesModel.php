<?php 

namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class CrudTablesModel extends Model
{
	protected $table = 'hesaplar';
	
	protected $allowedFields = ['ad_soyad','daire_no'];

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
<?php 

namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class DuyurularModel extends Model
{
	protected $table = 'duyurular';
	protected $primaryKey = 'duyuru_id';
	protected $allowedFields = ['duyuru_basligi','duyuru_metni','duyuru_tarihi'];

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
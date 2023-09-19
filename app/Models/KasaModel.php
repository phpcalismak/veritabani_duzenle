<?php 

namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class KasaModel extends Model
{
	protected $table = 'kasalar';
	protected $primaryKey = 'kasa_id';
	protected $allowedFields = ['aciklama','tarih','bakiye'];

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
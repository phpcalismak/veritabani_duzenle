<?php 

namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class GiderKategorileriModel extends Model
{
	protected $table = 'gider_kategorileri';
	protected $primaryKey = 'kategori_id';
	protected $allowedFields = ['kategori_adi'];

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
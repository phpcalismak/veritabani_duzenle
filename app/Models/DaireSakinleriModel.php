<?php 

namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class DaireSakinleriModel extends Model
{
	protected $table = 'daire_sakinleri';
	protected $primaryKey = 'sakin_id	';
	protected $allowedFields = ['ad_soyad','tc_no','telefon','sakin_turu','daire_id'];

}
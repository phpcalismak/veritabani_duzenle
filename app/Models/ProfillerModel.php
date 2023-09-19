<?php 

namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class ProfillerModel extends Model
{
	protected $table = 'profiller';
	protected $primaryKey = 'profil_id';
	protected $allowedFields = ['ad_soyad','telefon','email','tc_no'];

}
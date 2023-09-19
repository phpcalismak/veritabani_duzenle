<?php 

namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class SiteAyarlariModel extends Model
{
	protected $table = 'website_ayarlari';
	protected $primaryKey = 'ayar_id';
	protected $allowedFields = ['site_basligi','site_logosu', 'site_aciklamasi','email_adresi','telefon_numarasi','ana_sayfa_mesaji','sosyal_medya_linkleri'];

}



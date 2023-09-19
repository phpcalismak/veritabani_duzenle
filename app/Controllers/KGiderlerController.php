<?php 

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\GiderlerModel;
use App\Models\GiderKategorileriModel;

class KGiderlerController extends BaseController 
{
    public function index()
    {
         $giderlerModel = new GiderlerModel();

    $giderler = $giderlerModel
        ->select('giderler.*, gider_kategorileri.kategori_adi')
        ->join('gider_kategorileri', 'gider_kategorileri.kategori_id = giderler.kategori_id', 'left')
        ->orderBy('gider_id', 'DESC')
        ->findAll();
   
    $data['giderler'] = $giderler;

    $data['website_ayarlari'] = $this->data['website_ayarlari'];

    return view('dashboard/k_giderler', $data);

    }
}
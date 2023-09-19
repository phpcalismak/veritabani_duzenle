<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ProfillerModel;

class ProfillerController extends BaseController
{
    public function index($profil_id)
    {

    $model = new ProfillerModel();
    $data['profiller'] = $model->where('profil_id', $profil_id)->first(); 

    if (empty($data['profiller'])) {
      
        return redirect()->to('dashboard/admin/hesaplar'); 
    }
       
         $data['website_ayarlari'] = $this->data['website_ayarlari'];
         return view('dashboard/profiller/', $data);
    }
}

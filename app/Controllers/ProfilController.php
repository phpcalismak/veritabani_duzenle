<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ProfilModel;

class ProfilController extends BaseController
{
    public function index($daire_id)
    {
        $profilModel = new ProfilModel();
        $profilData = $profilModel->getProfilData($daire_id);
        $data = [
            'profilData' => $profilData,
            'website_ayarlari' => $this->data['website_ayarlari'],
        ];

        return view('dashboard/admin/profil', $data);
    }
}

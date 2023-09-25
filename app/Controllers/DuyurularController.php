<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\DuyurularModel;

class DuyurularController extends BaseController
{
    public function index()
    {
        $duyurularModel = new DuyurularModel();
        $data['duyurular'] = $duyurularModel->findAll(); 
 $data['website_ayarlari'] = $this->data['website_ayarlari'];
        return view('dashboard/duyurular', $data); 
    }
}

<?php

namespace App\Controllers;

use App\Models\SiteAyarlariModel;
use CodeIgniter\Controller;

class IletisimController extends BaseController
{

    public function __construct()
    {
        $model = new SiteAyarlariModel();
        $this->data['website_ayarlari'] = $model->first();
    }
    public function index()
    {
        return view('dashboard/iletisim', $this->data);
    }

  

}

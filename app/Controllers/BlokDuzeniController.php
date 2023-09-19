<?php

namespace App\Controllers;

use App\Models\DairelerModel;
use CodeIgniter\Controller;

class BlokDuzeniController extends BaseController
{

    public function __construct()
    {
        $model = new DairelerModel();
        $this->data['website_ayarlari'] = $model->first();
    }
    public function index()
    {
        return view('dashboard/admin/blok_duzeni', $this->data);
    }

    public function update()
    {

       return view('dashboard/admin/blok_duzeni', $this->data);
    }
  
}

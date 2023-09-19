<?php 
namespace App\Controllers;
use App\Models\SiteAyarlariModel;

use CodeIgniter\Controller;


class DashboardController extends BaseController
{
    public function index()
    {
      $data['website_ayarlari'] = $this->data['website_ayarlari'];
      return view('dashboard/anasayfa',$data);
    }
    
    public function profile()
    {
          $data['website_ayarlari'] = $this->data['website_ayarlari'];
        return view('dashboard/profile',$data);
    }
   

}
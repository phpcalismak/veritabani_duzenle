<?php

namespace App\Controllers;

use App\Models\HesaplarModel;
use App\Models\ProfillerModel;
use CodeIgniter\Controller;

class HesaplarController extends BaseController
{
   
public function index()
{
    $model = new HesaplarModel();
    $hesaplar = $model->orderBy('daire_id', 'DESC')->findAll();

    $data['hesaplar'] = [];
    foreach ($hesaplar as $hesap) {
        if ($hesap['hesap_turu'] == 1) {
            $hesap['hesap_turu_text'] = 'Yönetici';
        } else {
            $hesap['hesap_turu_text'] = 'Site Sakini';
        }
        $data['hesaplar'][] = $hesap;
    }

    $data['website_ayarlari'] = $this->data['website_ayarlari'];

    return view('dashboard/admin/hesaplar', $data);
}


    public function store()
    {
        helper(['form', 'url']);
        $model = new HesaplarModel();

        $data = [
            'hesap_turu' => $this->request->getVar('txtUserName'),
           
            'sifre' => $this->request->getVar('txtDuzenlemeTarihi'),
            

        ];
        $save = $model->insertData($data);
        if ($save) {
            $data = $model->where('daire_id', $save)->first();
            echo json_encode(["status" => true, 'data' => $data]);
        } else {
            echo json_encode(["status" => false, 'data' => $data]);
        }
    }
     public function edit($daire_id = null)
    {
        $model = new HesaplarModel();
        $data = $model->where('daire_id', $daire_id)->first();

        if ($data) {
            echo json_encode(["status" => true, 'data' => $data]);
        } else {
            echo json_encode(["status" => false]);
        }
    }
     public function update()
    {
        helper(['form', 'url']);
        $model = new HesaplarModel();
        $daire_id = $this->request->getVar('hdnUserId');
        $data = [
           'hesap_turu' => $this->request->getVar('txtUserName'),
            
            'sifre' => $this->request->getVar('txtDuzenlemeTarihi'),
            

        ];
        
        $update = $model->update($daire_id, $data);
        if ($update) {
            $data = $model->where('daire_id', $daire_id)->first();
            echo json_encode(["status" => true, 'data' => $data]);
        } else {
            echo json_encode(["status" => false, 'data' => $data]);
        }
    }
       
    public function delete($daire_id = null)
    {
        $model = new HesaplarModel();
        $delete = $model->where('daire_id', $daire_id)->delete();
        if ($delete) {
            echo json_encode(["status" => true]);
        } else {
            echo json_encode(["status" => false]);
        }
    }

    public function profiller()
    {
       


    $model = new ProfillerModel();
    $data['profiller'] = $model->where('profil_id', $profil_id)->first(); 

    if (empty($data['profiller'])) {
      
        return redirect()->to('dashboard/admin/hesaplar'); 
    }
       
         $data['website_ayarlari'] = $this->data['website_ayarlari'];
         return view('dashboard/admin/profiller/', $data);
    }

   

}
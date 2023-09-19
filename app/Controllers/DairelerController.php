<?php

namespace App\Controllers;

use App\Models\DairelerModel;
use App\Models\SiteAyarlariModel;
use CodeIgniter\Controller;

class DairelerController extends BaseController
{
   

    public function index()
    {
        $model = new DairelerModel();
        $data['daireler'] = $model->orderBy('daire_id', 'DESC')->findAll();
        $data['website_ayarlari'] = $this->data['website_ayarlari'];
        return view('dashboard/admin/daireler', $data);
    }

    public function store()
    {
        helper(['form', 'url']);
        $model = new DairelerModel();

        $data = [
            'blok_adi' => $this->request->getVar('txtUserName'),
            'daire_no' => $this->request->getVar('txtPassword'),
            'daire_tipi' => $this->request->getVar('txtDuzenlemeTarihi'),
            'kasa' => $this->request->getVar('txtOdemeTarihi')
            

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
        $model = new DairelerModel();
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
        $model = new DairelerModel();
        $daire_id = $this->request->getVar('hdnUserId');
        $data = [
            'blok_adi' => $this->request->getVar('txtUserName'),
            'daire_no' => $this->request->getVar('txtPassword'),
            'daire_tipi' => $this->request->getVar('txtDuzenlemeTarihi'),
            'kasa' => $this->request->getVar('txtOdemeTarihi')
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
        $model = new DairelerModel();
        $delete = $model->where('daire_id', $daire_id)->delete();
        if ($delete) {
            echo json_encode(["status" => true]);
        } else {
            echo json_encode(["status" => false]);
        }
    }
   

}
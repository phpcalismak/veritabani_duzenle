<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\AidatlarModel;
use App\Models\GelirlerModel;
use App\Models\SiteAyarlariModel;

class GelirlerController extends BaseController
{
    public function index()
    {
        $aidatlarModel = new AidatlarModel();
        $odendiAidatlar = $aidatlarModel->where('odendi_mi', 1)->findAll();
         $gelirlerModel = new GelirlerModel();
       foreach ($odendiAidatlar as $aidat) {
    $gelirlerModel = new GelirlerModel();
    
    // Kaydın daha önce eklenip eklenmediğini kontrol et
    $existingRecord = $gelirlerModel->where('aciklama', 'Daireye ait aidat ödemesi')
        ->where('tutar', $aidat['tutar'])
        ->where('tarih', date('Y-m-d'))
        ->first();
    
    if (!$existingRecord) {
        // Kaydı eklemek için veriyi hazırla
        $gelirVerisi = [
            'aciklama' => 'Daireye ait aidat ödemesi',
            'tutar' => $aidat['tutar'],
            'tarih' => date('Y-m-d'),
        ];
        
        // Yeni kaydı ekle
        $gelirlerModel->insert($gelirVerisi);
    }
}
         $data['gelirler'] = $gelirlerModel->findAll();
           $data['website_ayarlari'] = $this->data['website_ayarlari'];
        return view('dashboard/admin/gelirler',$data);
    }

    public function store()
    {
        helper(['form', 'url']);
        $model = new GelirlerModel();

        $data = [
            'aciklama' => $this->request->getVar('txtAciklama'),
            'tarih' => $this->request->getVar('txtOdemeTarihi'),
            'tutar' => $this->request->getVar('txtTutar'), 
        ];
        $save = $model->insert($data); 
        
        if ($save) {
            $data = $model->where('gelir_id', $save)->first();
            echo json_encode(["status" => true, 'data' => $data]);
        } else {
            echo json_encode(["status" => false, 'data' => $data]);
        }
    }

    public function edit($gelir_id = null)
    {
        $model = new GelirlerModel();
        $data = $model->find($gelir_id); 

        if ($data) {
            echo json_encode(["status" => true, 'data' => $data]);
        } else {
            echo json_encode(["status" => false]);
        }
    }

    public function update()
    {
        helper(['form', 'url']);
        $model = new GelirlerModel();
        $gelir_id = $this->request->getVar('hdnUserId');
        $data = [
            'aciklama' => $this->request->getVar('txtAciklama'),
            'tarih' => $this->request->getVar('txtOdemeTarihi'),
            'tutar' => $this->request->getVar('txtTutar'), // txttutar yerine txtTutar düzeltildi
        ];
        $update = $model->update($gelir_id, $data);
        if ($update) {
            $data = $model->find($gelir_id); // where yerine find düzeltildi
            echo json_encode(["status" => true, 'data' => $data]);
        } else {
            echo json_encode(["status" => false, 'data' => $data]);
        }
    }

    public function delete($gelir_id = null) // $id yerine $gelir_id düzeltildi
    {
        $model = new GelirlerModel();
        $delete = $model->delete($gelir_id); // where yerine delete düzeltildi
        if ($delete) {
            echo json_encode(["status" => true]);
        } else {
            echo json_encode(["status" => false]);
        }
    }
}

<?php 

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\KasaModel;
use App\Models\GelirlerModel;
use App\Models\GiderlerModel;

class KasaController extends BaseController 
{
    public function index()
    {
        $data['website_ayarlari'] = $this->data['website_ayarlari'];
        // // /// ////////////////////////////////
        $model = new KasaModel();
        $data['kasalar'] = $model->orderBy('kasa_id', 'DESC')->findAll();
    
        $gelirModel = new GelirlerModel();
        $gelirler = $gelirModel->findAll();
        
        $giderModel = new GiderlerModel();
        $giderler = $giderModel->findAll();
       
        $toplamGelir = array_sum(array_column($gelirler, 'tutar'));
        $toplamGider = array_sum(array_column($giderler, 'toplam_odenecek'));

         $toplamBakiye = $toplamGelir - $toplamGider;
         $kasa = $model->find(1);
         if ($kasa) {
        $kasa_id = $kasa['kasa_id'];
        $model->update($kasa_id, ['bakiye' => $toplamBakiye]);
        } 

        return view('dashboard/admin/kasa', $data);
    }

    public function store()
    {
        helper(['form', 'url']);
        $model = new KasaModel();

        $data = [
            'kasa_adi' => $this->request->getVar('txtKasaAdi'),
            'bakiye' => $this->request->getVar('txtBakiye'),
            'tarih' => date('Y-m-d'),
        ];
        $save = $model->insertData($data);
        if ($save) {
            $data = $model->where('kasa_id', $save)->first();
            echo json_encode(["status" => true, 'data' => $data]);
        } else {
            echo json_encode(["status" => false, 'data' => $data]);
        }
    }

    public function edit($kasa_id = null)
    {
        $model = new KasaModel();
         $data = $model->find($kasa_id); 
        if ($data) {
            echo json_encode(["status" => true, 'data' => $data]);
        } else {
            echo json_encode(["status" => false]);
        }
    }

    public function update()
    {
        helper(['form', 'url']);
        $model = new KasaModel();
        $kasa_id = $this->request->getVar('hdnKasaId');
        $data = [
             'kasa_adi' => $this->request->getVar('txtKasaAdi'),
            'bakiye' => $this->request->getVar('txtBakiye'),
            'tarih' => date('Y-m-d'),
        ];
        $update = $model->update($kasa_id, $data);
        if ($update) {
            $data = $model->where('kasa_id', $kasa_id)->first();
            echo json_encode(["status" => true, 'data' => $data]);
        } else {
            echo json_encode(["status" => false, 'data' => $data]);
        }
    }
       
    public function delete($kasa_id = null)
    {
        $model = new KasaModel();
        $delete = $model->where('kasa_id', $kasa_id)->delete();
        if ($delete) {
            echo json_encode(["status" => true]);
        } else {
            echo json_encode(["status" => false]);
        }
    }
}

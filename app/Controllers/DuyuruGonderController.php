<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\DuyurularModel;

class DuyuruGonderController extends BaseController
{
    public function index()
    {
        $duyurularModel = new DuyurularModel();
        $data['duyurular'] = $duyurularModel->findAll();
         $data['website_ayarlari'] = $this->data['website_ayarlari'];

        return view('dashboard/admin/duyuru_gonder', $data);
    }

    public function gonder()
    {
        if ($this->request->getMethod() == 'post') {
            // Formdan başlık ve metni al
            $baslik = $this->request->getPost('baslik');
            $mesaj = $this->request->getPost('mesaj');

            // Duyuru verilerini hazırla
            $duyuruModel = new DuyurularModel();

            $duyuruData = [
                'duyuru_basligi' => $baslik,
                'duyuru_metni' => $mesaj,
            ];

            $duyuruModel->insert($duyuruData);

            return redirect()->to('/duyuru_gonder')->with('success', 'Duyuru başarıyla oluşturuldu.');
        }

        // Eğer form gönderilmediyse veya hatalıysa buraya düşer
        return redirect()->to('/duyuru_gonder')->with('error', 'Duyuru oluşturma sırasında bir hata oluştu.');
    }

  

    public function delete($id)
    {
        $duyuruModel = new DuyurularModel();
        $duyuruModel->delete($id);

        return redirect()->to('/duyuru_gonder')->with('success', 'Duyuru başarıyla silindi.');
    }
}
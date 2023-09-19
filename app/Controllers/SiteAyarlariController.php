<?php

namespace App\Controllers;

use App\Models\SiteAyarlariModel;
use CodeIgniter\Controller;

class SiteAyarlariController extends BaseController
{
    public function __construct()
    {
        $model = new SiteAyarlariModel();
        $this->data['website_ayarlari'] = $model->first();
    }

    public function index()
    {
        return view('dashboard/admin/site_ayarlari', $this->data);
    }

    public function update()
    {
        helper(['form']);

        $validationRules = [
            'site_basligi' => 'required|min_length[3]|max_length[255]',
            'site_aciklamasi' => 'required|min_length[10]',
            'email_adresi' => 'required|valid_email',
            'telefon_numarasi' => 'required|min_length[10]|max_length[15]',
            'ana_sayfa_mesaji' => 'required|min_length[10]',
            'sosyal_medya_linkleri' => 'required',
            'site_logo' => 'max_size[site_logo,1024]|ext_in[site_logo,png,jpg,jpeg]',
        ];

        if ($this->validate($validationRules)) {
            $siteAyarlariModel = new SiteAyarlariModel();

            // Dosya yükleme işlemi
            $site_logo = $this->request->getFile('site_logo');
            if ($site_logo->isValid() && !$site_logo->hasMoved()) {
                $originalName = $site_logo->getName(); 
                $site_logo->move(ROOTPATH . 'public/uploads', $originalName); 
                $site_logoPath = 'uploads/' . $originalName;
            } else {
                $site_logoPath = $this->request->getVar('site_logosu');
            }

            $data = [
                'site_basligi' => $this->request->getVar('site_basligi'),
                'site_aciklamasi' => $this->request->getVar('site_aciklamasi'),
                'email_adresi' => $this->request->getVar('email_adresi'),
                'telefon_numarasi' => $this->request->getVar('telefon_numarasi'),
                'ana_sayfa_mesaji' => $this->request->getVar('ana_sayfa_mesaji'),
                'sosyal_medya_linkleri' => $this->request->getVar('sosyal_medya_linkleri'),
                'site_logosu' => $site_logoPath,
            ];

            $siteAyarlariModel->update(1, $data);

            return redirect()->to('/site_ayarlari');
        } else {
            $validationErrors = $this->validator->getErrors();
            return redirect()->to('/site_ayarlari')->with('validationErrors', $validationErrors);
        }
    }
}

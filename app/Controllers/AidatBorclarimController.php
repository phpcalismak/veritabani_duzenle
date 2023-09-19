<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\AidatlarModel;

class AidatBorclarimController extends BaseController
{
    public function index()
    {
        $session = session();
        $daire_id = $session->get('daire_id');
        $aidatlarModel = new AidatlarModel();

        // Borçlu aidatlar
        $borcluAidatlar = $aidatlarModel->where('daire_id', $daire_id)
            ->where('odendi_mi', 0)
            ->findAll();

        // Ödenmiş aidatlar
        $odenmisAidatlar = $aidatlarModel->where('daire_id', $daire_id)
            ->where('odendi_mi', 1)
            ->findAll();

        $data = [
            'borcluAidatlar' => $borcluAidatlar,
            'odenmisAidatlar' => $odenmisAidatlar, // Ödenmiş aidatları veriye ekleyin
        ];
             $data['website_ayarlari'] = $this->data['website_ayarlari'];

        return view('dashboard/aidat_borclarim', $data);
    }

    public function odemeYap($aidat_id)
    {
        $aidatlarModel = new AidatlarModel();
        $aidatlarModel->update($aidat_id, ['odendi_mi' => 1]);

        return redirect()->to('/aidat_borclarim')->with('success', 'Aidat ödeme işlemi başarıyla tamamlandı.');
    }
}

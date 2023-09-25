<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\HesaplarModel;
use Config\Services;

class RegisterController extends BaseController
{
    public function index()
    {
        helper(['form']);
        $data = [];
        echo view('register', $data);
    }

    public function save()
    {
        helper(['form']);

        $rules = [
           
            'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[hesaplar.email]',
            'sifre' => 'required|min_length[6]|max_length[200]',
            'confpassword' => 'matches[sifre]'
        ];

        if ($this->validate($rules)) {
            $model = new HesaplarModel();
            $emailString = $this->request->getVar('email');
            $sifreString = $this->request->getVar('sifre');
            $aktivasyonKodu = str_pad(mt_rand(1, 999999), 6, '0', STR_PAD_LEFT);

            $data = [
                'email' => $emailString,
                'sifre' => password_hash($sifreString, PASSWORD_DEFAULT),
                'aktivasyon_kodu' => $aktivasyonKodu
            ];
            $model->save($data);

            $email = \Config\Services::email();
            $email->setFrom('aytuguzun4@gmail.com', 'Site Yönetimi');
            $email->setTo($emailString);
            $email->setSubject('Site Yönetimi Aktivasyonu');
            $message = '<h1>Aktivasyon kodunuz:' . $aktivasyonKodu . '</h1>';
            $email->setMessage($message);

            if ($email->send()) {
                return redirect()->to('/aktivasyon');
            } else {
                $data['error'] = 'E-posta gönderme hatası oluştu.';
                return view('register', $data);
            }
        } else {
            $data['validation'] = $this->validator;
            return view('register', $data);
        }
    }

    public function aktivasyon()
    {
        $data['website_ayarlari'] = $this->data['website_ayarlari'];
        return view('aktivasyon_form',$data);
    }

    public function kontrolAktivasyonKodu()
    {
        $aktivasyonKodu = $this->request->getPost('aktivasyon_kodu');

        $model = new HesaplarModel();
        $user = $model->where('aktivasyon_kodu', $aktivasyonKodu)->first();

        if ($user) {
            $createdAt = strtotime($user['created_at']);
            $currentTime = time();
            $activationTimeLimit = 60 * 2;

           try {
    $model->update($user['hesap_id'], ['hesap_onay' => 1]);
    return redirect()->to('/login');
} catch (\Exception $e) {
    // Log the error message for debugging purposes
    log_message('error', 'Database error: ' . $e->getMessage());
    // Handle the error gracefully, e.g., redirect with an error message
    return redirect()->to('/register')->with('error', 'Database error occurred');
}
        } else {
            return redirect()->to('/register');
        }
    }

   public function aktivasyonTekrarGonder($userEmail = null)
{
    if (empty($userEmail)) {
        // Hatalı veya eksik bir e-posta adresi gönderilmişse, uygun bir hata işleme stratejisi uygulayın
        return redirect()->to('/register');
    }   
    $session = session();

    $model = new HesaplarModel();
    $user = $model->where('email', $userEmail)->first();

    if ($user) {
        $aktivasyonKodu = str_pad(mt_rand(1, 999999), 6, '0', STR_PAD_LEFT);
        $model->update($user['hesap_id'], ['aktivasyon_kodu' => $aktivasyonKodu]);

        $email = \Config\Services::email();
        $email->setFrom('ci4aytug@gmail.com', 'Site Yönetimi');
        $email->setTo($userEmail);
        $email->setSubject('Site Yönetimi Aktivasyon Kodu');
        $message = '<h1>Yeni Aktivasyon Kodunuz: ' . $aktivasyonKodu . '</h1>';
        $email->setMessage($message);

        if ($email->send()) {
             $session->setFlashdata('msg', 'Aktivasyon kodunuz başarıyla email adresinize gönderildi.');
            return redirect()->to('/aktivasyon');
        } else {
            $data['error'] = 'E-posta gönderme hatası oluştu.';
            return view('aktivasyon_form', $data);
        }
    } else {
        // Kullanıcı bulunamazsa uygun bir hata işleme stratejisi uygulayın
        return redirect()->to('/register');
    }
}

}

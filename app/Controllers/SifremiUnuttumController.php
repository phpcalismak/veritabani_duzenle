<?php

namespace App\Controllers;

use App\Models\HesaplarModel;
use CodeIgniter\Controller;

class SifremiUnuttumController extends BaseController
{
    public function index()
    {
        $data['website_ayarlari'] = $this->data['website_ayarlari'];

        // Oturumu başlat
        $session = \Config\Services::session();

        if ($this->request->getMethod() === 'post') {
            $model = new HesaplarModel();
            $emailAddress = $this->request->getVar('email');
            $token = bin2hex(random_bytes(16));

            // Kullanıcıyı bulun
            $user = $model->where('email', $emailAddress)->first();

            if ($user) {
                // reset_token'i güncelleyin
                $user['reset_token'] = $token;

                if ($model->save($user)) {
                    // E-posta nesnesini oluşturun ve gönderin
                    $emailObject = \Config\Services::email();
                    $emailObject->setFrom('aytuguzun4@gmail.com', 'Site Yönetimi');
                    $emailObject->setTo($emailAddress);
                    $emailObject->setSubject('Şifre Sıfırlama');
                    $message = '<h1>Şifre sıfırlama linkiniz: ' . base_url('/yeni_sifre/' . $token) . '</h1>';
                    $emailObject->setMessage($message);

                    if ($emailObject->send()) {
                        // Oturum değişkenini ayarla
                        $session->set('reset_email_sent', true);
                        return view('sifremi_unuttum', $data + ['success' => 'Şifre sıfırlama bağlantısı e-posta ile gönderildi.']);
                    } else {
                        return view('sifremi_unuttum', $data + ['error' => 'E-posta gönderilemedi.']);
                    }
                } else {
                    return view('sifremi_unuttum', $data + ['error' => 'Şifre sıfırlama bağlantısı kaydedilemedi.']);
                }
            } else {
                return view('sifremi_unuttum', $data + ['error' => 'E-posta adresi bulunamadı.']);
            }
        }

        return view('sifremi_unuttum', $data);
    }

    public function yeni_sifre($token = null)
    {
        if ($token === null) {
            return view('sifremi_unuttum', ['error' => 'Geçersiz şifre sıfırlama bağlantısı.']);
        }

        $data['website_ayarlari'] = $this->data['website_ayarlari'];
        $data['token'] = $token; 

        // Oturumu başlat
        $session = \Config\Services::session();

        $model = new HesaplarModel();
        $user = $model->where('reset_token', $token)->first();

        if (!$user) {
            return view('sifremi_unuttum', $data);
        }

        if ($this->request->getMethod() === 'post') {
            $newPassword = $this->request->getVar('new_password');
            $confirmPassword = $this->request->getVar('confirm_password');

            if ($newPassword !== $confirmPassword) {
                return view('yeni_sifre', $data);
            }

            $user['password'] = password_hash($newPassword, PASSWORD_BCRYPT);
            $user['reset_token'] = null;
            if ($model->save($user)) {
                // Oturum değişkenini temizle
                $session->remove('reset_email_sent');
                return view('login', $data);
            } else {
                return view('yeni_sifre', $data);
            }
        }

        return view('yeni_sifre', $data);
    }
}

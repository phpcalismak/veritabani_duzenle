<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\HesaplarModel;

class LoginController extends BaseController
{
    public function index()
    {
        helper(['form']);
        $session = session();

        if ($session->get('logged_in')) {
            return;
        }
         $data['website_ayarlari'] = $this->data['website_ayarlari'];
        return view('login',$data);
    }

    public function auth()
{
    $session = session();

    if ($session->get('logged_in')) {
        return redirect()->to('anasayfa');
    }

    $model = new HesaplarModel();
    $email = $this->request->getVar('email');
    $password = $this->request->getVar('password');
     $rememberMe = $this->request->getVar('remember_me');
    $data = $model->where('email', $email)->first();

    if ($data) {
        if ($data['hesap_onay'] == 1) {
            $pass = $data['sifre'];
            if ($pass) {
                $ses_data = [
                    'hesap_id' => $data['hesap_id'],
                    'email' => $data['email'],
                    'daire_id' => $data['daire_id'],
                    'hesap_turu' => $data['hesap_turu'],
                    'logged_in' => TRUE,
                    'hesap_onay' => $data['hesap_onay'],
                    'aktivasyon_kodu' => $data['aktivasyon_kodu'],
                ];
                    if ($rememberMe) {
                        $session->set($ses_data, 604800); 
                    } else {
                        $session->set($ses_data);
                    }
                return redirect()->to('anasayfa');
            } else {
                $session->setFlashdata('msg', 'Wrong Password');
                return redirect()->to('/login');
            }
        } else {
            $activationLink = '<a href="' . base_url('register/aktivasyonTekrarGonder/' . $data['email']) . '">Aktivasyon Maili Tekrar Gönder</a>';
            $session->setFlashdata('msg', 'Hesabınızı onaylamadan giriş yapamazsınız. ' . $activationLink);
            return redirect()->to('/login');
        }

    } else {
        $session->setFlashdata('msg', 'Email not Found');
        return redirect()->to('/login');
    }
}

}

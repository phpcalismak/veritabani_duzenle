<?php 

namespace App\Controllers;

use CodeIgniter\Controller;

class LogoutController extends BaseController 
{
	public function index()
	{
		$session = session();
		$session->destroy();
		return redirect()->to('/login');
	}
}
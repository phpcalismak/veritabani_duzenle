<?php 

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\CrudTablesModel;

class CrudTablesController extends BaseController 
{
    public function index()
    {
        $model = new CrudTablesModel();
        $data['hesaplar'] = $model->orderBy('id', 'DESC')->findAll();
        return view('dashboard/ctc', $data);
    }
    public function store()
    {
        helper(['form', 'url']);
        $model = new CrudTablesModel();

        $data = [
            'ad_soyad' => $this->request->getVar('txtUserName'),
            'daire_no' => $this->request->getVar('txtPassword')
        ];
        $save = $model->insertData($data);
        if ($save) {
            $data = $model->where('id', $save)->first();
            echo json_encode(["status" => true, 'data' => $data]);
        } else {
            echo json_encode(["status" => false, 'data' => $data]);
        }
    }
     public function edit($id = null)
    {
        $model = new CrudTablesModel();
        $data = $model->where('id', $id)->first();

        if ($data) {
            echo json_encode(["status" => true, 'data' => $data]);
        } else {
            echo json_encode(["status" => false]);
        }
    }
     public function update()
    {
        helper(['form', 'url']);
        $model = new CrudTablesModel();
        $id = $this->request->getVar('hdnUserId');
        $data = [
            'ad_soyad' => $this->request->getVar('txtUserName'),
            'daire_no' => $this->request->getVar('txtPassword')
        ];
        $update = $model->update($id, $data);
        if ($update) {
            $data = $model->where('id', $id)->first();
            echo json_encode(["status" => true, 'data' => $data]);
        } else {
            echo json_encode(["status" => false, 'data' => $data]);
        }
    }
       
    public function delete($id = null)
    {
        $model = new CrudTablesModel();
        $delete = $model->where('id', $id)->delete();
        if ($delete) {
            echo json_encode(["status" => true]);
        } else {
            echo json_encode(["status" => false]);
        }
    }
    
}
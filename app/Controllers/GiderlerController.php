<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use PhpOffice\PhpSpreadsheet\IOFactory; // IOFactory sınıfını içe aktarıyoruz
use App\Models\GiderlerModel;
use App\Models\GiderKategorileriModel;

class GiderlerController extends BaseController
{
    public function index()
    {
        $giderlerModel = new GiderlerModel();
        $kategoriModel = new GiderKategorileriModel();
        $data['giderKategorileri'] = $kategoriModel->findAll();

        $giderler = $giderlerModel
            ->select('giderler.*, gider_kategorileri.kategori_adi')
            ->join('gider_kategorileri', 'gider_kategorileri.kategori_id = giderler.kategori_id', 'left')
            ->orderBy('gider_id', 'DESC')
            ->findAll();

        $data['giderler'] = $giderler;

        $data['website_ayarlari'] = $this->data['website_ayarlari'];

        return view('dashboard/admin/giderler', $data);
    }

    public function store()
    {
        helper(['form', 'url']);
        $model = new GiderlerModel();

        $aciklama = $this->request->getVar('txtAciklama');
        $toplam_odenecek = $this->request->getVar('txtToplamOdenecek');
        $son_odeme_tarihi = $this->request->getVar('txtSonOdemeTarihi');
        $kategori_id = $this->request->getVar('txtKategori');

        $kategoriModel = new GiderKategorileriModel();
        $kategoriData = $kategoriModel->where('kategori_id', $kategori_id)->first();

        $data = [
            'aciklama' => $aciklama,
            'toplam_odenecek' => $toplam_odenecek,
            'son_odeme_tarihi' => $son_odeme_tarihi,
            'kategori_id' => $kategori_id,
        ];

        $save = $model->insert($data);

        if ($save) {
            echo json_encode(["status" => true, 'data' => $data]);
        } else {
            echo json_encode(["status" => false, 'data' => $data]);
        }
    }

    public function edit($gider_id = null)
    {
        $model = new GiderlerModel();
        $data = $model->where('gider_id', $gider_id)->first();

        if ($data) {
            echo json_encode(["status" => true, 'data' => $data]);
        } else {
            echo json_encode(["status" => false]);
        }
    }

    public function update()
    {
        helper(['form', 'url']);
        $model = new GiderlerModel();
        $gider_id = $this->request->getVar('hdnUsergider_id');
        $data = [
            'aciklama' => $this->request->getVar('txtAciklama'),
            'toplam_odenecek' => $this->request->getVar('txtToplamOdenecek'),
            'son_odeme_tarihi' => $this->request->getVar('txtSonOdemeTarihi'),
            'kategori_id' => $this->request->getVar('txtKategori'),
        ];
        $update = $model->update($gider_id, $data);
        if ($update) {
            $data = $model->where('gider_id', $gider_id)->first();
            echo json_encode(["status" => true, 'data' => $data]);
        } else {
            echo json_encode(["status" => false, 'data' => $data]);
        }
    }

    public function delete($gider_id = null)
    {
        $model = new GiderlerModel();
        $delete = $model->where('gider_id', $gider_id)->delete();
        if ($delete) {
            echo json_encode(["status" => true]);
        } else {
            echo json_encode(["status" => false]);
        }
    }

    public function kategoriEkle()
    {
        if ($this->request->getMethod() === 'post') {
            $kategoriModel = new GiderKategorileriModel();

            $kategoriData = [
                'kategori_adi' => $this->request->getVar('txtKategori'),
            ];

            $saved = $kategoriModel->insert($kategoriData);

            if ($saved) {
                return redirect()->to('/giderler')->with('success', 'Kategori başarıyla eklendi');
            } else {
                return redirect()->to('/giderler')->with('error', 'Kategori eklenirken bir hata oluştu');
            }
        }
    }

    public function giderKategoriSil($kategori_id = null)
    {
        $model = new GiderKategorileriModel();
        $delete = $model->where('kategori_id', $kategori_id)->delete();
        if ($delete) {
            echo json_encode(['status' => true]);
        } else {
            echo json_encode(['status' => false]);
        }
    }

    public function excelForm()
    {
        $data['website_ayarlari'] = $this->data['website_ayarlari'];
        return view('excel_form', $data);
    }
    public function download_template_excel()
    {
        $file = WRITEPATH. 'uploads/giderler_template_excel.xlsx';
        return $this->response->download($file,null)->setFileName('giderler_template_excel.xlsx');
        return redirect->to('excel_form');
    }
    public function excelUpload()
    {
        $file = $this->request->getFile('excel_file');

        if ($file->isValid() && $file->getExtension() == 'xlsx') {
            $spreadsheet = IOFactory::load($file->getTempName());
            $sheet = $spreadsheet->getActiveSheet();

            $data = $sheet->toArray();

            $data = array_slice($data, 3);

            $giderlerModel = new GiderlerModel();
            $insertedRows = 0;

            foreach ($data as $row) {
                if (empty(array_filter($row))) {
                    continue;
                }

                $existingData = $giderlerModel
                    ->where('aciklama', $row[0])
                    ->where('toplam_odenecek', $row[1])
                    ->where('son_odeme_tarihi', $row[2])
                    ->where('kategori_id', $row[3])
                    ->first();

                if (!$existingData) {
                    $insertData = [
                        'aciklama' => $row[0],
                        'toplam_odenecek' => $row[1],
                        'son_odeme_tarihi' => $row[2],
                        'kategori_id' => $row[3],
                    ];

                    $giderlerModel->insert($insertData);

                    $insertedRows++;
                }
            }

            return redirect()->to('/excelForm')->with('success', $insertedRows . ' satır Excel verileri başarıyla veritabanına eklendi.');
        } else {
            return redirect()->to('/excelForm')->with('error', 'Geçersiz Excel dosyası.');
        }
    }
}

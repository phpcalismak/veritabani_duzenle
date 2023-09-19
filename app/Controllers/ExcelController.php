<?php 

namespace App\Controllers;

use CodeIgniter\Controller;
use PhpOffice\PhpSpreadsheet\IOFactory;
use App\Models\ExcelModel;

class ExcelController extends BaseController
{
     public function index()
    {
        $data['website_ayarlari'] = $this->data['website_ayarlari'];
        return view('excel_form',$data);
    }

    public function upload()
    {
        // Excel dosyasını yükleme işlemi
        $file = $this->request->getFile('excel_file');

        if ($file->isValid() && $file->getExtension() == 'xlsx') {
            // Excel dosyasını okuma
            $spreadsheet = IOFactory::load($file->getTempName());
            $sheet = $spreadsheet->getActiveSheet();

            // Excel dosyasının satırlarını okuma
            $data = $sheet->toArray();

            // İlk 3 satırı atla
            $data = array_slice($data, 3);

            // Verileri veritabanına eklemek için Model'i çağırın
            $verilerModel = new ExcelModel();
            $insertedRows = 0;

            foreach ($data as $row) {
                // Boş satırları atla
                if (empty(array_filter($row))) {
                    continue;
                }

                // Veritabanında aynı verinin olup olmadığını kontrol et
                $existingData = $verilerModel->where('blok_adi', $row[0])
                                              ->where('daire_no', $row[1])
                                              ->first();

                if (!$existingData) {
                    // Veri veritabanında yoksa ekle
                    $verilerModel->insert([
                        'blok_adi' => $row[0],
                        'daire_no' => $row[1],
                        'daire_tipi' => $row[2],
                        'ev_sahibi_id' => $row[3],
                        'kiraci_id' => $row[4],
                        'kasa' => $row[5],
                    ]);

                    $insertedRows++;
                }
            }

            // Başarı mesajı gönderme
            return redirect()->to('/excel')->with('success', $insertedRows . ' satır Excel verileri başarıyla veritabanına eklendi.');
        } else {
            // Hata mesajı gönderme
            return redirect()->to('/excel')->with('error', 'Geçersiz Excel dosyası.');
        }
    }
}

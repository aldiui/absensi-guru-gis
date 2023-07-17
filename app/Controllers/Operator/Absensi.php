<?php

namespace App\Controllers\Operator;

use App\Controllers\BaseController;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class Absensi extends BaseController
{
    public function index()
    {
        $data['title'] = 'Absensi';
        $data['user'] = $this->KaryawanModel->getUserAndJabatan(session()->get('id'));
        $data['bulan'] = [
            [ "no" => 1, "nama" => "Januari"],
            [ "no" => 2, "nama" => "Februari"],
            [ "no" => 3, "nama" => "Maret"],
            [ "no" => 4, "nama" => "April"],
            [ "no" => 5, "nama" => "Mei"],
            [ "no" => 6, "nama" => "Juni"],
            [ "no" => 7, "nama" => "Juli"],
            [ "no" => 8, "nama" => "Agustus"],
            [ "no" => 9, "nama" => "September"],
            [ "no" => 10, "nama" => "Oktober"],
            [ "no" => 11, "nama" => "November"],
            [ "no" => 12, "nama" => "Desember"],
        ];
        $data['absensi'] = 'Belum';
        $data['tahun'] = [date("Y"), date("Y")-1, date("Y")-2, date("Y")-3, date("Y")-4];
        $data['guru'] = $this->KaryawanModel->getUserWithGuru();
        $data['setting'] = $this->PengaturanModel->find(1);
        return view('operator/absensi/read', $data);
    }

    public function cari()
    {
        $validate = $this->validate([
            'bulan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Bulan harus di isi!',
                ],
            ],
            'tahun' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tahun harus di isi!',
                ],
            ],
            'guru' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Guru harus di isi!',
                ],
            ],
        ]);
        if (!$validate) {
            return redirect()->to(base_url('/operator/absensi'))->withInput();
        }
        $bulan = $this->request->getPost('bulan');
        $tahun = $this->request->getPost('tahun');
        $guru = $this->request->getPost('guru');
        $data['title'] = 'Absensi';
        $data['user'] = $this->KaryawanModel->getUserAndJabatan(session()->get('id'));
        $data['bulan'] = [
            [ "no" => 1, "nama" => "Januari"],
            [ "no" => 2, "nama" => "Februari"],
            [ "no" => 3, "nama" => "Maret"],
            [ "no" => 4, "nama" => "April"],
            [ "no" => 5, "nama" => "Mei"],
            [ "no" => 6, "nama" => "Juni"],
            [ "no" => 7, "nama" => "Juli"],
            [ "no" => 8, "nama" => "Agustus"],
            [ "no" => 9, "nama" => "September"],
            [ "no" => 10, "nama" => "Oktober"],
            [ "no" => 11, "nama" => "November"],
            [ "no" => 12, "nama" => "Desember"],
        ];
        $data['tahun'] = [ date("Y"), date("Y")-1, date("Y")-2, date("Y")-3, date("Y")-4];
        $data['guru'] = $this->KaryawanModel->getUserWithGuru();
        $data['user_guru'] = $this->KaryawanModel->getUserAndJabatan($guru);
        $data['absensi'] = $this->KaryawanModel->getAbsensi($bulan, $tahun, $guru);
        $data['bulan1'] = $bulan;
        $data['tahun1'] = $tahun;
        $data['setting'] = $this->PengaturanModel->find(1);
        return view('operator/absensi/read', $data);
    }

    public function cetak($bulan, $tahun, $id)
    {
        $data['user_guru'] = $this->KaryawanModel->getUserAndJabatan($id);
        $data['title'] = 'Laporan Absensi '.$data['user_guru']['name'].' '.tanggalindo(date($tahun.'-'.$bulan.'-'));
        $data['user'] = $this->KaryawanModel->getUserAndJabatan(session()->get('id'));
        $data['setting'] = $this->PengaturanModel->find(1);
        $data['bulan'] = $bulan;
        $data['tahun'] = $tahun;
        return view('operator/absensi/cetak', $data);
    }

    public function pdf($bulan, $tahun, $id)
    {
        $data['user_guru'] = $this->KaryawanModel->getUserAndJabatan($id);
        $filename = 'Laporan Absensi '.$data['user_guru']['name'].' '.tanggalindo(date($tahun.'-'.$bulan.'-'));
        $data['absensi'] = $this->KaryawanModel->getAbsensi($bulan, $tahun, $id);
        $data['setting'] = $this->PengaturanModel->find(1);
        $data['bulan'] = $bulan;
        $data['tahun'] = $tahun;
        $this->Dompdf->loadHtml(view('operator/cetak/presensi', $data));
        $this->Dompdf->setPaper('A4', 'landscape');
        $this->Dompdf->render();
        $this->Dompdf->stream($filename, ['Attachment' => false]);
    }


    public function rekap()
    {
        $data['title'] = 'Rekap Absensi';
        $data['user'] = $this->KaryawanModel->getUserAndJabatan(session()->get('id'));
        $data['bulan'] = [
            [ "no" => 1, "nama" => "Januari"],
            [ "no" => 2, "nama" => "Februari"],
            [ "no" => 3, "nama" => "Maret"],
            [ "no" => 4, "nama" => "April"],
            [ "no" => 5, "nama" => "Mei"],
            [ "no" => 6, "nama" => "Juni"],
            [ "no" => 7, "nama" => "Juli"],
            [ "no" => 8, "nama" => "Agustus"],
            [ "no" => 9, "nama" => "September"],
            [ "no" => 10, "nama" => "Oktober"],
            [ "no" => 11, "nama" => "November"],
            [ "no" => 12, "nama" => "Desember"],
        ];
        $data['tahun'] = [ date("Y"), date("Y")-1, date("Y")-2, date("Y")-3, date("Y")-4];
        $bulan1 = date("m");
        $tahun1 = date("Y");
        $data['days'] = cal_days_in_month(CAL_GREGORIAN, $bulan1, $tahun1);
        $data['bulan1'] = $bulan1;
        $data['tahun1'] = $tahun1;
        $data['guru'] = $this->KaryawanModel->getUserWithGuru();
        $data['setting'] = $this->PengaturanModel->find(1);
        $data['getabsensi'] = $this->KaryawanModel;
        $data['getabsensi2'] = $this->AbsensiModel;
        $data['getizin'] = $this->UnableModel;
        return view('operator/rekap/read', $data);
    }

    public function carirekap()
    {
        $validate = $this->validate([
            'bulan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Bulan harus di isi!',
                ],
            ],
            'tahun' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tahun harus di isi!',
                ],
            ],
        ]);
        if (!$validate) {
            return redirect()->to(base_url('/operator/rekap'))->withInput();
        }
        $bulan1 = $this->request->getPost('bulan');
        $tahun1 = $this->request->getPost('tahun');
        $data['title'] = 'Rekap Absensi';
        $data['user'] = $this->KaryawanModel->getUserAndJabatan(session()->get('id'));
        $data['bulan'] = [
            [ "no" => 1, "nama" => "Januari"],
            [ "no" => 2, "nama" => "Februari"],
            [ "no" => 3, "nama" => "Maret"],
            [ "no" => 4, "nama" => "April"],
            [ "no" => 5, "nama" => "Mei"],
            [ "no" => 6, "nama" => "Juni"],
            [ "no" => 7, "nama" => "Juli"],
            [ "no" => 8, "nama" => "Agustus"],
            [ "no" => 9, "nama" => "September"],
            [ "no" => 10, "nama" => "Oktober"],
            [ "no" => 11, "nama" => "November"],
            [ "no" => 12, "nama" => "Desember"],
        ];
        $data['tahun'] = [ date("Y"), date("Y")-1, date("Y")-2, date("Y")-3, date("Y")-4];
        $data['days'] = cal_days_in_month(CAL_GREGORIAN, $bulan1, $tahun1);
        $data['bulan1'] = $bulan1;
        $data['tahun1'] = $tahun1;
        $data['guru'] = $this->KaryawanModel->getUserWithGuru();
        $data['setting'] = $this->PengaturanModel->find(1);
        $data['getabsensi'] = $this->KaryawanModel;
        $data['getabsensi2'] = $this->AbsensiModel;
        $data['getizin'] = $this->UnableModel;
        return view('operator/rekap/read', $data);
    }

    public function cetakrekap($bulan, $tahun)
    {
        $data['title'] = 'Laporan Rekap Absensi '.tanggalindo(date($tahun.'-'.$bulan.'-'));
        $data['user'] = $this->KaryawanModel->getUserAndJabatan(session()->get('id'));
        $data['setting'] = $this->PengaturanModel->find(1);
        $data['bulan'] = $bulan;
        $data['tahun'] = $tahun;
        $data['excel_url'] = base_url('assets/usermeal.xlsx');
        return view('operator/rekap/cetak', $data);
    }

    public function rekappdf($bulan, $tahun)
    {
        $filename = 'Laporan Rekap Absensi '.tanggalindo(date($tahun.'-'.$bulan.'-'));
        $data['setting'] = $this->PengaturanModel->find(1);
        $data['guru'] = $this->KaryawanModel->getUserWithGuru();
        $data['getabsensi'] = $this->KaryawanModel;
        $data['getabsensi2'] = $this->AbsensiModel;
        $data['getizin'] = $this->UnableModel;
        $data['bulan'] = $bulan;
        $data['tahun'] = $tahun;
        $data['days'] = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);
        $this->Dompdf->loadHtml(view('operator/cetak/rekap', $data));
        $this->Dompdf->setPaper('F4', 'landscape');
        $this->Dompdf->render();
        $this->Dompdf->stream($filename, ['Attachment' => false]);
    }

    public function monitoring()
    {
        $data['title'] = 'Monitoring';
        $data['user'] = $this->KaryawanModel->getUserAndJabatan(session()->get('id'));
        $tanggal = date('Y-m-d');
        $data['tanggal'] = $tanggal;
        $data['monitoring'] = $this->KaryawanModel->getUserWithGuruAndAbsensi($tanggal);
        $data['setting'] = $this->PengaturanModel->find(1);
        return view('operator/monitoring/read', $data);
    }

    public function carimonitoring()
    {
        $validate = $this->validate([
            'tanggal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal harus di isi!',
                ],
            ],
        ]);
        if (!$validate) {
            return redirect()->to(base_url('/operator/monitoring'))->withInput();
        }
        $data['title'] = 'Monitoring';
        $data['user'] = $this->KaryawanModel->getUserAndJabatan(session()->get('id'));
        $tanggal = $this->request->getPost('tanggal');
        $data['tanggal'] = $tanggal;
        $data['monitoring'] = $this->KaryawanModel->getUserWithGuruAndAbsensi($tanggal);
        $data['setting'] = $this->PengaturanModel->find(1);
        return view('operator/monitoring/read', $data);
    }

    public function Izin()
    {
        $data['title'] = 'Izin atau Sakit';
        $data['user'] = $this->KaryawanModel->getUserAndJabatan(session()->get('id'));
        $data['bulan'] = [
            [ "no" => 1, "nama" => "Januari"],
            [ "no" => 2, "nama" => "Februari"],
            [ "no" => 3, "nama" => "Maret"],
            [ "no" => 4, "nama" => "April"],
            [ "no" => 5, "nama" => "Mei"],
            [ "no" => 6, "nama" => "Juni"],
            [ "no" => 7, "nama" => "Juli"],
            [ "no" => 8, "nama" => "Agustus"],
            [ "no" => 9, "nama" => "September"],
            [ "no" => 10, "nama" => "Oktober"],
            [ "no" => 11, "nama" => "November"],
            [ "no" => 12, "nama" => "Desember"],
        ];
        $data['tahun'] = [ date("Y"), date("Y")-1, date("Y")-2, date("Y")-3, date("Y")-4];
        $bulan1 = date("m");
        $tahun1 = date("Y");
        $data['bulan1'] = $bulan1;
        $data['tahun1'] = $tahun1;
        $data['guru'] = $this->KaryawanModel->getUserWithGuru();
        $data['setting'] = $this->PengaturanModel->find(1);
        $data['izin'] = $this->KaryawanModel->getIzin($bulan1, $tahun1);
        return view('operator/izin/read', $data);
    }

    public function updateizin($id)
    {
        $validate = $this->validate([
            'persetujuan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Persetujuan harus di isi!',
                ],
            ],
        ]);

        if (!$validate) {
            return redirect()->to(base_url('/operator/izin/'))->withInput();
        }

        $this->UnableModel->update($id, [
            'persetujuan' => $this->request->getPost('persetujuan'),
            'admin_id' => session()->get('id'),
        ]);
        session()->setFlashdata('pesan', 'Data Permohonan Izin atau Sakit berhasil diupdate.');
        return redirect()->to(base_url('/operator/izin'));
    }

    public function cariizin()
    {
        $validate = $this->validate([
            'bulan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Bulan harus di isi!',
                ],
            ],
            'tahun' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tahun harus di isi!',
                ],
            ],
        ]);
        if (!$validate) {
            return redirect()->to(base_url('/operator/izin'))->withInput();
        }
        $bulan1 = $this->request->getPost('bulan');
        $tahun1 = $this->request->getPost('tahun');
        $data['title'] = 'Izin';
        $data['user'] = $this->KaryawanModel->getUserAndJabatan(session()->get('id'));
        $data['bulan'] = [
            [ "no" => 1, "nama" => "Januari"],
            [ "no" => 2, "nama" => "Februari"],
            [ "no" => 3, "nama" => "Maret"],
            [ "no" => 4, "nama" => "April"],
            [ "no" => 5, "nama" => "Mei"],
            [ "no" => 6, "nama" => "Juni"],
            [ "no" => 7, "nama" => "Juli"],
            [ "no" => 8, "nama" => "Agustus"],
            [ "no" => 9, "nama" => "September"],
            [ "no" => 10, "nama" => "Oktober"],
            [ "no" => 11, "nama" => "November"],
            [ "no" => 12, "nama" => "Desember"],
        ];
        $data['tahun'] = [ date("Y"), date("Y")-1, date("Y")-2, date("Y")-3, date("Y")-4];
        $data['bulan1'] = $bulan1;
        $data['tahun1'] = $tahun1;
        $data['guru'] = $this->KaryawanModel->getUserWithGuru();
        $data['setting'] = $this->PengaturanModel->find(1);
        $data['izin'] = $this->KaryawanModel->getIzin($bulan1, $tahun1);
        return view('operator/izin/read', $data);
    }

    public function excel($bulan, $tahun, $id)
    {
        $userGuru = $this->KaryawanModel->getUserAndJabatan($id);
        $filename = 'Laporan Absensi ' . $userGuru['name'] . ' ' . tanggalindo(date($tahun . '-' . $bulan . '-'));
        $absensi = $this->KaryawanModel->getAbsensi($bulan, $tahun, $id);
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Tanggal');
        $sheet->setCellValue('C1', 'Jam Masuk');
        $sheet->setCellValue('D1', 'Jam Keluar');
        $sheet->setCellValue('E1', 'Keterangan');

        $row = 2;
        $no = 1;
        foreach ($absensi as $a) {
            $sheet->setCellValue('A' . $row, $no++);
            $sheet->setCellValue('B' . $row, tanggalindo($a['date']));
            $sheet->setCellValue('C' . $row, empty($a['image_in']) ? 'Belum Absen' : $a['hour_in']);
            $sheet->setCellValue('D' . $row, empty($a['image_out']) ? 'Belum Absen' : $a['hour_out']);
            $sheet->setCellValue('E' . $row, empty($a['hour_in'] <= $a['jam_masuk']) ? 'Terlambat ' . jam_terlambat($a['jam_masuk'], $a['hour_in']) : 'Tepat Waktu');
            $sheet->getStyle('A' . $row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle('A' . $row)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $row++;
        }

        $columnWidths = [5, 20, 15, 15, 30];
        foreach ($columnWidths as $key => $width) {
            $column = chr(65 + $key); // A, B, C, ...
            $sheet->getColumnDimension($column)->setWidth($width);
            $sheet->getStyle($column . '1')->getFont()->setBold(true);
            $sheet->getStyle($column . '1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle($column . '1')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $sheet->getStyle($column . '1')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
        }

        $sheet->getStyle('A1:B1')->getAlignment()->setWrapText(true);
        $sheet->getStyle('A1:B1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('A1:B1')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        $sheet->getStyle('A2:E' . ($row - 1))->getAlignment()->setWrapText(true);
        $sheet->getStyle('A2:E' . ($row - 1))->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
        $sheet->getStyle('A2:A' . ($row - 1))->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('A2:A' . ($row - 1))->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);

        ob_end_clean();
        ob_start();

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $filename . '.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit();
    }

    public function rekapexcel($bulan, $tahun)
    {
        $filename = 'Laporan Rekap Absensi ' . tanggalindo(date($tahun . '-' . $bulan . '-'));
        $guru = $this->KaryawanModel->getUserWithGuru();
        $days = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Nama');

        for ($i = 1; $i <= $days; $i++) {
            $column = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($i + 2);
            $sheet->setCellValueByColumnAndRow($i + 2, 1, $i);
            $sheet->getStyleByColumnAndRow($i + 2, 1)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $sheet->getStyleByColumnAndRow($i + 2, 1)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $sheet->getStyle($column . '1')->getFont()->setBold(true);
            $sheet->getStyle($column . '1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle($column . '1')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $sheet->getStyle($column . '1')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
        }

        $row = 2;
        $no = 1;
        foreach ($guru as $a) {
            $sheet->setCellValue('A' . $row, $no++);
            $sheet->setCellValue('B' . $row, $a['name']);

            for ($i = 1; $i <= $days; $i++) {
                $cek = $this->KaryawanModel->getAbsensiByDate(date($tahun . '-' . $bulan . '-' . $i), $a['id']);

                if ($cek) {
                    $sheet->setCellValueByColumnAndRow($i + 2, $row, 'V');
                    $sheet->getStyleByColumnAndRow($i + 2, $row)->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_GREEN);
                } else {
                    $sheet->setCellValueByColumnAndRow($i + 2, $row, 'X');
                    $sheet->getStyleByColumnAndRow($i + 2, $row)->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_RED);
                }

                $sheet->getStyleByColumnAndRow($i + 2, $row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $sheet->getStyleByColumnAndRow($i + 2, $row)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                $sheet->getStyleByColumnAndRow($i + 2, $row)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            }

            $sheet->getStyle('A' . $row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle('A' . $row)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $sheet->getStyle('A' . $row)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

            $row++;
        }

        $columnWidths = [5, 30];
        for ($i = 1; $i <= $days; $i++) {
            $columnWidths[] = 5;
        }
        $columnIndex = 1;
        foreach ($columnWidths as $width) {
            $column = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($columnIndex);
            $sheet->getColumnDimension($column)->setWidth($width);
            $sheet->getStyle($column . '1')->getFont()->setBold(true);
            $sheet->getStyle($column . '1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle($column . '1')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $sheet->getStyle($column . '1')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $columnIndex++;
        }

        $sheet->getStyle('A1:B1')->getAlignment()->setWrapText(true);
        $sheet->getStyle('A1:B1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('A1:B1')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        $sheet->getStyle('A2:B' . ($row - 1))->getAlignment()->setWrapText(true);
        $sheet->getStyle('A2:B' . ($row - 1))->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
        $sheet->getStyle('A2:A' . ($row - 1))->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('A2:A' . ($row - 1))->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);

        ob_end_clean();
        ob_start();

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $filename . '.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit();
    }
}
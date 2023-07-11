<?php

namespace App\Controllers\Operator;

use App\Controllers\BaseController;

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
}
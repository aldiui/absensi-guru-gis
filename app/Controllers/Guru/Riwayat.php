<?php

namespace App\Controllers\Guru;

use App\Controllers\BaseController;

class Riwayat extends BaseController
{
    public function index()
    {
        $data['title'] = 'Riwayat Absensi';
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
        $data['cariabsen'] = "belum";
        $data['cariabsen2'] = $this->AbsensiModel->getAbsensiBulan();
        $data['bulan1'] = date('m');
        $data['tahun1'] = date('Y');
        $data['setting'] = $this->PengaturanModel->find(1);
        return view('guru/riwayat/read', $data);
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
        ]);
        if (!$validate) {
            return redirect()->to(base_url('/riwayat'))->withInput();
        }
        $bulan = $this->request->getPost('bulan');
        $tahun = $this->request->getPost('tahun');
        $data['title'] = 'Riwayat Absensi';
        $data['user'] = $this->KaryawanModel->getUserAndJabatan(session()->get('id'));
        $data["bulan"] = [
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
        $data["tahun"] = [ date("Y"), date("Y")-1, date("Y")-2, date("Y")-3, date("Y")-4];
        $data['cariabsen'] = $this->AbsensiModel->getAbsensiBulan($bulan, $tahun);
        $data['bulan1'] = $bulan;
        $data['tahun1'] = $tahun;
        $data['setting'] = $this->PengaturanModel->find(1);
        return view('guru/riwayat/read', $data);
    }
}
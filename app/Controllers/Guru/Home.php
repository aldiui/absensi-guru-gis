<?php

namespace App\Controllers\Guru;

use App\Controllers\BaseController;

class Home extends BaseController
{    
    public function index()
    {
        $data['title'] = 'Home';
        $bulan = date("m");
        $tahun = date("Y");
        $data['user'] = $this->KaryawanModel->getUserAndJabatan(session()->get('id'));
        $data['absensi'] = $this->AbsensiModel->getAbsensi();
        $data['absensi_bulan'] = $this->AbsensiModel->getAbsensiBulan();
        $data['hadir'] = $this->AbsensiModel->getHadir(session()->get('id'), $bulan, $tahun);
        $data['izin'] = $this->UnableModel->getUnable(session()->get('id'), "Izin",  $bulan, $tahun);
        $data['sakit'] = $this->UnableModel->getUnable(session()->get('id'), "Sakit",  $bulan, $tahun);
        $data['terlambat'] = $this->KaryawanModel->hitungKeterlambatan(session()->get('id'), $bulan, $tahun);
        $data['setting'] = $this->PengaturanModel->find(1);
        return view('guru/home/read', $data);
    }
}
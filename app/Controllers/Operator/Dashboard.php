<?php

namespace App\Controllers\Operator;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->KaryawanModel->getUserAndJabatan(session()->get('id'));
        $data['jabatan'] = $this->JabatanModel->countAllResults();
        $data['gty'] = $this->KaryawanModel->where('jabatan_id', 1)->countAllResults();
        $data['gtty'] = $this->KaryawanModel->where('jabatan_id', 2)->countAllResults();
        $data['operator'] = $this->KaryawanModel->where('jabatan_id', 3)->countAllResults();
        $data['setting'] = $this->PengaturanModel->find(1);
        $data['penggajian'] = $this->PenggajianModel;
        return view('operator/dashboard/read', $data);
    }
}
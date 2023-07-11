<?php

namespace App\Controllers\Operator;

use App\Controllers\BaseController;

class Jabatan extends BaseController
{   
    public function index()
    {
        $data['title'] = 'Jabatan';
        $data['jabatan'] = $this->JabatanModel->findAll();
        $data['user'] = $this->KaryawanModel->getUserAndJabatan(session()->get('id'));
        $data['setting'] = $this->PengaturanModel->find(1);
        return view('operator/jabatan/read', $data);
    }

    public function save()
    {
        $validate = $this->validate([
            'jabatan' => [
                'rules' => 'required|is_unique[jabatan.name_jabatan]',
                'errors' => [
                    'required' => 'Jabatan harus di isi!',
                    'is_unique' => 'Jabatan sudah ada, silakan masukkan nama jabatan yang berbeda!',
                ],
            ],
            'singkatan' => [
                'rules' => 'required|is_unique[jabatan.akronim]',
                'errors' => [
                    'required' => 'Singkatan harus di isi!',
                    'is_unique' => 'Singkatan sudah ada, silakan masukkan nama singkatan yang berbeda!',
                ],
            ],
        ]);
            
        if (!$validate) {
            return redirect()->to(base_url('/operator/jabatan'))->withInput();
        }
        $this->JabatanModel->insert([
            'akronim' =>  $this->request->getPost('singkatan'),
            'name_jabatan' =>  $this->request->getPost('jabatan'),
        ]);
        session()->setFlashdata('pesan', 'Data Jabatan berhasil ditambahkan.');
        return redirect()->to(base_url('/operator/jabatan'));
    }

    public function delete($id)
    {
        $this->JabatanModel->delete($id);
        session()->setFlashdata('pesan', 'Data Jabatan berhasil dihapus.');
        return redirect()->to(base_url('/operator/jabatan'));
    }

    public function update($id)
    {
        $validate = $this->validate([
            'jabatan1' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jabatan harus di isi!',
                ],
            ],
            'singkatan1' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Singkatan harus di isi!',
                ],
            ],
        ]);
        if (!$validate) {
            return redirect()->to(base_url('/operator/jabatan'))->withInput();
        }
        
        $this->JabatanModel->update($id,[
            'akronim' =>  $this->request->getPost('singkatan1'),
            'name_jabatan' => $this->request->getPost('jabatan1'),
        ]);

        session()->setFlashdata('pesan', 'Data Jabatan berhasil diubah.');
        return redirect()->to(base_url('/operator/jabatan'));
    }
}
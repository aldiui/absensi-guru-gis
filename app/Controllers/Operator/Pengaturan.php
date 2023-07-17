<?php

namespace App\Controllers\Operator;

use App\Controllers\BaseController;

class Pengaturan extends BaseController
{
    public function index()
    {
        $data['title'] = 'Pengaturan';
        $data['user'] = $this->KaryawanModel->getUserAndJabatan(session()->get('id'));
        $data['setting'] = $this->PengaturanModel->find(1);
        return view('operator/pengaturan/read', $data);
    }

    public function update()
    {
        $validate = $this->validate([
            'name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama harus di isi!',
                ],
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat harus di isi!',
                ],
            ],
            'long' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Longtitude harus di isi!',
                ],
            ],
            'lat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Latitude harus di isi!',
                ],
            ],
            'radius' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Radius harus di isi!',
                ],
            ],
            'sebelum_masuk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Sebelum Masuk harus di isi!',
                ],
            ],
            'sebelum_pulang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Sebelum Pulang harus di isi!',
                ],
            ],
            'setelah_pulang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Setelah Pulang harus di isi!',
                ],
            ],
            'aplikasi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Aplikasi harus di isi!',
                ],
            ],
            'name_ttd' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Tanda Tangan harus di isi!',
                ],
            ],
            'jabatan_ttd' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jabatan Tanda Tangan harus di isi!',
                ],
            ],
            'path' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Lokasi Penyimpanan Gambar Base64 harus di isi!',
                ],
            ],
            'gaji' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Gaji / Jam Pelajaran Tangan harus di isi!',
                ],
            ],
        ]);
        if (!$validate) {
            return redirect()->to(base_url('/operator/pengaturan'))->withInput();
        }

        $data = [
            'name_kantor' =>  $this->request->getPost('name'),
            'name_aplikasi' =>  $this->request->getPost('aplikasi'),
            'address' =>  $this->request->getPost('alamat'),
            'long' =>  $this->request->getPost('long'),
            'lat' =>  $this->request->getPost('lat'),
            'radius' =>  $this->request->getPost('radius'),
            'sebelum_masuk' =>  $this->request->getPost('sebelum_masuk'),
            'sebelum_pulang' =>  $this->request->getPost('sebelum_pulang'),
            'setelah_pulang' =>  $this->request->getPost('setelah_pulang'),
            'name_ttd' =>  $this->request->getPost('name_ttd'),
            'jabatan_ttd' =>  $this->request->getPost('jabatan_ttd'),
            'path' =>  $this->request->getPost('path'),
            'gaji' =>  $this->request->getPost('gaji'),
        ];

        $setting = $this->PengaturanModel->find(1);
        $image = $this->request->getFile('logo_kantor');
        if ($image->isValid() && !$image->hasMoved()) {
            $oldImage = $setting['logo_kantor'];
            $newImageName = $image->getRandomName();
            $image->move('assets/img/', $newImageName);
            $data['logo_kantor'] = $newImageName;
            if ($oldImage && file_exists('assets/img/'.$oldImage)) {
                unlink('assets/img/'.$oldImage);
            }
        }
        $image_ttd = $this->request->getFile('image_ttd');
        if ($image_ttd->isValid() && !$image_ttd->hasMoved()) {
            $oldImage_ttd = $setting['image_ttd'];
            $newImage_ttdName = $image_ttd->getRandomName();
            $image_ttd->move('assets/img/', $newImage_ttdName);
            $data['image_ttd'] = $newImage_ttdName;
            if ($oldImage_ttd && file_exists('assets/img/'.$oldImage_ttd)) {
                unlink('assets/img/'.$oldImage_ttd);
            }
        }
        $this->PengaturanModel->update(1, $data);
        session()->setFlashdata('pesan', 'Data Pengaturan berhasil di ubah');
        return redirect()->to(base_url('/operator/pengaturan'));
    }
}
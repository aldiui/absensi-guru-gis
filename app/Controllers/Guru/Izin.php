<?php

namespace App\Controllers\Guru;

use App\Controllers\BaseController;

class Izin extends BaseController
{
    public function index()
    {
        $data['title'] = 'Izin atau Sakit';
        $data['user'] = $this->KaryawanModel->getUserAndJabatan(session()->get('id'));
        $data['unable'] = $this->UnableModel->getUnableBulan();
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
        $data['cariizin'] = "belum";
        $data['cariizin2'] = $this->UnableModel->getUnableBulan();
        $data['bulan1'] = date('m');
        $data['tahun1'] = date('Y');
        $data['setting'] = $this->PengaturanModel->find(1);
        return view('guru/izin/read', $data);
    }

    public function create()
    {
        $data['title'] = 'Izin atau Sakit';
        $data['user'] = $this->KaryawanModel->getUserAndJabatan(session()->get('id'));
        $data['status'] = ['Izin', 'Sakit'];
        $data['setting'] = $this->PengaturanModel->find(1);
        return view('guru/izin/create', $data);
    }
    
    public function edit($id)
    {
        $data['title'] = 'Izin atau Sakit';
        $data['user'] = $this->KaryawanModel->getUserAndJabatan(session()->get('id'));
        $data['status'] = ['Izin', 'Sakit'];
        $data['setting'] = $this->PengaturanModel->find(1);
        $data['izin'] = $this->UnableModel->find($id);
        return view('guru/izin/edit', $data);
    }
    
    public function update($id)
    {
        $validate = $this->validate([
            'date' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal harus di isi!',
                ],
            ],
            'status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Status harus di isi!',
                ],
            ],
            'keterangan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Keterangan harus di isi!',
                ],
            ],
        ]);

        if (!$validate) {
            return redirect()->to(base_url('/izin/edit/').$id)->withInput();
        }

        $data = [
            'date' => date('Y-m-d'),
            'status' => $this->request->getPost('status'),
            'keterangan' => $this->request->getPost('keterangan'),
        ];

        $izin = $this->UnableModel->find($id);
        $image = $this->request->getFile('image');
        if ($image->isValid() && !$image->hasMoved()) {
            $oldImage = $izin['image'];
            $newImageName = $image->getRandomName();
            $image->move('assets/img/izin/', $newImageName);
            $data['image'] = $newImageName;
            if ($oldImage && file_exists('assets/img/izin/'.$oldImage)) {
                unlink('assets/img/izin/'.$oldImage);
            }
        }
        $this->UnableModel->update($id, $data);
        session()->setFlashdata('pesan', 'Data Permohonan Izin atau Sakit berhasil diupdate.');
        return redirect()->to(base_url('/izin'));
    }

    public function save()
    {
        $validate = $this->validate([
            'date' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal harus di isi!',
                ],
            ],
            'status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Status harus di isi!',
                ],
            ],
            'keterangan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Keterangan harus di isi!',
                ],
            ],
            'image' => [
                'label' => 'Foto',
                'rules' => 'uploaded[image]|max_size[image,10240]|mime_in[image,image/jpeg,image/png,image/jpg]',
                'errors' => [
                    'uploaded' => 'Gagal mengupload {field}',
                    'max_size' => '{field} harus kurang dari 10MB',
                    'mime_in' => 'Tipe file {field} harus jpeg, png, atau jpg',
                ],
            ],
        ]);

        if (!$validate) {
            return redirect()->to(base_url('/izin/create'))->withInput();
        }
        $image = $this->request->getFile('image');
        $foto = $image->getRandomName();
        $image->move('assets/img/izin/', $foto);
        $this->UnableModel->insert([
            'user_id' => session()->get('id'),
            'date' => date('Y-m-d'),
            'status' => $this->request->getPost('status'),
            'keterangan' => $this->request->getPost('keterangan'),
            'persetujuan' => 'Pending',
            'image' => $foto,
        ]);
        session()->setFlashdata('pesan', 'Data Permohonan Izin atau Sakit berhasil ditambahkan.');
        return redirect()->to(base_url('/izin'));
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
            return redirect()->to(base_url('/izin'))->withInput();
        }
        $bulan = $this->request->getPost('bulan');
        $tahun = $this->request->getPost('tahun');
        $data['title'] = 'Izin atau Sakit';
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
        $data['cariizin'] = $this->UnableModel->getUnableBulan($bulan, $tahun);
        $data['bulan1'] = $bulan;
        $data['tahun1'] = $tahun;
        $data['setting'] = $this->PengaturanModel->find(1);
        return view('guru/izin/read', $data);
    }
}
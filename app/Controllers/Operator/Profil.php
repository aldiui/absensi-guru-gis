<?php

namespace App\Controllers\Operator;

use App\Controllers\BaseController;

class Profil extends BaseController
{
    public function index()
    {
        $data['title'] = 'Profil';
        $data['user'] = $this->KaryawanModel->getUserAndJabatan(session()->get('id'));
        $data['setting'] = $this->PengaturanModel->find(1);
        return view('operator/profil/read', $data);
    }

    public function changepassword()
    {
        $validate = $this->validate([
            'old' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password Lama harus di isi!',
                ],
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password Baru harus di isi!',
                ],
            ],
            'confirm' => [
                'rules' => 'required|matches[password]',
                'errors' => [
                    'matches' => 'Konfirmasi Password tidak sesuai dengan password!',
                    'required' => 'Konfirmasi Password harus di isi!',
                ],
            ],
        ]);
        if (!$validate) {
            return redirect()->to(base_url('/operator/profil'))->withInput();
        }
        $user = $this->KaryawanModel->getUserAndJabatan(session()->get('id'));
        $password = $this->request->getPost('old');
        $hashed_password = hash('sha256', $password.$user['salt']);
        if ($hashed_password === $user['password']) {
            $password2 = $this->request->getPost('password');
            $salt = base64_encode(random_bytes(16));
            $passwordHash = hash('sha256', $password2.$salt);
            $this->KaryawanModel->update($user['id'], [
                'password' => $passwordHash,
                'salt' => $salt,
            ]);
            session()->setFlashdata('pesan', 'Data Password Anda berhasil di ubah');
            return redirect()->to(base_url('/operator/profil'));
        } else {
            session()->setFlashdata('error', 'Password Lama yang anda masukan salah');
            return redirect()->to(base_url('/operator/profil'))->withInput();
        }
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
            'phone' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'No Handphone harus di isi!',
                ],
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat harus di isi!',
                ],
            ],
            'image' => [
                'label' => 'Foto',
                'rules' => 'max_size[image,10240]|mime_in[image,image/jpeg,image/png,image/jpg]',
                'errors' => [
                    'max_size' => 'Foto harus kurang dari 10MB',
                    'mime_in' => 'Tipe file Foto harus jpeg, png, atau jpg',
                ],
            ],
        ]);
        
        if (!$validate) {
            return redirect()->to(base_url('/operator/profil'))->withInput();
        }

        $image = $this->request->getFile('image');
        $user = $this->KaryawanModel->getUserAndJabatan(session()->get('id'));
        $data =  [
            'name' =>  $this->request->getPost('name'),
            'phone' =>  $this->request->getPost('phone'),
            'alamat' =>  $this->request->getPost('alamat'),
        ];

        if ($image->isValid() && !$image->hasMoved()) {
            $oldImage = $user['image'];
            $newImageName = $image->getRandomName();
            $image->move('assets/img/user/', $newImageName);
            $data['image'] = $newImageName;
            if ($oldImage && file_exists('assets/img/user/'.$oldImage)) {
                if ($oldImage != "default.jpg") {
                    unlink('assets/img/user/'.$oldImage);
                }
            }
        }

        $this->KaryawanModel->update($user['id'], $data);
        session()->setFlashdata('pesan', 'Data Profil Anda berhasil di ubah');
        return redirect()->to(base_url('/operator/profil'));
    }
}
<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Auth extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Login',
        ];
        $data['setting'] = $this->PengaturanModel->find(1);
        return view('auth/login', $data);
    }

    public function login()
    {
        $validate = $this->validate([
            'email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Email harus di isi!',
                ],
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password harus di isi!',
                ],
            ],
        ]);

        if (!$validate) {
            return redirect()->to(base_url('/'))->withInput();
        }

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $this->KaryawanModel->checkEmailKaryawan($email);

        if ($user) {
            if ($user['is_active'] == "Aktif") {
                $hashed_password = hash('sha256', $password.$user['salt']);
                if ($hashed_password === $user['password']) {
                    session()->set([
                        'id' => $user['id'],
                        'role'  => $user['role'],
                        'jabatan'  => $this->JabatanModel->find($user['jabatan_id']),
                    ]);
                    if ($user['role'] == "Guru") {
                        session()->setFlashdata('pesan', 'Anda Berhasil Login');
                        return redirect()->to(base_url('/home'));
                    } elseif ($user['role'] == "Operator") {
                        session()->setFlashdata('pesan', 'Anda Berhasil Login');
                        return redirect()->to(base_url('/operator/dashboard'));
                    }
                } else {
                    session()->setFlashdata('error', 'Password yang anda masukan salah');
                    return redirect()->to(base_url('/'))->withInput();
                }
            } else {
                session()->setFlashdata('error', 'Maaf Email yang anda masukan tidak terdaftar');
                return redirect()->to(base_url('/'))->withInput();
            }
        } else {
            session()->setFlashdata('error', 'Maaf Email yang anda masukan tidak terdaftar');
            return redirect()->to(base_url('/'))->withInput();
        }
    }


    public function logout()
    {
        session()->remove('id');
        session()->remove('role');
        session()->remove('jabatan');
        session()->setFlashdata('pesan', 'Anda Berhasil Logout');
        return redirect()->to(base_url('/'));
    }

    public function forgotpassword()
    {
        $data = [
            'title' => 'Lupa Password',
        ];
        $data['setting'] = $this->PengaturanModel->find(1);
        return view('auth/forgotpassword', $data);
    }

    public function resetpassword()
    {
        $validate = $this->validate([
            'email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Email harus di isi!',
                ],
            ],
        ]);

        if (!$validate) {
            return redirect()->to(base_url('/forgotpassword'))->withInput();
        }

        $email = $this->request->getPost('email');
        $user = $this->KaryawanModel->checkEmailKaryawan($email);
        if ($user) {
            $token = base64_encode(random_bytes(16));
            $data_token = [
                'email' => $email,
                'token' => $token,
            ];
            $this->TokenModel->insert($data_token);
            $email_smtp = \Config\Services::email();
            $email_smtp->setFrom("adminedarul@gmail.com", "Admin E-DARUL");
            $email_smtp->setTo($email);
            $email_smtp->setSubject("Reset Password");
            $data = [
                'email' => $email,
                'token' => $token,
                'user' => $user,
            ];
            $data['setting'] = $this->PengaturanModel->find(1);
            $message = view('email/resetpassword', $data);
            $email_smtp->setMessage($message);
            $email_smtp->send();
            session()->setFlashdata('pesan', 'Silakan periksa email Anda untuk reset password');
            return redirect()->to(base_url('/'));
        } else {
            session()->setFlashdata('error', 'Maaf Email yang anda masukan tidak terdaftar');
            return redirect()->to(base_url('/forgotpassword'))->withInput();
        }
    }

    public function checktoken()
    {
        $email = $this->request->getVar('email');
        $token = $this->request->getVar('token');
        $user = $this->KaryawanModel->checkEmailKaryawan($email);
        if ($user) {
            $cektoken = $this->TokenModel->checkToken($token);
            if ($cektoken) {
                $time_created = strtotime($cektoken['created_at']);
                $time_cek = $time_created + 86400;
                if (time() > $time_cek) {
                    $this->TokenModel->delete($cektoken['id']);
                    session()->setFlashdata('error', 'Reset password gagal! token kadaluarsa');
                    return redirect()->to(base_url('/'));
                }
                session()->set('reset', $email);
                $this->TokenModel->delete($cektoken['id']);
                session()->setFlashdata('pesan', 'Akun anda dengan email '.$email.' dapat ubah password');
                return redirect()->to(base_url('/changepassword'));
            } else {
                session()->setFlashdata('error', 'Reset password gagal! token salah');
                return redirect()->to(base_url('/'));
            }
        } else {
            session()->setFlashdata('error', 'Reset password gagal! email salah');
            return redirect()->to(base_url('/'));
        }
    }

    public function changepassword()
    {
        if(!session()->get('reset')) {
            return redirect()->to(base_url('/'));
        }
        $email = session()->get('reset');
        $data = [
            'title' => 'Ubah Password',
            'email' => $email,
        ];
        $data['setting'] = $this->PengaturanModel->find(1);
        return view('auth/changepassword', $data);
    }

    public function verify($email)
    {
        $validate = $this->validate([
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password harus di isi!',
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
            return redirect()->to(base_url('/changepassword'))->withInput();
        }
        $password = $this->request->getPost('password');
        $salt = base64_encode(random_bytes(16));
        $passwordHash = hash('sha256', $password.$salt);
        $user = $this->KaryawanModel->checkEmailKaryawan($email);
        $this->KaryawanModel->update($user['id'], [
            'password' => $passwordHash,
            'salt' => $salt,
        ]);
        session()->remove('reset');
        session()->setFlashdata('pesan', 'Pasword anda berhasil di ubah');
        return redirect()->to(base_url('/'));
    }

}
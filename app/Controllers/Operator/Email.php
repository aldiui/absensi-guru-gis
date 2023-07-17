<?php

namespace App\Controllers\Operator;

use App\Controllers\BaseController;

class Email extends BaseController
{
    public function index()
    {
        $data['title'] = 'Email';
        $data['user'] = $this->KaryawanModel->getUserAndJabatan(session()->get('id'));
        $data['setting'] = $this->PengaturanModel->find(1);
        $data['email'] = $this->EmailModel->find(1);
        return view('operator/email/read', $data);
    }

    public function update()
    {
        $validate = $this->validate([
            'from_email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'From Email harus diisi!',
                ],
            ],
            'from_name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'From Name harus diisi!',
                ],
            ],
            'user_agent' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'User Agent harus diisi!',
                ],
            ],
            'protocol' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Protocol harus diisi!',
                ],
            ],
            'mail_path' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Mail Path harus diisi!',
                ],
            ],
            'smtp_host' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Host SMTP harus diisi!',
                ],
            ],
            'smtp_user' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'SMTP User harus diisi!',
                ],
            ],
            'smtp_pass' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'SMTP Pass harus diisi!',
                ],
            ],
            'smtp_port' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'SMTP Port harus diisi!',
                ],
            ],
            'smtp_timeout' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Timeout SMTP harus diisi!',
                ],
            ],
            'smtp_crypto' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'SMTP Crypto harus diisi!',
                ],
            ],
            'wrap_chars' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Wrap Chars harus diisi!',
                ],
            ],
            'mail_type' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Mail Type harus diisi!',
                ],
            ],
            'charset' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Charset set harus diisi!',
                ],
            ],
            'priority' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Priority harus diisi!',
                ],
            ],
            'bcc_batch_size' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'BCC batch size harus diisi!',
                ],
            ],
        ]);
        if (!$validate) {
            return redirect()->to(base_url('/operator/email'))->withInput();
        }

        $this->EmailModel->update(1, [
            'from_email' =>  $this->request->getPost('from_email'),
            'from_name' =>  $this->request->getPost('from_name'),
            'recipients' =>  $this->request->getPost('recipients'),
            'user_agent' =>  $this->request->getPost('user_agent'),
            'protocol' =>  $this->request->getPost('protocol'),
            'mail_path' =>  $this->request->getPost('mail_path'),
            'smtp_host' =>  $this->request->getPost('smtp_host'),
            'smtp_user' =>  $this->request->getPost('smtp_user'),
            'smtp_pass' =>  $this->request->getPost('smtp_pass'),
            'smtp_port' =>  $this->request->getPost('smtp_port'),
            'smtp_timeout' =>  $this->request->getPost('smtp_timeout'),
            'smtp_keep_alive' =>  $this->request->getPost('smtp_keep_alive'),
            'smtp_crypto' =>  $this->request->getPost('smtp_crypto'),
            'word_wrap' =>  $this->request->getPost('word_wrap'),
            'wrap_chars' =>  $this->request->getPost('wrap_chars'),
            'mail_type' =>  $this->request->getPost('mail_type'),
            'charset' =>  $this->request->getPost('charset'),
            'validate' =>  $this->request->getPost('validate'),
            'priority' =>  $this->request->getPost('priority'),
            'crlf' =>  $this->request->getPost('crlf'),
            'newline' =>  $this->request->getPost('newline'),
            'bcc_batch_mode' =>  $this->request->getPost('bcc_batch_mode'),
            'bcc_batch_size' =>  $this->request->getPost('bcc_batch_size'),
            'dsn' =>  $this->request->getPost('dsn'),
        ]);
        
        session()->setFlashdata('pesan', 'Data Email berhasil di ubah');
        return redirect()->to(base_url('/operator/email'));
    }
}
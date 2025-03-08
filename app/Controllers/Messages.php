<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Messages extends BaseController
{
    public function send()
    {
        $validation = \Config\Services::validation();
        
        $rules = [
            'nama_lengkap' => 'required|min_length[3]',
            'email' => 'required|valid_email',
            'no_telepon' => 'required|numeric|min_length[10]',
            'subjek' => 'required|min_length[5]',
            'pesan' => 'required|min_length[10]'
        ];

        if (!$this->validate($rules)) {
            return json_encode([
                'status' => 'error',
                'message' => $validation->getErrors()
            ]);
        }

        $data = [
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'email' => $this->request->getPost('email'),
            'no_telepon' => $this->request->getPost('no_telepon'),
            'subjek' => $this->request->getPost('subjek'),
            'pesan' => $this->request->getPost('pesan'),
            'created_at' => date('Y-m-d H:i:s')
        ];

        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;

        return json_encode([
            'status' => 'success',
            'message' => 'Pesan berhasil dikirim!'
        ]);
    }
}

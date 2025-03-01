<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Auth extends BaseController
{
    public function index()
    {
        return redirect()->to('/auth/login');
    }

    public function login()
    {
        $data = [
            'title' => 'Login | Kelompok Tani Maju Bersama'
        ];
        return view('auth/login', $data);
    }

    public function register()
    {
        $data = [
            'title' => 'Register | Kelompok Tani Maju Bersama'
        ];
        return view('auth/register', $data);
    }

    public function processLogin()
    {
        // Validasi input
        $rules = [
            'username' => 'required|min_length[3]',
            'password' => 'required|min_length[6]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // For now, we'll just set a simple session (you should implement proper authentication later)
        $session = session();
        $session->set([
            'isLoggedIn' => true,
            'username' => $this->request->getPost('username')
        ]);

        return redirect()->to('/dashboard')->with('success', 'Login berhasil!');
    }

    public function processRegister()
    {
        // Validasi input
        $rules = [
            'username' => 'required|min_length[3]|is_unique[users.username]',
            'phone' => 'required|min_length[10]|max_length[15]|numeric|is_unique[users.phone]',
            'password' => 'required|min_length[6]',
            'confirm_password' => 'required|matches[password]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Proses registrasi akan diimplementasikan nanti
        return redirect()->to('/auth/login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        
        return redirect()->to('/auth/login')->with('success', 'Anda telah berhasil logout.');
    }
}

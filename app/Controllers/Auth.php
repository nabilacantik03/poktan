<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class Auth extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        return redirect()->to('/auth/login');
    }

    public function login()
    {
        // Jika sudah login, redirect ke dashboard
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/dashboard');
        }

        $data = [
            'title' => 'Login | Kelompok Tani Maju'
        ];
        return view('auth/login', $data);
    }

    public function register()
    {
        // Jika sudah login, redirect ke dashboard
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/dashboard');
        }

        $data = [
            'title' => 'Register | Kelompok Tani Maju Bersama',
            'validation' => \Config\Services::validation()
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
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Cari user berdasarkan username
        $user = $this->userModel->where('username', $username)->first();

        // Verifikasi user dan password
        if ($user && password_verify($password, $user['password'])) {
            // Set session
            $sessionData = [
                'user_id' => $user['id'],
                'username' => $user['username'],
                'name' => $user['name'],
                'role' => $user['role'],
                'isLoggedIn' => true
            ];
            session()->set($sessionData);

            // Redirect ke dashboard dengan pesan sukses
            return redirect()->to('/dashboard')
                ->with('success', 'Selamat datang kembali, ' . $user['name'] . '!');
        }

        // Jika login gagal
        return redirect()->back()
            ->withInput()
            ->with('error', 'Username atau password salah');
    }

    public function processRegister()
    {
        // Validasi input
        $rules = [
            'username' => 'required|min_length[3]|is_unique[users.username]',
            'password' => 'required|min_length[6]',
            'confirm_password' => 'required|matches[password]',
            'name' => 'required',
            'phone' => 'required|min_length[10]|max_length[15]|numeric|is_unique[users.phone]',
            'address' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        // Simpan data user baru
        $this->userModel->save([
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'name' => $this->request->getPost('name'),
            'phone' => $this->request->getPost('phone'),
            'address' => $this->request->getPost('address'),
            'role' => 'member'
        ]);

        // Redirect ke login dengan pesan sukses
        return redirect()->to('/auth/login')
            ->with('success', 'Registrasi berhasil! Silakan login.');
    }

    public function logout()
    {
        // Hapus semua data session
        session()->destroy();

        // Redirect ke halaman login dengan pesan
        return redirect()->to('/auth/login')
            ->with('success', 'Anda telah berhasil keluar dari sistem.');
    }
}

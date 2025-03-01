<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard - Kelompok Tani Maju'
        ];
        
        return view('dashboard/index', $data);
    }

    public function profile()
    {
        $data = [
            'title' => 'Profil - Kelompok Tani Maju'
        ];
        
        return view('dashboard/profile', $data);
    }

    public function activities()
    {
        $data = [
            'title' => 'Kegiatan - Kelompok Tani Maju'
        ];
        
        return view('dashboard/activities', $data);
    }

    public function gallery()
    {
        $data = [
            'title' => 'Galeri - Kelompok Tani Maju'
        ];
        
        return view('dashboard/gallery', $data);
    }

    public function members()
    {
        $data = [
            'title' => 'Anggota - Kelompok Tani Maju'
        ];
        
        return view('dashboard/members', $data);
    }
}

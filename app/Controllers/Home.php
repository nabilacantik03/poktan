<?php

namespace App\Controllers;

use App\Models\GalleryModel;

class Home extends BaseController
{
    protected $galleryModel;

    public function __construct()
    {
        $this->galleryModel = new GalleryModel();
    }

    public function index(): string
    {
        $data = [
            'title' => 'Kelompok Tani - Beranda',
            'events' => $this->getEvents(),
            'gallery' => $this->getGallery()
        ];
        return view('landing/home', $data);
    }

    private function getEvents()
    {
        // TODO: Replace with actual database data
        return [
            [
                'title' => 'Pelatihan Pertanian Organik',
                'date' => '2025-03-15',
                'description' => 'Pelatihan teknik pertanian organik untuk anggota kelompok tani'
            ],
            [
                'title' => 'Panen Raya',
                'date' => '2025-04-20',
                'description' => 'Panen raya bersama untuk hasil pertanian musim ini'
            ]
        ];
    }

    private function getGallery()
    {

        $data = $this->galleryModel->getGalleryWithLimit(8);
        return $data;
    }
}

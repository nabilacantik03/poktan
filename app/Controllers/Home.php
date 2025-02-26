<?php

namespace App\Controllers;

class Home extends BaseController
{
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
        // TODO: Replace with actual database data
        return [
            [
                'image' => 'img/gallery/farming1.jpg',
                'title' => 'Kegiatan Tanam Padi',
                'description' => 'Para petani sedang melakukan penanaman padi dengan teknik modern'
            ],
            [
                'image' => 'img/gallery/farming2.jpg',
                'title' => 'Hasil Panen',
                'description' => 'Panen raya dengan hasil yang melimpah berkat penerapan teknologi pertanian'
            ],
            [
                'image' => 'img/gallery/farming3.jpg',
                'title' => 'Pelatihan Petani',
                'description' => 'Sesi pelatihan untuk meningkatkan kemampuan dan pengetahuan petani'
            ],
            [
                'image' => 'img/gallery/farming4.jpg',
                'title' => 'Pemberdayaan Masyarakat',
                'description' => 'Program pemberdayaan untuk kesejahteraan petani dan masyarakat sekitar'
            ]
        ];
    }
}

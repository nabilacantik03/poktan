<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AnnouncementSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'title' => 'Jadwal Pelatihan Bulan Maret',
                'content' => 'Diumumkan kepada seluruh anggota kelompok tani bahwa akan diadakan pelatihan budidaya padi modern pada tanggal 15 Maret 2025.',
                'type' => 'info',
                'status' => 'active',
                'user_id' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'title' => 'Bantuan Bibit Gratis',
                'content' => 'Pemerintah daerah memberikan bantuan bibit gratis untuk anggota kelompok tani. Pendaftaran dibuka sampai 10 Maret 2025.',
                'type' => 'important',
                'status' => 'active',
                'user_id' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'title' => 'Rapat Anggota Bulanan',
                'content' => 'Rapat anggota bulanan akan diadakan pada hari Minggu, 5 Maret 2025 pukul 09.00 WIB di Balai Desa.',
                'type' => 'info',
                'status' => 'active',
                'user_id' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ];

        $this->db->table('announcements')->insertBatch($data);
    }
}

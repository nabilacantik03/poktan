<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AnnouncementSeeder extends Seeder
{
    public function run()
    {
        // Get admin user id
        $adminId = $this->db->table('users')
            ->where('username', 'admin')
            ->get()->getRow()->id;

        $data = [
            [
                'title' => 'Jadwal Pelatihan Bulan Maret',
                'content' => 'Diberitahukan kepada seluruh anggota bahwa akan diadakan pelatihan pertanian organik pada tanggal 15 Maret 2025. Mohon kehadiran seluruh anggota.',
                'priority' => 'high',
                'status' => 'published',
                'created_by' => $adminId,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'title' => 'Pengadaan Bibit Unggul',
                'content' => 'Kelompok tani akan mengadakan pembelian bibit unggul secara kolektif. Bagi yang berminat dapat mendaftar di sekretariat.',
                'priority' => 'medium',
                'status' => 'published',
                'created_by' => $adminId,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'title' => 'Rapat Rutin Bulanan',
                'content' => 'Mengingatkan kepada seluruh anggota untuk rapat rutin bulanan yang akan diadakan pada tanggal 23 Maret 2025.',
                'priority' => 'medium',
                'status' => 'published',
                'created_by' => $adminId,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ];

        $this->db->table('announcements')->insertBatch($data);
    }
}

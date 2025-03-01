<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ActivitySeeder extends Seeder
{
    public function run()
    {
        // Get admin user id
        $adminId = $this->db->table('users')
            ->where('username', 'admin')
            ->get()->getRow()->id;

        $data = [
            [
                'title' => 'Pelatihan Pertanian Organik',
                'description' => 'Pelatihan tentang teknik pertanian organik dan pembuatan pupuk kompos.',
                'date' => '2025-03-15',
                'time' => '09:00:00',
                'location' => 'Balai Desa Sukamaju',
                'status' => 'upcoming',
                'created_by' => $adminId,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'title' => 'Rapat Anggota Bulanan',
                'description' => 'Rapat rutin bulanan untuk membahas perkembangan dan rencana kegiatan.',
                'date' => '2025-03-23',
                'time' => '10:00:00',
                'location' => 'Sekretariat Kelompok Tani',
                'status' => 'upcoming',
                'created_by' => $adminId,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'title' => 'Panen Raya Padi',
                'description' => 'Panen raya padi bersama seluruh anggota kelompok tani.',
                'date' => '2025-04-05',
                'time' => '07:00:00',
                'location' => 'Sawah Bersama',
                'status' => 'upcoming',
                'created_by' => $adminId,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ];

        $this->db->table('activities')->insertBatch($data);
    }
}

<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ActivitySeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'title' => 'Pelatihan Budidaya Padi Modern',
                'description' => 'Pelatihan teknik budidaya padi modern dengan teknologi terbaru',
                'date' => '2025-03-15',
                'location' => 'Balai Desa Sukamaju',
                'status' => 'upcoming',
                'user_id' => 2, // ID ketua
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'title' => 'Panen Raya Jagung',
                'description' => 'Panen raya jagung bersama seluruh anggota kelompok tani',
                'date' => '2025-04-01',
                'location' => 'Lahan Pertanian Blok A',
                'status' => 'upcoming',
                'user_id' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'title' => 'Workshop Pengolahan Hasil Tani',
                'description' => 'Workshop cara mengolah hasil tani menjadi produk bernilai tinggi',
                'date' => '2025-03-10',
                'location' => 'Aula Kecamatan',
                'status' => 'upcoming',
                'user_id' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ];

        $this->db->table('activities')->insertBatch($data);
    }
}

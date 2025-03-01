<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class GalleryDataSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id' => 1,
                'title' => 'Pelatihan Budidaya',
                'description' => 'Dokumentasi pelatihan budidaya tanaman',
                'file_name' => 'gallery-1.jpg',
                'file_type' => 'image/jpeg',
                'activity_id' => 1,
                'user_id' => 2,
                'created_at' => '2025-03-01 04:56:43',
                'updated_at' => '2025-03-01 04:56:43'
            ],
            [
                'id' => 2,
                'title' => 'Persiapan Panen',
                'description' => 'Persiapan panen raya',
                'file_name' => 'gallery-2.jpg',
                'file_type' => 'image/jpeg',
                'activity_id' => 2,
                'user_id' => 2,
                'created_at' => '2025-03-01 04:56:43',
                'updated_at' => '2025-03-01 04:56:43'
            ],
            [
                'id' => 3,
                'title' => 'Workshop Pengolahan',
                'description' => 'Workshop pengolahan hasil tani',
                'file_name' => 'gallery-3.jpg',
                'file_type' => 'image/jpeg',
                'activity_id' => 3,
                'user_id' => 2,
                'created_at' => '2025-03-01 04:56:43',
                'updated_at' => '2025-03-01 04:56:43'
            ]
        ];

        $this->db->table('galleries')->updateBatch($data, 'id');
    }
}

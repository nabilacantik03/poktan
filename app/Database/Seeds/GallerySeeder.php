<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class GallerySeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'title' => 'Pelatihan Budidaya',
                'description' => 'Dokumentasi pelatihan budidaya padi modern',
                'image_path' => 'gallery/gallery-1.jpg',
                'activity_id' => 1,
                'user_id' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'title' => 'Persiapan Panen',
                'description' => 'Persiapan panen raya jagung',
                'image_path' => 'gallery/gallery-2.jpg',
                'activity_id' => 2,
                'user_id' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'title' => 'Workshop Pengolahan',
                'description' => 'Workshop pengolahan hasil tani',
                'image_path' => 'gallery/gallery-3.jpg',
                'activity_id' => 3,
                'user_id' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ];

        $this->db->table('galleries')->insertBatch($data);
    }
}

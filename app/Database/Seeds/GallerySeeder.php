<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class GallerySeeder extends Seeder
{
    public function run()
    {
        // Get admin user id
        $adminId = $this->db->table('users')
            ->where('username', 'admin')
            ->get()->getRow()->id;

        // Get first activity id
        $activityId = $this->db->table('activities')
            ->limit(1)
            ->get()->getRow()->id;

        $data = [
            [
                'title' => 'Persiapan Lahan',
                'description' => 'Dokumentasi kegiatan persiapan lahan untuk musim tanam baru.',
                'image_path' => 'gallery/preparation.jpg',
                'activity_id' => $activityId,
                'uploaded_by' => $adminId,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'title' => 'Pembibitan',
                'description' => 'Proses pembibitan tanaman padi menggunakan metode organik.',
                'image_path' => 'gallery/seeding.jpg',
                'activity_id' => $activityId,
                'uploaded_by' => $adminId,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'title' => 'Pelatihan Anggota',
                'description' => 'Dokumentasi pelatihan anggota kelompok tani.',
                'image_path' => 'gallery/training.jpg',
                'activity_id' => $activityId,
                'uploaded_by' => $adminId,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ];

        $this->db->table('galleries')->insertBatch($data);
    }
}

<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ActivityCleanupSeeder extends Seeder
{
    public function run()
    {
        // Hapus data duplikat, hanya sisakan yang pertama berdasarkan title dan date
        $this->db->query("
            DELETE a1 FROM activities a1
            INNER JOIN activities a2 
            WHERE a1.id > a2.id 
            AND a1.title = a2.title 
            AND a1.date = a2.date
        ");
    }
}

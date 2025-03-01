<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'username' => 'admin',
                'password' => password_hash('admin123', PASSWORD_DEFAULT),
                'name' => 'Administrator',
                'phone' => '081234567890',
                'address' => 'Jl. Admin No. 1',
                'role' => 'admin',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'username' => 'ketua',
                'password' => password_hash('ketua123', PASSWORD_DEFAULT),
                'name' => 'Pak Budi Santoso',
                'phone' => '081234567891',
                'address' => 'Jl. Tani No. 10',
                'role' => 'admin',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'username' => 'anggota1',
                'password' => password_hash('anggota123', PASSWORD_DEFAULT),
                'name' => 'Pak Ahmad',
                'phone' => '081234567892',
                'address' => 'Jl. Sawah No. 5',
                'role' => 'member',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'username' => 'anggota2',
                'password' => password_hash('anggota123', PASSWORD_DEFAULT),
                'name' => 'Pak Dedi',
                'phone' => '081234567893',
                'address' => 'Jl. Padi No. 15',
                'role' => 'member',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ];

        $this->db->table('users')->insertBatch($data);
    }
}

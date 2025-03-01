<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpdateGalleriesTable extends Migration
{
    public function up()
    {
        // Rename kolom image_path menjadi file_name
        $fields = [
            'image_path' => [
                'name' => 'file_name',
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
        ];
        $this->forge->modifyColumn('galleries', $fields);

        // Tambah kolom file_type
        $fields = [
            'file_type' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'after' => 'file_name'
            ],
        ];
        $this->forge->addColumn('galleries', $fields);
    }

    public function down()
    {
        // Hapus kolom file_type
        $this->forge->dropColumn('galleries', 'file_type');

        // Rename kolom file_name kembali ke image_path
        $fields = [
            'file_name' => [
                'name' => 'image_path',
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
        ];
        $this->forge->modifyColumn('galleries', $fields);
    }
}

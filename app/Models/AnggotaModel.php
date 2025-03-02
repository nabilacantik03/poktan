<?php

namespace App\Models;

use CodeIgniter\Model;

class AnggotaModel extends Model
{
    protected $table = 'anggota';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = [
        'nama',
        'foto',
        'jabatan',
        'no_hp',
        'alamat',
        'status'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules = [
        'nama' => 'required|min_length[3]',
        'jabatan' => 'required',
        'no_hp' => 'required|numeric',
        'alamat' => 'required',
        'status' => 'required'
    ];

    protected $validationMessages = [
        'nama' => [
            'required' => 'Nama harus diisi',
            'min_length' => 'Nama minimal 3 karakter'
        ],
        'jabatan' => [
            'required' => 'Jabatan harus diisi'
        ],
        'no_hp' => [
            'required' => 'Nomor HP harus diisi',
            'numeric' => 'Nomor HP harus berupa angka'
        ],
        'alamat' => [
            'required' => 'Alamat harus diisi'
        ],
        'status' => [
            'required' => 'Status harus diisi'
        ]
    ];

    protected $skipValidation = false;

    public function getAnggotaWithLimit($num) {
        return $this->orderBy('id', 'DESC')
                   ->limit($num)
                   ->find();
    }

    public function deleteAnggota($id) {
        return $this->delete($id);
    }
}

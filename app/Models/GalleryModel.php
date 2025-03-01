<?php

namespace App\Models;

use CodeIgniter\Model;

class GalleryModel extends Model
{
    protected $table = 'galleries';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = true;
    
    protected $allowedFields = [
        'title',
        'description',
        'file_name',
        'file_type',
        'activity_id',
        'user_id'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    // Validation
    protected $validationRules = [
        'title' => 'required|min_length[3]',
        'file_name' => 'required',
        'user_id' => 'required|numeric'
    ];
    
    protected $validationMessages = [
        'title' => [
            'required' => 'Judul harus diisi',
            'min_length' => 'Judul minimal 3 karakter'
        ],
        'file_name' => [
            'required' => 'File harus diunggah'
        ],
        'user_id' => [
            'required' => 'User ID harus diisi',
            'numeric' => 'User ID harus berupa angka'
        ]
    ];

    protected $skipValidation = false;
}

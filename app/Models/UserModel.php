<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ['username', 'password_hash'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules = [
        'username'      => 'required|max_length[100]|is_unique[users.username,id,{id}]|alpha_numeric_punct',
        'password_hash' => 'required|min_length[8]',
    ];

    protected $validationMessages = [
        'username' => [
            'required'  => 'Username is required.',
            'is_unique' => 'This username is already taken.',
        ],
        'password_hash' => [
            'required'   => 'Password is required.',
            'min_length' => 'Password must be at least 8 characters.',
        ],
    ];
}

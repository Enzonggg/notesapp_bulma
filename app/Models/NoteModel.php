<?php

namespace App\Models;

use CodeIgniter\Model;

class NoteModel extends Model
{
    protected $table            = 'notes';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;

    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields    = ['title', 'content'];

    // Dates
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation
    protected $validationRules = [
        'title'   => 'required|min_length[3]|max_length[150]',
        'content' => 'permit_empty|max_length[5000]',
    ];

    protected $validationMessages = [
        'title' => [
            'required'   => 'Please enter a title.',
            'min_length' => 'Title must be at least 3 characters.',
            'max_length' => 'Title is too long.',
        ],
        'content' => [
            'max_length' => 'Content is too long.',
        ],
    ];
}

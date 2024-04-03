<?php

namespace App\Models;

use CodeIgniter\Model;


class ModelUser extends Model
{
    protected $DBGroup                  = 'default';
    protected $table                    = 'user';
    protected $primaryKey               = 'username';
    protected $useAutoIncrement         = true;
    protected $insertID                 = 0;
    protected $returnType               = 'array';
    protected $protectedFields          = true;
    protected $allowFields              = [
        'username', 'password', 'nama', 'level_id'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

   
}
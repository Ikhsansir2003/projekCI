<?php

namespace App\Models;

use CodeIgniter\Model;


class ModelProdi extends Model
{
    protected $DBGroup                  = 'default';
    protected $table                    = 'tprodi';
    protected $primaryKey               = 'id';
    protected $useAutoIncrement         = true;
    protected $insertID                 = 0;
    protected $returnType               = 'array';
    protected $protectedFields          = true;
    protected $allowFields              = [
        'id', 'id_jurusan', 'kode_prodi', 'nama_prodi'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function getJurusanProdi()
    {
        return $this->db->table('tprodi')
        ->join('tjurusan', 'tjurusan.id=tprodi.id_jurusan')
        ->orderBy('id_jurusan')
        ->get()->getResultArray();
    }
}
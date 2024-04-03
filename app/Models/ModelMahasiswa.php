<?php

namespace App\Models;

use CodeIgniter\Model;


class ModelMahasiswa extends Model
{
    protected $DBGroup                  = 'default';
    protected $table                    = 'tmhs';
    protected $primaryKey               = 'nim';
    protected $useAutoIncrement         = false;
    protected $insertID                 = 0;
    protected $returnType               = 'array';
    protected $protectedFields          = true;
    protected $allowedFields              = [
        'nim', 'nama', 'alamat', 'jenkel', 'id_jurusan', 'kode_prodi'
    ];

    // Dates
    // protected $useTimestamps = true;
    // protected $dateFormat    = 'datetime';
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';


    // public function simpan()
    // {
    //     $this->db->insert('mahasiswa', $data);
    // }

    // public function update()
    // {
    //     $$this->db->insert('mahasiswa', $data);
    // }
}
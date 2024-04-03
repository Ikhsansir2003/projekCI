<?php

namespace App\Models;

use CodeIgniter\Model;


class Model_Ikhsan_produk extends Model
{
    protected $DBGroup                  = 'default';
    protected $table                    = 'tbl_barang';
    protected $primaryKey               = 'kode_barang';
    protected $useAutoIncrement         = false;
    protected $insertID                 = 0;
    protected $returnType               = 'array';
    protected $protectedFields          = true;
    protected $allowedFields              = [
        'kode_barang', 'nama_barang', 'satuan', 'harga_beli', 'harga_jual', 'stok'
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
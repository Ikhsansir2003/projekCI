<?php

namespace App\Controllers;

use App\Models\ModelMahasiswa;
use App\Models\ModelProdi;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Mahasiswa extends BaseController
{
    protected $mhsModel;
    protected $prodiModel;


    public function __construct()
    {
        $this->mhsModel = new ModelMahasiswa();
        $this->prodiModel = new ModelProdi();

    }

    public function index()
    {
        $data = [
            'mahasiswa' => $this->mhsModel->findAll(),
            'prodi' => $this->prodiModel->getJurusanProdi()
        ];
        return view('mahasiswa/v_mahasiswa', $data);
    }

    public function create()
    {
        $session = session();
        // Mengambil data dari request
        $nim = $this->request->getVar('nim');
        $nama = $this->request->getVar('nama');
        $alamat = $this->request->getVar('alamat');
        $jenkel = $this->request->getVar('jenkel');
        $kode_prodi = $this->request->getVar('kode_prodi');

         // Data yang akan disimpan ke database
        $data = [
                'nim' => $nim,
                'nama' => $nama,
                'alamat' => $alamat,
                'jenkel' => $jenkel,
                'kode_prodi' => $kode_prodi
            ];

            $ada = $this->mhsModel->where('nim', $nim)->first();
            if (!$ada) {
                $this->mhsModel->insert($data);
                $session->setFlashdata(
                    'pesan',
                    '<div class="alert alert-success alert dismissible">
                    <button type="button" class="close" data-dismiss="alert aria-hidden="true">&times;</button>
                    <h5><i class="icon fa fa-check"></i>Sukses,
                    Simpan Data Mahasiswa</h5>
                    </div>'
                );
            } else {
                $session->setFlashdata(
                    'pesan',
                    '<div class="alert alert-danger alert dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fa fa-xmark"></i>Gagal,
                    Nim Mahasiswa SUdah Ada di Database</h5>
                    </div>'
                );
            }
           return redirect()->route('mahasiswa');
    }


    public function update()
    {
        $session = session();
        $nim = $this->request->getVar('nim');
        $nama = $this->request->getVar('nama');
        $alamat = $this->request->getVar('alamat');
        $jenkel = $this->request->getVar('jenkel');
        $kode_prodi = $this->request->getVar('kode_prodi');

         // Data yang akan disimpan ke database
        $data = [
                'nim' => $nim,
                'nama' => $nama,
                'alamat' => $alamat,
                'jenkel' => $jenkel,
                'kode_prodi' => $kode_prodi
            ];
            $where = [
                'nim' => $nim
            ];

            $this->mhsModel->update($where, $data);
                $session->setFlashdata(
                    'pesan',
                    '<div class="alert alert-success alert dismissible">
                    <button type="button" class="close" data-dismiss="alert aria-hidden="true">&times;</button>
                    <h5><i class="icon fa fa-check"></i>Sukses,
                    Simpan Data Mahasiswa</h5>
                    </div>'
                );
             
           return redirect()->route('mahasiswa');
    }

    public function hapus() 
    {
        $session = session();
        $where = [ 
            'nim' => $this->request->getVar('nim')
        ];

        $this->mhsModel->delete($where);
        $session->setFlashdata(
                'pesan',
                '<div class="alert alert-success alert dismissible">
                <button type="button" class="close" data-dismiss="alert aria-hidden="true">&times;</button>
                <h5><i class="icon fa fa-check"></i>Sukses,
                Hapus Data Mahasiswa</h5>
                </div>'
        );

        return redirect()->route('mahasiswa');

    }
        

}
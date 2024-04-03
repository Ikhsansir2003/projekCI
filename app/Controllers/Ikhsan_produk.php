<?php

namespace App\Controllers;

use App\Models\Model_Ikhsan_produk;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Ikhsan_produk extends BaseController
{
    protected $produkModel;


    public function __construct()
    {
        $this->produkModel = new Model_Ikhsan_produk();

    }

    public function index()
    {
        $data = [
            'produk' => $this->produkModel->findAll()
        ];
        return view('mahasiswa/v_mahasiswa', $data);
    }

    public function create()
    {
        $session = session();
        // Mengambil data dari request
        $kode_barang = $this->request->getVar('kode_barang');
        $nama_barang = $this->request->getVar('nama_barang');
        $satuan = $this->request->getVar('satuan');
        $harga_beli = $this->request->getVar('harga_beli');
        $harga_jual = $this->request->getVar('harga_jual');
        $stok = $this->request->getVar('stok');


         // Data yang akan disimpan ke database
        $data = [
                'kode_barang' => $kode_barang,
                'nama_barang' => $nama_barang,
                'satuan' => $satuan,
                'harga_beli' => $harga_beli,
                'harga_jual' => $harga_jual,
                'stok'      => $stok
            ];

            $ada = $this->produkModel->where('kode_barang', $kode_barang)->first();
            if (!$ada) {
                $this->produkModel->insert($data);
                $session->setFlashdata(
                    'pesan',
                    '<div class="alert alert-success alert dismissible">
                    <button type="button" class="close" data-dismiss="alert aria-hidden="true">&times;</button>
                    <h5><i class="icon fa fa-check"></i>Sukses,
                    Simpan Produk</h5>
                    </div>'
                );
            } else {
                $session->setFlashdata(
                    'pesan',
                    '<div class="alert alert-danger alert dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fa fa-xmark"></i>Gagal,
                    Produk Sudah Ada di Database</h5>
                    </div>'
                );
            }
           return redirect()->route('mahasiswa');
    }


    public function update()
    {
        $session = session();
        $kode_barang = $this->request->getVar('kode_barang');
        $nama_barang = $this->request->getVar('nama_barang');
        $satuan = $this->request->getVar('satuan');
        $harga_beli = $this->request->getVar('harga_beli');
        $harga_jual = $this->request->getVar('harga_jual');
        $stok = $this->request->getVar('stok');

         // Data yang akan disimpan ke database
         $data = [
            'kode_barang' => $kode_barang,
            'nama_barang' => $nama_barang,
            'satuan' => $satuan,
            'harga_beli' => $harga_beli,
            'harga_jual' => $harga_jual,
            'stok'      => $stok
        ];
            $where = [
                'kode_barang' => $kode_barang
            ];

            $this->produkModel->update($where, $data);
                $session->setFlashdata(
                    'pesan',
                    '<div class="alert alert-success alert dismissible">
                    <button type="button" class="close" data-dismiss="alert aria-hidden="true">&times;</button>
                    <h5><i class="icon fa fa-check"></i>Sukses,
                    Simpan Data Produk</h5>
                    </div>'
                );
             
           return redirect()->route('mahasiswa');
    }

    public function hapus() 
    {
        $session = session();
        $where = [ 
            'kode_barang' => $this->request->getVar('kode_barang')
        ];

        $this->produkModel->delete($where);
        $session->setFlashdata(
                'pesan',
                '<div class="alert alert-success alert dismissible">
                <button type="button" class="close" data-dismiss="alert aria-hidden="true">&times;</button>
                <h5><i class="icon fa fa-check"></i>Sukses,
                Hapus Data Produk</h5>
                </div>'
        );

        return redirect()->route('mahasiswa');

    }
        

}
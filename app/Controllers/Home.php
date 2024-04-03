<?php

namespace App\Controllers;

use App\Models\ModelUser;
use CodeIgniter\Session\Session;

class Home extends BaseController
{
    protected $session; // Declare a property to hold the session instance

    public function __construct()
    {
        // Load the session library
        $this->session = \Config\Services::session();
    }
    public function index(): string
    {
        // return view('layout/v_konten');
        return view('layout/login');
    }

    public function menu()
    {
        return view('layout/v_konten');
    }

    public function login()
    {
        $user = new ModelUser();
        $uname = $this->request->getVar('username'); // Menggunakan getVar, bukan getVAr
        $psw = $this->request->getVar('password'); // Menggunakan getVar, bukan getVAr
        $ada = $user->where("username = '$uname' AND password = '$psw'")->first();
        if ($ada) {
            $this->session->set('username', $ada['username']); // Menggunakan $this->session
            $this->session->set('nama', $ada['nama']); // Menggunakan $this->session
            $this->session->set('leve_id', $ada['level_id']); // Menggunakan $this->session
            $this->session->set('isLoggedIn' , true);
            return redirect()->to(base_url('/menu'));
        } else {
            $this->session->setFlashdata('gagal', 'Username atau Password Salah'); // Menggunakan $this->session
            return redirect()->to(base_url());
        }
    }

    public function logout(){
        $this->session->destroy();
        return redirect()->to(base_url());
    }
    

    public function inputmahasiswa(): string
    {
        return view('mahasiswa/v_mahasiswa');
    }

    public function inputmatakuliah(): string
    {
        return view('matakuliah/v_matakuliah');
    }

}
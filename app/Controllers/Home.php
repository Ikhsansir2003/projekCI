<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('layout/v_konten');
    }

    public function inputmahasiswa(): string
    {
        return view('mahasiswa/v_mahasiswa');
    }

    public function inputmatakuliah(): string
    {
        return view('matakuliah/v_matakuliah');
    }

    public function login()
    {
        return view('layout/login');
    }
}

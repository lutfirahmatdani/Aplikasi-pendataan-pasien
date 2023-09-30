<?php

namespace App\Controllers;

class User extends BaseController
{
    public function __construct()
    {
        $this->session = session();
    }
    
    public function dashboard()
    {
        //cek apakah ada session bernama isLogin
        if(!$this->session->has('isLogin')){
            return redirect()->to('/auth/login');
        }

        $data = [
            'title' => 'Dashboard',
        ];

        return view('user/dashboard', $data);
    }

    public function pasien()
    {

        $data = [
            'title' => 'Tambah Data Pasien',
            'validation' => \Config\Services::validation(),
        ];

        return view('user/pasien', $data);
    }
    
}
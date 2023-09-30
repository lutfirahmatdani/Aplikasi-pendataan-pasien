<?php

namespace App\Controllers;

use App\Models\PasienModel;

class Admin extends BaseController
{   

    protected $session;
    protected $pasienModel;

    public function __construct()
    {
        $this->session = session();
        $this->pasienModel = new PasienModel();
    }
    
    public function dashboard()
    {   
        //cek apakah ada session bernama isLogin
        if(!$this->session->has('isLogin')){
            return redirect()->to('/auth/login');
        }

        $data = [
            'title' => 'dashboard'
        ];
        
        return view('admin/dashboard', $data);
        
    }

    public function pasien()
    {

        $data = [
            'title' => 'Data Pasien',
            'pasien' => $this->pasienModel->findAll()
        ];

        return view('admin/pasien', $data);

    }

    public function tambah_pasien()
    {

        $data = [
            'title' => 'Tambah Data Pasien',
            'validation' => \Config\Services::validation(),
        ];

        return view('admin/tambah/pasien', $data);

    }
}
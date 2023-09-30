<?php

namespace App\Controllers;

use App\Models\PasienModel;

class Pasien extends BaseController
{
    protected $pasienModel;
    public function __construct()
    {
        $this->pasienModel = new PasienModel();
    }

    public function save()
    {
            
            // validation
            if (!$this->validate([
                'nama_pasien' => [
                    'rules' => 'required',
                ],
                'jenis_kelamin' => [
                    'rules' => 'required',
                ],
                'penyakit' => [
                    'rules' => 'required',
                ],
                'ruang' => [
                    'rules' => 'required',
                ]
            ])) {   
                $validation = \Config\Services::validation();
                return redirect()->to('/user/pasien')->withInput()-> with('validation', $validation);
            }
    
            $this->pasienModel->save([
                'nama_pasien' => $this->request->getVar('nama_pasien'),
                'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
                'penyakit' => $this->request->getVar('penyakit'),
                'ruang' => $this->request->getVar('ruang'),
            ]);
    
            session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
            return redirect()->to('/user/pasien');
    }

    public function saveadmin()
    {
            
            // validation
            if (!$this->validate([
                'nama_pasien' => [
                    'rules' => 'required',
                ],
                'jenis_kelamin' => [
                    'rules' => 'required',
                ],
                'penyakit' => [
                    'rules' => 'required',
                ],
                'ruang' => [
                    'rules' => 'required',
                ]
            ])) {   
                $validation = \Config\Services::validation();
                return redirect()->to('/admin/datapasien')->withInput()-> with('validation', $validation);
            }
    
            $this->pasienModel->save([
                'nama_pasien' => $this->request->getVar('nama_pasien'),
                'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
                'penyakit' => $this->request->getVar('penyakit'),
                'ruang' => $this->request->getVar('ruang'),
            ]);
    
            session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
            return redirect()->to('/admin/datapasien');
    }

    public function delete($id)
    {
        $this->pasienModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/admin/datapasien');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Data pasien',
            'validation' => \Config\Services::validation(),
            'pasien' => $this->pasienModel->getpasien($id)
        ];

        return view('admin/edit/pasien', $data);
    }

    public function update($id) {
        // validation
        if (!$this->validate([
            'nama_pasien' => [
                'rules' => 'required',
            ],
            'jenis_kelamin' => [
                'rules' => 'required',
            ],
            'penyakit' => [
                'rules' => 'required',
            ],
            'ruang' => [
                'rules' => 'required',
            ]
        ])) {   
            $validation = \Config\Services::validation();
            return redirect()->to('/admin/edit/pasien' . $id)->withInput()-> with('validation', $validation);
        }

        $this->pasienModel->save([
            'id' => $id,
            'nama_pasien' => $this->request->getVar('nama_pasien'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'penyakit' => $this->request->getVar('penyakit'),
            'ruang' => $this->request->getVar('ruang'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diedit.');
        return redirect()->to('/admin/datapasien');
    }

}

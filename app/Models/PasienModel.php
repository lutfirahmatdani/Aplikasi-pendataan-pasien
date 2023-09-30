<?php

namespace App\Models;

use CodeIgniter\Model;

class PasienModel extends Model
{
    protected $table      = 'pasien';
    protected $useAutoIncrement = true;
    protected $useTimestamps = true;
    protected $allowedFields = ['nama_pasien', 'jenis_kelamin', 'penyakit', 'ruang'];

    public function getPasien($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }
}
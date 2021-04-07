<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelMahasiswa extends Model
{
    public function DataMhs()
    {
        return $this->db->table('tb_mhs')
        ->where('nim', session()->get('username'))
        ->get()->getRowArray();
    }

    public function edit($data)
    {
        $this->db->table('tb_mhs')
        ->where('id_mhs', $data['id_mhs'])
        ->update($data);
    }
}
<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelMakul extends Model
{
    public function allData()
    {
        return $this->db->table('tb_makul')
        ->orderBy('id_makul', 'DESC')
        ->get()->getResultArray();
    }

    public function allDataMakul($id_prodi)
    {
        return $this->db->table('tb_makul')
        ->where('id_prodi', $id_prodi)
        ->orderBy('smt', 'ASC')
        ->get()->getResultArray();
    }

    public function add($data)
    {
        $this->db->table('tb_makul')->insert($data);
    }

    public function delete_data($data)
    {
         $this->db->table('tb_makul')
         ->where('id_makul', $data['id_makul'])
         ->delete($data);
    }
}
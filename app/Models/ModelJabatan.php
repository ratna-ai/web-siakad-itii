<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelJabatan extends Model
{
    public function allData()
    {
        return $this->db->table('tb_jabatan')
        ->orderBy('id_jabatan', 'ASC')
        ->get()->getResultArray();
    }

    public function add($data)
    {
        $this->db->table('tb_jabatan')->insert($data);
    }

   public function delete_data($data)
   {
        $this->db->table('tb_jabatan')
        ->where('id_jabatan', $data['id_jabatan'])
        ->delete($data);
   }

    public function edit($data)
    {
        $this->db->table('tb_jabatan')
        ->where('id_jabatan', $data['id_jabatan'])
        ->update($data);
    }
}
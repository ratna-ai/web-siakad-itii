<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelUser extends Model
{
    public function allData()
    {
        return $this->db->table('tb_user')
        ->orderBy('id_user', 'DESC')
        ->get()->getResultArray();
    }

    public function add($data)
    {
        $this->db->table('tb_user')->insert($data);
    }

   public function delete_data($data)
   {
        $this->db->table('tb_user')
        ->where('id_user', $data['id_user'])
        ->delete($data);
   }

    public function edit($data)
    {
        $this->db->table('tb_user')
        ->where('id_user', $data['id_user'])
        ->update($data);
    }
}
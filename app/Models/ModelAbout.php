<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAbout extends Model
{
    public function allData()
    {
        return $this->db->table('tb_about')
        ->orderBy('id_desc', 'ASC')
        ->get()->getResultArray();
    }

    public function edit($data)
    {
        $this->db->table('tb_about')
        ->where('id_desc', $data['id_desc'])
        ->update($data);
    }

    public function detailData($id_desc)
    {
        return $this->db->table('tb_about')
        ->where('id_desc', $id_desc)
        ->get()->getRowArray();
    }
}
<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelBanner extends Model
{
    public function allData()
    {
        return $this->db->table('tb_banner')
        ->orderBy('id_banner', 'ASC')
        ->get()->getResultArray();
    }

    public function edit($data)
    {
        $this->db->table('tb_banner')
        ->where('id_banner', $data['id_banner'])
        ->update($data);
    }

    public function detailData($id_banner)
    {
        return $this->db->table('tb_banner')
        ->where('id_banner', $id_banner)
        ->get()->getRowArray();
    }

    public function delete_data($data)
    {
        $this->db->table('tb_banner')
        ->where('id_banner', $data['id_banner'])
        ->delete($data);
    }
}
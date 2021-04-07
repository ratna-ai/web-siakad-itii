<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelHeadline extends Model
{
    public function allData()
    {
        return $this->db->table('tb_hotnews')
        ->orderBy('id_hotnews', 'DESC')
        ->get()->getResultArray();
    }

    public function add($data)
    {
        $this->db->table('tb_hotnews')->insert($data);
    }

    public function detailData($id_hotnews)
    {
        return $this->db->table('tb_hotnews')
        ->where('id_hotnews', $id_hotnews)
        ->get()->getRowArray();
    }

    public function edit($data)
    {
        $this->db->table('tb_hotnews')
        ->where('id_hotnews', $data['id_hotnews'])
        ->update($data);
    }

    public function allDataNews($id_hotnews)
    {
        return $this->db->table('tb_hotnews')
        ->where('id_hotnews', $id_hotnews)
        ->get()->getRowArray();
    }

    public function delete_data($data)
    {
        $this->db->table('tb_hotnews')
        ->where('id_hotnews', $data['id_hotnews'])
        ->delete($data);
    }
}
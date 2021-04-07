<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelNews extends Model
{
    public function allData()
    {
        return $this->db->table('tb_news')
        ->orderBy('id_news', 'DESC')
        ->get()->getResultArray();
    }

    public function detailData($id_news)
    {
        return $this->db->table('tb_news')
        ->where('id_news', $id_news)
        ->get()->getRowArray();
    }

    public function add($data)
    {
        $this->db->table('tb_news')->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('tb_news')
        ->where('id_news', $data['id_news'])
        ->update($data);
    }

    public function allDataNews($id_news)
    {
        return $this->db->table('tb_news')
        ->where('id_news', $id_news)
        ->get()->getRowArray();
    }

    public function delete_data($data)
    {
        $this->db->table('tb_news')
        ->where('id_news', $data['id_news'])
        ->delete($data);
    }
}
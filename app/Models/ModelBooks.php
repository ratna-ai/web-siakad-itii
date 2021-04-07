<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelBooks extends Model
{
    public function allData()
    {
        return $this->db->table('tb_buku')
        ->orderBy('id_buku', 'DESC')
        ->get()->getResultArray();
    }

    public function detailData($id_buku)
    {
        return $this->db->table('tb_buku')
        ->where('id_buku', $id_buku)
        ->get()->getRowArray();
    }

    public function add($data)
    {
        $this->db->table('tb_buku')->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('tb_buku')
        ->where('id_buku', $data['id_buku'])
        ->update($data);
    }

    public function allDataBuku($id_buku)
    {
        return $this->db->table('tb_buku')
        ->where('id_buku', $id_buku)
        ->get()->getRowArray();
    }

    public function delete_data($data)
    {
        $this->db->table('tb_buku')
        ->where('id_buku', $data['id_buku'])
        ->delete($data);
    }
}
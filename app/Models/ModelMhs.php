<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelMhs extends Model
{
    public function allData()
    {
        return $this->db->table('tb_mhs')
        ->join('tb_prodi', 'tb_prodi.id_prodi = tb_mhs.id_prodi', 'left')
        ->orderBy('id_mhs', 'ASC')
        ->get()->getResultArray();
    }

    public function detailData($id_mhs)
    {
        return $this->db->table('tb_mhs')
        ->join('tb_prodi', 'tb_prodi.id_prodi = tb_mhs.id_prodi', 'left')
        ->where('id_mhs', $id_mhs)
        ->get()->getRowArray();
    }

    public function add($data)
    {
        $this->db->table('tb_mhs')->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('tb_mhs')
        ->where('id_mhs', $data['id_mhs'])
        ->update($data);
    }

    public function allDataMahasiswa($id_mhs)
    {
        return $this->db->table('tb_mhs')
        ->join('tb_prodi', 'tb_prodi.id_prodi = tb_mhs.id_prodi', 'left')
        ->where('id_mhs', $id_mhs)
        ->get()->getRowArray();
    }

    public function delete_data($data)
    {
        $this->db->table('tb_mhs')
        ->where('id_mhs', $data['id_mhs'])
        ->delete($data);
    }
}
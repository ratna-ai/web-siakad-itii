<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelDosen extends Model
{
    public function allData()
    {
        return $this->db->table('tb_dosen')
        ->join('tb_jabatan', 'tb_jabatan.id_jabatan = tb_dosen.id_jabatan', 'left')
        ->orderBy('id_dosen', 'ASC')
        ->get()->getResultArray();
    }

    public function detailData($id_dosen)
    {
        return $this->db->table('tb_dosen')
        ->join('tb_jabatan', 'tb_jabatan.id_jabatan = tb_dosen.id_jabatan', 'left')
        ->where('id_dosen', $id_dosen)
        ->get()->getRowArray();
    }

    public function add($data)
    {
        $this->db->table('tb_dosen')->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('tb_dosen')
        ->where('id_dosen', $data['id_dosen'])
        ->update($data);
    }

    public function allDataDosen($id_dosen)
    {
        return $this->db->table('tb_dosen')
        ->join('tb_jabatan', 'tb_jabatan.id_jabatan = tb_dosen.id_jabatan', 'left')
        ->where('id_dosen', $id_dosen)
        ->get()->getRowArray();
    }

    public function delete_data($data)
    {
        $this->db->table('tb_dosen')
        ->where('id_dosen', $data['id_dosen'])
        ->delete($data);
    }
}
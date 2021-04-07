<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelJadwalKuliah extends Model
{
    public function allData($id_prodi)
    {
        return $this->db->table('tb_jadwal')
        ->join('tb_makul', 'tb_makul.id_makul = tb_jadwal.id_makul', 'left')
        ->join('tb_prodi', 'tb_prodi.id_prodi = tb_jadwal.id_prodi', 'left')
        ->join('tb_dosen', 'tb_dosen.id_dosen = tb_jadwal.id_dosen', 'left')
        ->join('tb_kelas', 'tb_kelas.id_kelas = tb_jadwal.id_kelas', 'left')
        ->where('tb_jadwal.id_prodi', $id_prodi)
        ->orderBy('tb_makul.smt', 'ASC')
        ->get()->getResultArray();
    }

    public function makul($id_prodi)
    {
        return $this->db->table('tb_makul')
        ->where('id_prodi', $id_prodi)
        ->orderBy('smt', 'ASC')
        ->get()->getResultArray();
    }

    public function kelas($id_prodi)
    {
        return $this->db->table('tb_kelas')
        ->where('id_prodi', $id_prodi)
        ->orderBy('nama_kelas', 'ASC')
        ->get()->getResultArray();
    }

    public function add($data)
    {
        $this->db->table('tb_jadwal')->insert($data);   
    }

    public function delete_data($data)
    {
        $this->db->table('tb_jadwal')
        ->where('id_jadwal', $data['id_jadwal'])
        ->delete($data);
    }
}
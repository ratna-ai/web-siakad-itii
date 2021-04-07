<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKrs extends Model
{
    public function DataMhs()
    {
        return $this->db->table('tb_mhs')
        ->join('tb_prodi', 'tb_prodi.id_prodi = tb_mhs.id_prodi', 'left')
        ->join('tb_kelas', 'tb_kelas.id_kelas = tb_mhs.id_kelas', 'left')
        ->join('tb_dosen', 'tb_dosen.id_dosen = tb_kelas.id_dosen', 'left')
        ->where('nim', session()->get('username'))
        ->get()->getRowArray();
    }

    public function Pilihmakul($id_ta, $id_prodi)
    {
        return $this->db->table('tb_jadwal')
        ->join('tb_makul', 'tb_makul.id_makul = tb_jadwal.id_makul', 'left')
        ->join('tb_kelas', 'tb_kelas.id_kelas = tb_jadwal.id_kelas', 'left')
        ->join('tb_dosen', 'tb_dosen.id_dosen = tb_jadwal.id_dosen', 'left')
        ->join('tb_prodi', 'tb_prodi.id_prodi = tb_jadwal.id_prodi', 'left')
        ->where('tb_jadwal.id_ta', $id_ta)
        ->where('tb_jadwal.id_prodi', $id_prodi)
        ->get()->getResultArray();
    }

    public function TambahMakul($data)
    {
        $this->db->table('tb_krs')->insert($data);
    }

    public function DataKrs($id_mhs, $id_ta)
    {
        return $this->db->table('tb_krs')
        ->join('tb_jadwal', 'tb_jadwal.id_jadwal = tb_krs.id_jadwal', 'left')
        ->join('tb_makul', 'tb_makul.id_makul = tb_jadwal.id_makul', 'left')
        ->join('tb_kelas', 'tb_kelas.id_kelas = tb_jadwal.id_kelas', 'left')
        ->join('tb_dosen', 'tb_dosen.id_dosen = tb_jadwal.id_dosen', 'left')
        ->where('id_mhs', $id_mhs)
        ->where('tb_krs.id_ta', $id_ta)
        ->get()->getResultArray();
    }

    public function delete_data($data)
    {
        $this->db->table('tb_krs')
        ->where('id_krs', $data['id_krs'])
        ->delete($data);
    }
}
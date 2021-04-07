<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelDsn extends Model
{
    public function DataDosen()
    {
        return $this->db->table('tb_dosen')
        ->where('nidn', session()->get('username'))
        ->get()->getRowArray();
    }

    public function edit($data)
    {
        $this->db->table('tb_dosen')
        ->where('id_dosen', $data['id_dosen'])
        ->update($data);
    }
    
    public function JadwalDosen($id_dosen,$id_ta)
    {
        return $this->db->table('tb_jadwal')
        ->join('tb_makul', 'tb_makul.id_makul = tb_jadwal.id_makul', 'left')
        ->join('tb_prodi', 'tb_prodi.id_prodi = tb_jadwal.id_prodi', 'left')
        ->join('tb_dosen', 'tb_dosen.id_dosen = tb_jadwal.id_dosen', 'left')
        ->join('tb_kelas', 'tb_kelas.id_kelas = tb_jadwal.id_kelas', 'left')
        ->where('tb_jadwal.id_dosen', $id_dosen)
        ->where('tb_jadwal.id_ta', $id_ta)
        ->get()->getResultArray();
    }

    public function DetailJadwal($id_jadwal)
    {
        return $this->db->table('tb_jadwal')
        ->join('tb_kelas', 'tb_kelas.id_kelas = tb_jadwal.id_kelas', 'left')
        ->join('tb_makul', 'tb_makul.id_makul = tb_jadwal.id_makul', 'left')
        ->join('tb_dosen', 'tb_dosen.id_dosen = tb_jadwal.id_dosen', 'left')
        ->join('tb_prodi', 'tb_prodi.id_prodi = tb_jadwal.id_prodi', 'left')
        ->where('tb_jadwal.id_jadwal', $id_jadwal)
        ->get()->getRowArray();
    }

    public function mhs($id_jadwal)
    {
        return $this->db->table('tb_krs')
        ->join('tb_mhs', 'tb_mhs.id_mhs = tb_krs.id_mhs', 'left')
        ->where('id_jadwal', $id_jadwal)
        ->get()->getResultArray();
    }

    public function SimpanAbsen($data)
    {
        $this->db->table('tb_krs')
        ->where('id_krs', $data['id_krs'])
        ->update($data);
    }

    public function SimpanNilai($data)
    {
        $this->db->table('tb_krs')
        ->where('id_krs', $data['id_krs'])
        ->update($data);
    }
}
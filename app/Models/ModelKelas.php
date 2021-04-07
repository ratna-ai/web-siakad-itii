<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKelas extends Model
{
    public function allData()
    {
        return $this->db->table('tb_kelas')
        ->join('tb_prodi', 'tb_prodi.id_prodi = tb_kelas.id_prodi', 'left')
        ->join('tb_dosen', 'tb_dosen.id_dosen = tb_kelas.id_dosen', 'left')
        ->orderBy('tb_kelas.id_kelas', 'ASC')
        ->get()->getResultArray();
    }

    public function detail_Data($id_kelas)
    {
        return $this->db->table('tb_kelas')
        ->orderBy('id_kelas', 'DESC')
        ->get()->getRowArray();
    }

    public function add($data)
    {
        $this->db->table('tb_kelas')->insert($data);
    }

   public function delete_data($data)
   {
        $this->db->table('tb_kelas')
        ->where('id_kelas', $data['id_kelas'])
        ->delete($data);
   }

    public function edit($data)
    {
        $this->db->table('tb_kelas')
        ->where('id_kelas', $data['id_kelas'])
        ->update($data);
    }

    public function detail($id_kelas)
    {
        return $this->db->table('tb_kelas')
        ->join('tb_prodi', 'tb_prodi.id_prodi = tb_kelas.id_prodi', 'left')
        ->join('tb_dosen', 'tb_dosen.id_dosen = tb_kelas.id_dosen', 'left')
        ->where('id_kelas', $id_kelas)
        ->get()->getRowArray();
    }

    //menampilkan mahasiswa berdasarkan kelas
    public function dataMahasiswa($id_kelas)
	{
		return $this->db->table('tb_mhs')
        ->join('tb_prodi','tb_prodi.id_prodi = tb_mhs.id_prodi', 'left')
        ->where('id_kelas', $id_kelas)
        ->orderBy('id_mhs','DESC')
		->get()->getResultArray();
    }
    
    public function jml_mhs($id_kelas)
    {
        return $this->db->table('tb_mhs')
        ->where('id_kelas', $id_kelas)
        ->countAllResults();
    }

    //menampilkan mahasiswa yang belum punya kelas
    public function data_mhs()
	{
		return $this->db->table('tb_mhs')
        ->join('tb_prodi','tb_prodi.id_prodi = tb_mhs.id_prodi', 'left')
        ->where('id_kelas', null)
        ->orderBy('id_mhs','ASC')
		->get()->getResultArray();
    }

    public function update_mhs($data)
    {
        $this->db->table('tb_mhs')
        ->where('id_mhs', $data['id_mhs'])
        ->update($data);
    }
}
<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAuth extends Model
{
    public function login_user($username, $password)
    {
        return $this->db->table('tb_user')->where([
            'username' => $username,
            'password' => $password
        ])->get()->getRowArray();
    }

    public function login_mhs($username, $password)
    {
        return $this->db->table('tb_mhs')->where([
            'nim'       => $username,
            'pass_mhs'  => $password
        ])->get()->getRowArray();
    }

    public function login_dosen($username, $password)
    {
        return $this->db->table('tb_dosen')->where([
            'nidn'          => $username,
            'pass_dosen'    => $password
        ])->get()->getRowArray();
    }
}
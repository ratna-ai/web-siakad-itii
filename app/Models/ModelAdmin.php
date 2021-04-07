<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAdmin extends Model
{
    public function jml_buku()
    {
        return $this->db->table('tb_buku')
        ->countAll();
    }

    public function jml_news()
    {
        return $this->db->table('tb_news')
        ->countAll();
    }

    public function jml_dosen()
    {
        return $this->db->table('tb_dosen')
        ->countAll();
    }

    public function jml_mhs()
    {
        return $this->db->table('tb_mhs')
        ->countAll();
    }
}
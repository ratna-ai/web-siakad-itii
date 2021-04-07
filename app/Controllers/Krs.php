<?php 

namespace App\Controllers;

use App\Models\ModelKrs;
use App\Models\ModelTa;

class Krs extends BaseController
{
	public function __construct()
	{
        helper('form');
        $this->ModelTa = new ModelTa();
        $this->ModelKrs = new ModelKrs();
	}
	
	public function index()
	{
        $ta = $this->ModelTa->ta_aktif();
        $mhs = $this->ModelKrs->DataMhs();
        $data = [
            'title' 		=> 'Kartu Rencana Studi (KRS)',
            'ta_aktif'      => $this->ModelTa->ta_aktif(),
            'mhs'           => $this->ModelKrs->DataMhs(),
            'pilih_makul'   => $this->ModelKrs->Pilihmakul($ta['id_ta'], $mhs['id_prodi']),
            'data_makul'    => $this->ModelKrs->DataKrs($mhs['id_mhs'], $ta['id_ta']),
			'isi'			=> 'mhs/krs/krs_index'
		];
		return view('layout/wrapper', $data);
    }
    
    public function tambah_makul($id_jadwal)
    {
        $mhs = $this->ModelKrs->DataMhs();
        $ta = $this->ModelTa->ta_aktif();
        $data = [
            'id_jadwal'     => $id_jadwal,
            'id_ta'         => $ta['id_ta'],
            'id_mhs'        => $mhs['id_mhs']
        ];
        $this->ModelKrs->TambahMakul($data);
        session()->setFlashdata('pesan', 'Mata Kuliah Berhasil Ditambah!');
        return redirect()->to(base_url('krs'));
    }

    public function delete($id_krs)
    {
        $data = [
            'id_krs' => $id_krs,
        ];
        $this->ModelKrs->delete_data($data);
        session()->setFlashdata('pesan', 'Data KRS Berhasil Dihapus!');
        return redirect()->to(base_url('krs'));
    }

    public function print()
    {
        $ta = $this->ModelTa->ta_aktif();
        $mhs = $this->ModelKrs->DataMhs();
        $data  = [
            'title'     => 'Print KRS',
            'ta_aktif'      => $this->ModelTa->ta_aktif(),
            'mhs'           => $this->ModelKrs->DataMhs(),
            'data_makul'    => $this->ModelKrs->DataKrs($mhs['id_mhs'], $ta['id_ta']),
        ];
        return view('mhs/krs/print_krs', $data);
    }

	//--------------------------------------------------------------------

}
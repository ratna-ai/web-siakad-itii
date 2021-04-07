<?php 

namespace App\Controllers;

use App\Models\ModelTa;
use App\Models\ModelKrs;
use App\Models\ModelMahasiswa;

class Mhs extends BaseController
{
	public function __construct()
	{
		helper('form');
        $this->ModelTa = new ModelTa();
        $this->ModelKrs = new ModelKrs();
        $this->ModelMahasiswa = new ModelMahasiswa();
	}
	
	public function index()
	{
		$data = [
			'title' 		=> 'Dashboard Mahasiswa',
			'mhs'			=> $this->ModelKrs->DataMhs(),
			'maha'			=> $this->ModelMahasiswa->DataMhs(),
			'ta'			=> $this->ModelTa->ta_aktif(),
			'isi'			=> 'dashboard_mhs'
		];
		return view('layout/wrapper', $data);
	}

	public function absensi()
	{
		$ta = $this->ModelTa->ta_aktif();
        $mhs = $this->ModelKrs->DataMhs();
		$data = [
			'title' 		=> 'Absensi',
			'ta_aktif'      => $this->ModelTa->ta_aktif(),
            'mhs'           => $this->ModelKrs->DataMhs(),
            'data_makul'    => $this->ModelKrs->DataKrs($mhs['id_mhs'], $ta['id_ta']),
			'isi'			=> 'mhs/absen_index'
		];
		return view('layout/wrapper', $data);
	}

	public function edit($id_mhs)
	{
		$data = [
			'id_mhs'	=> $id_mhs,
            'pass_mhs'	=> $this->request->getPost('pass_mhs'),
		];

		$this->ModelMahasiswa->edit($data);
		session()->setFlashdata('pesan', 'Password Berhasil Dirubah.');
		return redirect()->to(base_url('mhs'));
	}
	
	public function khs()
	{
		$ta = $this->ModelTa->ta_aktif();
        $mhs = $this->ModelKrs->DataMhs();
        $data = [
            'title' 		=> 'Kartu Hasil Studi (KHS)',
            'ta_aktif'      => $this->ModelTa->ta_aktif(),
            'mhs'           => $this->ModelKrs->DataMhs(),
            'pilih_makul'   => $this->ModelKrs->Pilihmakul($ta['id_ta'], $mhs['id_prodi']),
            'data_makul'    => $this->ModelKrs->DataKrs($mhs['id_mhs'], $ta['id_ta']),
			'isi'			=> 'mhs/khs_index'
		];
		return view('layout/wrapper', $data);
	}

	public function print_khs()
	{
		$ta = $this->ModelTa->ta_aktif();
        $mhs = $this->ModelKrs->DataMhs();
        $data = [
            'title' 		=> 'Kartu Hasil Studi (KHS)',
            'ta_aktif'      => $this->ModelTa->ta_aktif(),
            'mhs'           => $this->ModelKrs->DataMhs(),
            'pilih_makul'   => $this->ModelKrs->Pilihmakul($ta['id_ta'], $mhs['id_prodi']),
            'data_makul'    => $this->ModelKrs->DataKrs($mhs['id_mhs'], $ta['id_ta']),
		];
		return view('mhs/khs_print', $data);
	}

	//--------------------------------------------------------------------

}
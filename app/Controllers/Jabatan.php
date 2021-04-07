<?php namespace App\Controllers;

use App\Models\ModelJabatan;

class Jabatan extends BaseController
{
    public function __construct()
	{
		helper('form');
		$this->ModelJabatan = new ModelJabatan();
	}
    
    public function index()
	{
		$data = [
            'title' 	=> 'Jabatan',
            'jabatan'   => $this->ModelJabatan->allData(),
			'isi'		=> 'admin/jabatan_index'
		];
		return view('layout/wrapper', $data);
	}

	public function add()
	{
		$data = [
            'nama_jabatan'	=> $this->request->getPost('nama_jabatan'),
		];

		$this->ModelJabatan->add($data);
		session()->setFlashdata('pesan', 'Data Berhasil Ditambah.');
		return redirect()->to(base_url('jabatan'));
	}

	public function edit($id_jabatan)
	{
		$data = [
			'id_jabatan'	=> $id_jabatan,
            'nama_jabatan'	=> $this->request->getPost('nama_jabatan'),
		];

		$this->ModelJabatan->edit($data);
		session()->setFlashdata('pesan', 'Data Berhasil Dirubah.');
		return redirect()->to(base_url('jabatan'));
	}

	public function delete($id_jabatan)
	{
		$data = [
			'id_jabatan'	=> $id_jabatan,
		];

		$this->ModelJabatan->delete_data($data);
		session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');
		return redirect()->to(base_url('jabatan'));
	}
}
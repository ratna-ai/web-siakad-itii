<?php namespace App\Controllers;

use App\Models\ModelProdi;
use App\Models\ModelDosen;

class Prodi extends BaseController
{
	public function __construct()
	{
		helper('form');
		$this->ModelProdi = new ModelProdi();
		$this->ModelDosen = new ModelDosen();
	}
	public function index()
	{
		$data = [
			'title' => 'Program Studi',
			'prodi' => $this->ModelProdi->allData(),
			'isi'	=> 'admin/prodi/prod_index'
		];
		return view('layout/wrapper', $data);
	}
	
	public function add()
	{
		$data = [
			'title' 	=> 'Tambah Data Program Studi',
			'dosen'		=> $this->ModelDosen->allData(),
			'isi'		=> 'admin/prodi/add_prodi'
		];
		return view('layout/wrapper', $data);	
	}

	public function insert()
	{
		if ($this->validate([
			'kode_prodi'	=> [
				'label'	=> 'Kode Prodi',
				'rules'	=> 'required',
				'errors'=> [
					'required'	=> '{field} Wajib Diisi!',
				]
			],
			'nama_prodi'	=> [
				'label'	=> 'Program Studi',
				'rules'	=> 'required',
				'errors'=> [
					'required'	=> '{field} Wajib Diisi!'
				]
			],
			'kaprodi'	=> [
				'label'	=> 'KA Prodi',
				'rules'	=> 'required',
				'errors'=> [
					'required'	=> '{field} Wajib Diisi!'
				]
			],
			'jenjang'	=> [
				'label'	=> 'Jenjang',
				'rules'	=> 'required',
				'errors'=> [
					'required'	=> '{field} Wajib Diisi!'
				]
			],
		])) {
			//jika valid
			$data = array(
				'kode_prodi'	=> $this->request->getPost('kode_prodi'),
				'nama_prodi'	=> $this->request->getPost('nama_prodi'),
				'jenjang'		=> $this->request->getPost('jenjang'),
				'kaprodi'		=> $this->request->getPost('kaprodi'),
			);
			$this->ModelProdi->add($data);
			session()->setFlashdata('pesan', 'Data berhasil ditambahkan!');
			return redirect()->to(base_url('prodi'));
		} else {
			//jika tidak valid
			session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('prodi/add'));
		}
	}

	public function edit($id_prodi)
	{
		$data = [
			'title' 	=> 'Edit Prodi',
			'prodi'		=> $this->ModelProdi->detail_Data($id_prodi),
			'dosen'		=> $this->ModelDosen->allData(),
			'isi'		=> 'admin/prodi/edit_prodi'
		];
		return view('layout/wrapper', $data);
	}

	public function update($id_prodi)
	{
		if ($this->validate([
			'kode_prodi'	=> [
				'label'	=> 'Kode Prodi',
				'rules'	=> 'required',
				'errors'=> [
					'required'	=> '{field} Wajib Diisi!',
				]
			],
			'nama_prodi'	=> [
				'label'	=> 'Program Studi',
				'rules'	=> 'required',
				'errors'=> [
					'required'	=> '{field} Wajib Diisi!'
				]
			],
			'kaprodi'	=> [
				'label'	=> 'KA Prodi',
				'rules'	=> 'required',
				'errors'=> [
					'required'	=> '{field} Wajib Diisi!'
				]
			],
			'jenjang'	=> [
				'label'	=> 'Jenjang',
				'rules'	=> 'required',
				'errors'=> [
					'required'	=> '{field} Wajib Diisi!'
				]
			],
		])) {
			//jika valid
			$data = array(
				'id_prodi'		=> $id_prodi,
				'kode_prodi'	=> $this->request->getPost('kode_prodi'),
				'nama_prodi'	=> $this->request->getPost('nama_prodi'),
				'kaprodi'		=> $this->request->getPost('kaprodi'),
				'jenjang'		=> $this->request->getPost('jenjang'),
			);
			$this->ModelProdi->edit($data);
			session()->setFlashdata('pesan', 'Data berhasil diupdate!');
			return redirect()->to(base_url('prodi'));
		} else {
			//jika tidak valid
			session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('prodi/edit/'. $id_prodi));
		}	
	}

	public function delete($id_prodi)
	{
		$data = [
			'id_prodi'	=> $id_prodi,
		];

		$this->ModelProdi->delete_data($data);
		session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');
		return redirect()->to(base_url('prodi'));
	}
	//--------------------------------------------------------------------

}
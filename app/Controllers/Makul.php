<?php namespace App\Controllers;

use App\Models\ModelMakul;
use App\Models\ModelProdi;

class Makul extends BaseController
{
	public function __construct()
	{
		helper('form');
		$this->ModelMakul = new ModelMakul();
		$this->ModelProdi = new ModelProdi();
	}

	public function index()
	{
		$data = [
			'title' => 'Mata Kuliah',
			'prodi' => $this->ModelProdi->allData(),
			'isi'	=> 'admin/makul/makul_index'
		];
		return view('layout/wrapper', $data);
	}

	public function detail($id_prodi)
	{
		$data = [
			'title' => 'Mata Kuliah',
			'prodi' => $this->ModelProdi->detail_Data($id_prodi),
			'makul' => $this->ModelMakul->allDataMakul($id_prodi),
			'isi'	=> 'admin/makul/detail_makul'
		];
		return view('layout/wrapper', $data);
	}

	public function add($id_prodi)
	{
		if ($this->validate([
			'kode_makul'	=> [
				'label'	=> 'Kode Mata Kuliah',
				'rules'	=> 'required|is_unique[tb_makul.kode_makul]',
				'errors'=> [
					'required'	=> '{field} Wajib Diisi!',
					'is_unique'	=> '{field} Sudah ada, masukkan kode lain!'
				]
			],
			'nama_makul'	=> [
				'label'	=> 'Mata Kuliah',
				'rules'	=> 'required',
				'errors'=> [
					'required'	=> '{field} Wajib Diisi!'
				]
			],
			'sks'	=> [
				'label'	=> 'SKS',
				'rules'	=> 'required',
				'errors'=> [
					'required'	=> '{field} Wajib Diisi!'
				]
			],
			'smt'	=> [
				'label'	=> 'Semester',
				'rules'	=> 'required',
				'errors'=> [
					'required'	=> '{field} Wajib Diisi!'
				]
			],
			'kategori'	=> [
				'label'	=> 'Kategori',
				'rules'	=> 'required',
				'errors'=> [
					'required'	=> '{field} Wajib Diisi!'
				]
			],
		])) {
			//jika valid
			$smt = $this->request->getPost('smt'); 
			if ($smt == 1 || $smt == 3 || $smt == 5 || $smt == 7) {
				$semester = 'Ganjil';
			} else {
				$semester = 'Genap';
			}
			$data = [
				'kode_makul'	=> $this->request->getPost('kode_makul'),
				'nama_makul'	=> $this->request->getPost('nama_makul'),
				'sks'			=> $this->request->getPost('sks'),
				'smt'			=> $this->request->getPost('smt'),
				'semester'		=> $semester,
				'kategori'		=> $this->request->getPost('kategori'),
				'id_prodi'		=> $id_prodi,
			];
	
			$this->ModelMakul->add($data);
			session()->setFlashdata('pesan', 'Data Berhasil Ditambah.');
			return redirect()->to(base_url('makul/detail/'.$id_prodi));	
		} else {
			//jika tidak valid
			session()->setFlashdata('errors',\Config\Services::validation()->getErrors());
			return redirect()->to(base_url('makul/detail/'.$id_prodi));
		}
	}

	public function delete($id_prodi, $id_makul)
	{
		$data = [
			'id_makul'	=> $id_makul,
		];

		$this->ModelMakul->delete_data($data);
		session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');
		return redirect()->to(base_url('makul/detail/'.$id_prodi));
	}
	//--------------------------------------------------------------------

}
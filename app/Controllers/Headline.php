<?php namespace App\Controllers;

use App\Models\ModelHeadline;

class Headline extends BaseController
{
	public function __construct()
	{
		helper('form');
		$this->ModelHeadline = new ModelHeadline();
	}
	public function index()
	{
		$data = [
			'title' => 'Hotnews',
			'hotnews' => $this->ModelHeadline->allData(),
			'isi'	=> 'admin/hotnews/hotnews_index'
		];
		return view('layout/wrapper', $data);
	}

	public function add()
	{
		$data = [
			'title' => 'Tambah Data Hotnews',
			'isi'	=> 'admin/hotnews/add_hotnews'
		];
		return view('layout/wrapper', $data);
	}

	public function editData($id_hotnews)
	{
		$data = [
			'title' => 'Edit Data Hotnews',
			'hotnews'	=> $this->ModelHeadline->detailData($id_hotnews),
			'isi'	=> 'admin/hotnews/edit_hotnews'
		];
		return view('layout/wrapper', $data);
	}

	public function detail($id_hotnews)
	{
		$data = [
			'title' => 'Hotnews',
			'hotnews' 	=> $this->headline->detailData($id_hotnews),
			'isi'	=> 'admin/hotnews/edit_hotnews'
		];
		return view('layout/wrapper', $data);
	}

	public function insert()
	{
		if ($this->validate([
			'hotnews_gbr'	=> [
				'label'	=> 'Hotnews',
				'rules'	=> 'uploaded[hotnews_gbr]|max_size[hotnews_gbr,1024]|mime_in[hotnews_gbr,image/png,image/jpeg,image/jpg,image/gif,image/ico]',
				'errors'=> [
					'required'	=> '{field} Wajib Diisi!',
					'max_size'	=> '{field} Max 1024 KB',
					'required'	=> 'Format {field} Wajib *.png, *.jpg, *.jpeg, *.gif, *.ico'
				]
			],
		])) {
			//mengambil file foto dari input
			$foto = $this->request->getFile('hotnews_gbr');
			//rename foto
			$nama_file = $foto->getRandomName();
			//jika valid
			$data = array(
				'hotnews_gbr'	=> $nama_file,
			);
			//memindah foto dar input ke folder foto di direktori
			$foto->move('hotnews', $nama_file);
			$this->ModelHeadline->add($data);
			session()->setFlashdata('pesan', 'Data berhasil ditambahkan!');
			return redirect()->to(base_url('headline'));
		} else {
			//jika tidak valid
			session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('headline/add'));
		}
	}

	public function edit($id_hotnews)
	{
		$data = [
			'title' => 'Edit Data Hotnews',
			'hotnews'	=> $this->ModelHeadline->detailData($id_hotnews),
			'isi'	=> 'admin/hotnews/edit_hotnews'
		];
		return view('layout/wrapper', $data);
	}

	public function update($id_hotnews)
	{
		if ($this->validate([
			'hotnews_gbr'	=> [
				'label'	=> 'Hotnews',
				'rules'	=> 'max_size[hotnews_gbr,1024]|mime_in[hotnews_gbr,image/png,image/jpeg,image/jpg,image/gif,image/ico]',
				'errors'=> [
					'max_size'	=> '{field} Max 1024 KB',
					'required'	=> 'Format {field} Wajib *.png, *.jpg, *.jpeg, *.gif, *.ico'
				]
			],
		])) {
			//mengambil file foto dari form input
			$foto = $this->request->getFile('hotnews_gbr');
			if ($foto->getError() == 4) {
				//jika tidak ganti foto
				$data = array(
					'id_hotnews'		=> $id_hotnews,
				);
				$this->ModelHeadline->edit($data);
			} else {
				//menghapus foto lama
				$hotnews = $this->ModelHeadline->detailData($id_hotnews);
				if ($hotnews['hotnews_gbr'] != "") {
					unlink('hotnews/' . $hotnews['hotnews_gbr']);
				}
				//rename file foto
				$nama_file = $foto->getRandomName();
				//jika valid
				$data = array(
					'id_hotnews'	=> $id_hotnews,
					'hotnews_gbr'	=> $nama_file,
				);
				//memindahkan file foto dari form input ke folder foto di direktori
				$foto->move('hotnews', $nama_file);
				$this->ModelHeadline->edit($data);
			}
			session()->setFlashdata('pesan', 'Data berhasil diupdate!');
			return redirect()->to(base_url('headline'));
		} else {
			//jika tidak valid
			session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('headline/edit/'. $id_hotnews));
		}
	}

	public function delete($id_hotnews)
	{
		$data = [
			'id_hotnews'	=> $id_hotnews,
		];

		$this->ModelHeadline->delete_data($data);
		session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');
		return redirect()->to(base_url('headline'));
	}

	//--------------------------------------------------------------------

}
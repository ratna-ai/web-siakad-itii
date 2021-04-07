<?php namespace App\Controllers;

use App\Models\ModelBanner;

class Banner extends BaseController
{
	public function __construct()
	{
		helper('form');
		$this->ModelBanner = new ModelBanner();
	}
	
	public function index()
	{
		$data = [
			'title' 	=> 'Banner STAK-RRI',
			'banner' 	=> $this->ModelBanner->allData(),
			'isi'		=> 'admin/banner/banner_index'
		];
		return view('layout/wrapper', $data);
	}

	public function edit($id_banner)
	{
		$data = [
			'title' 	=> 'Edit Banner',
			'banner' 	=> $this->ModelBanner->detailData($id_banner),
			'isi'		=> 'admin/edit_banner'
		];
		return view('layout/wrapper', $data);
	}

	public function update($id_banner)
	{
		if ($this->validate([
			'ket'	=> [
				'label'	=> 'Keterangan',
				'rules'	=> 'required',
				'errors'=> [
					'required'	=> '{field} Wajib Diisi!',
				]
			],
			'foto_banner'	=> [
				'label'	=> 'Banner',
				'rules'	=> 'max_size[foto_banner,1024]|mime_in[foto_banner,image/png,image/jpeg,image/jpg,image/gif,image/ico]',
				'errors'=> [
					'max_size'	=> '{field} Max 1024 KB',
					'required'	=> 'Format {field} Wajib *.png, *.jpg, *.jpeg, *.gif, *.ico'
				]
			],
		])) {
			//mengambil file foto dari input
			$foto = $this->request->getFile('foto_banner');
			if ($foto->getError() == 4) {
				//jika foto tidak ganti
				$data = array(
					'id_banner'		=> $id_banner,
					'ket'			=> $this->request->getPost('ket'),
				);
				$this->ModelBanner->edit($data);
			} else {
				//menghapus foto lama
				$banner = $this->ModelBanner->detailData($id_banner);
				if ($banner['foto_banner'] != "") {
					unlink('banner/' . $banner['foto_banner']);
				}
				//rename file foto
				$nama_file = $foto->getRandomName();
				//jika valid
				$data = array(
					'id_banner'		=> $id_banner,
					'ket'			=> $this->request->getPost('ket'),
					'foto_banner'	=> $nama_file,
				);
				//memindah foto dar input ke folder foto di direktori
				$foto->move('banner', $nama_file);
				$this->ModelBanner->edit($data);
			}
			session()->setFlashdata('pesan', 'Data berhasil diupdate!');
			return redirect()->to(base_url('banner'));
		} else {
			//jika tidak valid
			session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('banner/edit/'. $id_banner));
		}
	}

	public function add()
	{
		$data = [
            'ket'    		=> $this->request->getPost('ket'),
            'foto_banner'	=> $this->request->getPost('foto_banner'),
		];

		$this->ModelBanner->add($data);
		session()->setFlashdata('pesan', 'Data Berhasil Ditambah.');
		return redirect()->to(base_url('banner'));
	}

	public function insert()
	{
		if ($this->validate([
			'ket'	=> [
				'label'	=> 'Keterangan',
				'rules'	=> 'required',
				'errors'=> [
					'required'	=> '{field} Wajib Diisi!',
				]
			],
			'foto_banner'	=> [
				'label'	=> 'Banner',
				'rules'	=> 'uploaded[foto_banner]|max_size[foto_banner,1024]|mime_in[foto_banner,image/png,image/jpeg,image/jpg,image/gif,image/ico]',
				'errors'=> [
					'required'	=> '{field} Wajib Diisi!',
					'max_size'	=> '{field} Max 1024 KB',
					'required'	=> 'Format {field} Wajib *.png, *.jpg, *.jpeg, *.gif, *.ico'
				]
			],
		])) {
			//mengambil file foto dari input
			$foto = $this->request->getFile('foto_banner');
			//rename foto
			$nama_file = $foto->getRandomName();
			//jika valid
			$data = array(
				'ket'			=> $this->request->getPost('ket'),
				'foto_banner'	=> $nama_file,
			);
			//memindah foto dar input ke folder foto di direktori
			$foto->move('banner', $nama_file);
			$this->ModelBanner->add($data);
			session()->setFlashdata('pesan', 'Data berhasil ditambahkan!');
			return redirect()->to(base_url('banner'));
		} else {
			//jika tidak valid
			session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('banner'));
		}
	}

	//--------------------------------------------------------------------

}
<?php namespace App\Controllers;

use App\Models\ModelAbout;

class About extends BaseController
{
	public function __construct()
	{
		helper('form');
		$this->ModelAbout = new ModelAbout();
	}
	
	public function index()
	{
		$data = [
			'title' => 'Tentang STAK-RRI',
			'about' => $this->ModelAbout->allData(),
			'isi'	=> 'admin/about_index'
		];
		return view('layout/wrapper', $data);
	}

	public function edit($id_desc)
	{
		$data = [
			'title' => 'Edit',
			'about' => $this->ModelAbout->detailData($id_desc),
			'isi'	=> 'admin/edit_about'
		];
		return view('layout/wrapper', $data);
	}

	public function update($id_desc)
	{
		if ($this->validate([
			'deskripsi'	=> [
				'label'	=> 'deskripsi',
				'rules'	=> 'required',
				'errors'=> [
					'required'	=> '{field} Wajib Diisi!',
				]
			],
			'prodi_stak'	=> [
				'label'	=> 'Program Studi',
				'rules'	=> 'required',
				'errors'=> [
					'required'	=> '{field} Wajib Diisi!',
				]
			],
			'gospel'	=> [
				'label'	=> 'gospel',
				'rules'	=> 'required',
				'errors'=> [
					'required'	=> '{field} Wajib Diisi!',
				]
			],
			'landasan'	=> [
				'label'	=> 'Landasan',
				'rules'	=> 'required',
				'errors'=> [
					'required'	=> '{field} Wajib Diisi!',
				]
			],
			'identitas_filosofi'	=> [
				'label'	=> 'Identitas dan Filosofi',
				'rules'	=> 'required',
				'errors'=> [
					'required'	=> '{field} Wajib Diisi!',
				]
			],
			'visi'	=> [
				'label'	=> 'Visi',
				'rules'	=> 'required',
				'errors'=> [
					'required'	=> '{field} Wajib Diisi!',
				]
			],
			'misi'	=> [
				'label'	=> 'Misi',
				'rules'	=> 'required',
				'errors'=> [
					'required'	=> '{field} Wajib Diisi!',
				]
			],
			'tujuan'	=> [
				'label'	=> 'Tujuan',
				'rules'	=> 'required',
				'errors'=> [
					'required'	=> '{field} Wajib Diisi!',
				]
			],
			'tujuan_tertinggi'	=> [
				'label'	=> 'Tujuan Tertinggi',
				'rules'	=> 'required',
				'errors'=> [
					'required'	=> '{field} Wajib Diisi!',
				]
			],
			'sasaran'	=> [
				'label'	=> 'Sasaran',
				'rules'	=> 'required',
				'errors'=> [
					'required'	=> '{field} Wajib Diisi!',
				]
			],
			'nilai_budaya'	=> [
				'label'	=> 'Nilai Budaya',
				'rules'	=> 'required',
				'errors'=> [
					'required'	=> '{field} Wajib Diisi!',
				]
			],
			'profil_lulusan'	=> [
				'label'	=> 'Profil Lulusan',
				'rules'	=> 'required',
				'errors'=> [
					'required'	=> '{field} Wajib Diisi!',
				]
			],
			'pendaftaran'	=> [
				'label'	=> 'Pendaftaran',
				'rules'	=> 'required',
				'errors'=> [
					'required'	=> '{field} Wajib Diisi!',
				]
			],
			'prosedur'	=> [
				'label'	=> 'Prosedur Pendaftaran',
				'rules'	=> 'required',
				'errors'=> [
					'required'	=> '{field} Wajib Diisi!',
				]
			],
			'biaya'	=> [
				'label'	=> 'Biaya Pendidikan',
				'rules'	=> 'required',
				'errors'=> [
					'required'	=> '{field} Wajib Diisi!',
				]
			],
		])) {
			//jika valid
			$data = array(
				'id_desc'			=> $id_desc,
				'deskripsi'			=> $this->request->getPost('deskripsi'),
				'prodi_stak'		=> $this->request->getPost('prodi_stak'),
				'gospel'			=> $this->request->getPost('gospel'),
				'landasan'			=> $this->request->getPost('landasan'),
				'identitas_filosofi'=> $this->request->getPost('identitas_filosofi'),
				'visi'				=> $this->request->getPost('visi'),
				'misi'				=> $this->request->getPost('misi'),
				'tujuan'			=> $this->request->getPost('tujuan'),
				'tujuan_tertinggi'	=> $this->request->getPost('tujuan_tertinggi'),
				'sasaran'			=> $this->request->getPost('sasaran'),
				'nilai_budaya'		=> $this->request->getPost('nilai_budaya'),
				'profil_lulusan'	=> $this->request->getPost('profil_lulusan'),
				'pendaftaran'		=> $this->request->getPost('pendaftaran'),
				'prosedur'			=> $this->request->getPost('prosedur'),
				'biaya'				=> $this->request->getPost('biaya'),
			);
			$this->ModelAbout->edit($data);
			session()->setFlashdata('pesan', 'Data berhasil diupdate!');
			return redirect()->to(base_url('about'));
			
		} else {
			//jika tidak valid
			session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('about'));
		}
	}

	//--------------------------------------------------------------------

}
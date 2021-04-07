<?php namespace App\Controllers;

use App\Models\ModelMhs;
use App\Models\ModelProdi;

class Mahasiswa extends BaseController
{
	public function __construct()
	{
		helper('form');
		$this->ModelMhs = new ModelMhs();
		$this->ModelProdi = new ModelProdi();
	}
	public function index()
	{
		$data = [
			'title' => 'Mahasiswa',
			'mhs' 	=> $this->ModelMhs->allData(),
			'isi'	=> 'admin/mahasiswa/mhs_index'
		];
		return view('layout/wrapper', $data);
	}

	public function add()
	{
		$data = [
			'title' => 'Tambah Data Mahasiswa',
			'prodi'	=> $this->ModelProdi->allData(),
			'isi'	=> 'admin/mahasiswa/add_mhs'
		];
		return view('layout/wrapper', $data);
	}

	public function rincian($id_mhs)
	{
		$data = [
			'title' => 'Detail Mahasiswa',
			'prodi'	=> $this->ModelProdi->allData(),
			'mhs'	=> $this->ModelMhs->detailData($id_mhs),
			'isi'	=> 'admin/mahasiswa/detail_mhs'
		];
		return view('layout/wrapper', $data);
	}

	public function insert()
	{
		if ($this->validate([
			'nim'	=> [
				'label'	=> 'NIM',
				'rules'	=> 'required',
				'errors'=> [
					'required'	=> '{field} Wajib Diisi!',
				]
			],
			'id_prodi'	=> [
				'label'	=> 'Program Studi',
				'rules'	=> 'required',
				'errors'=> [
					'required'	=> '{field} Wajib Diisi!'
				]
			],
			'nama_mhs'	=> [
				'label'	=> 'Nama Mahasiswa',
				'rules'	=> 'required',
				'errors'=> [
					'required'	=> '{field} Wajib Diisi!'
				]
			],
			'alamat'	=> [
				'label'	=> 'Alamat',
				'rules'	=> 'required',
				'errors'=> [
					'required'	=> '{field} Wajib Diisi!'
				]
			],
			'tmp_lahir'	=> [
				'label'	=> 'Tempat Lahir',
				'rules'	=> 'required',
				'errors'=> [
					'required'	=> '{field} Wajib Diisi!'
				]
			],
			'tgl_lahir'	=> [
				'label'	=> 'Tanggal Lahir',
				'rules'	=> 'required',
				'errors'=> [
					'required'	=> '{field} Wajib Diisi!'
				]
			],
			'gender'	=> [
				'label'	=> 'Jenis Kelamin',
				'rules'	=> 'required',
				'errors'=> [
					'required'	=> '{field} Wajib Diisi!'
				]
			],
			'email'	=> [
				'label'	=> 'Alamat E-Mail',
				'rules'	=> 'required',
				'errors'=> [
					'required'	=> '{field} Wajib Diisi!'
				]
			],
			'pass_mhs'	=> [
				'label'	=> 'Password',
				'rules'	=> 'required',
				'errors'=> [
					'required'	=> '{field} Wajib Diisi!'
				]
			],
			'foto_mhs'	=> [
				'label'	=> 'Foto Mahasiswa',
				'rules'	=> 'uploaded[foto_mhs]|max_size[foto_mhs,1024]|mime_in[foto_mhs,image/png,image/jpeg,image/jpg,image/gif,image/ico]',
				'errors'=> [
					'required'	=> '{field} Wajib Diisi!',
					'max_size'	=> '{field} Max 1024 KB',
					'required'	=> 'Format {field} Wajib *.png, *.jpg, *.jpeg, *.gif, *.ico'
				]
			],
		])) {
			//mengambil file foto dari input
			$foto = $this->request->getFile('foto_mhs');
			//rename foto
			$nama_file = $foto->getRandomName();
			//jika valid
			$data = array(
				'nim'			=> $this->request->getPost('nim'),
				'id_prodi'		=> $this->request->getPost('id_prodi'),
				'nama_mhs'		=> $this->request->getPost('nama_mhs'),
				'alamat'		=> $this->request->getPost('alamat'),
				'tmp_lahir'		=> $this->request->getPost('tmp_lahir'),
				'tgl_lahir'		=> $this->request->getPost('tgl_lahir'),
				'gender'		=> $this->request->getPost('gender'),
				'email'			=> $this->request->getPost('email'),
				'pass_mhs'		=> $this->request->getPost('pass_mhs'),
				'foto_mhs'		=> $nama_file,
			);
			//memindah foto dar input ke folder foto di direktori
			$foto->move('fotomhs', $nama_file);
			$this->ModelMhs->add($data);
			session()->setFlashdata('pesan', 'Data berhasil ditambahkan!');
			return redirect()->to(base_url('mahasiswa'));
		} else {
			//jika tidak valid
			session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('mahasiswa/add'));
		}
	}

	public function edit($id_mhs)
	{
		$data = [
			'title' => 'Edit Mahasiswa',
			'prodi'	=> $this->ModelProdi->allData(),
			'mhs'	=> $this->ModelMhs->detailData($id_mhs),
			'isi'	=> 'admin/mahasiswa/edit_mhs'
		];
		return view('layout/wrapper', $data);
	}

	public function update($id_mhs)
	{
		if ($this->validate([
			'nim'	=> [
				'label'	=> 'NIM',
				'rules'	=> 'required',
				'errors'=> [
					'required'	=> '{field} Wajib Diisi!',
				]
			],
			'id_prodi'	=> [
				'label'	=> 'Program Studi',
				'rules'	=> 'required',
				'errors'=> [
					'required'	=> '{field} Wajib Diisi!'
				]
			],
			'nama_mhs'	=> [
				'label'	=> 'Nama Mahasiswa',
				'rules'	=> 'required',
				'errors'=> [
					'required'	=> '{field} Wajib Diisi!'
				]
			],
			'alamat'	=> [
				'label'	=> 'Alamat',
				'rules'	=> 'required',
				'errors'=> [
					'required'	=> '{field} Wajib Diisi!'
				]
			],
			'tmp_lahir'	=> [
				'label'	=> 'Tempat Lahir',
				'rules'	=> 'required',
				'errors'=> [
					'required'	=> '{field} Wajib Diisi!'
				]
			],
			'tgl_lahir'	=> [
				'label'	=> 'Tanggal Lahir',
				'rules'	=> 'required',
				'errors'=> [
					'required'	=> '{field} Wajib Diisi!'
				]
			],
			'gender'	=> [
				'label'	=> 'Jenis Kelamin',
				'rules'	=> 'required',
				'errors'=> [
					'required'	=> '{field} Wajib Diisi!'
				]
			],
			'email'	=> [
				'label'	=> 'Alamat E-Mail',
				'rules'	=> 'required',
				'errors'=> [
					'required'	=> '{field} Wajib Diisi!'
				]
			],
			'foto_mhs'	=> [
				'label'	=> 'Foto Mahasiswa',
				'rules'	=> 'max_size[foto_mhs,1024]|mime_in[foto_mhs,image/png,image/jpeg,image/jpg,image/gif,image/ico]',
				'errors'=> [
					'max_size'	=> '{field} Max 1024 KB',
					'required'	=> 'Format {field} Wajib *.png, *.jpg, *.jpeg, *.gif, *.ico'
				]
			],
		])) {
			//mengambil file foto dari input
			$foto = $this->request->getFile('foto_mhs');
			if ($foto->getError() == 4) {
				//jika foto tidak ganti
				$data = array(
					'id_mhs'		=> $id_mhs,
					'nim'			=> $this->request->getPost('nim'),
					'id_prodi'		=> $this->request->getPost('id_prodi'),
					'nama_mhs'		=> $this->request->getPost('nama_mhs'),
					'alamat'		=> $this->request->getPost('alamat'),
					'tmp_lahir'		=> $this->request->getPost('tmp_lahir'),
					'tgl_lahir'		=> $this->request->getPost('tgl_lahir'),
					'gender'		=> $this->request->getPost('gender'),
					'email'			=> $this->request->getPost('email'),
				);
				$this->ModelMhs->edit($data);
			} else {
				//menghapus foto lama
				$mhs = $this->ModelDosen->detailData($id_mhs);
				if ($mhs['foto_mhs'] != "") {
					unlink('fotomhs/' . $mhs['foto_mhs']);
				}
				//rename file foto
				$nama_file = $foto->getRandomName();
				//jika valid
				$data = array(
					'id_mhs'		=> $id_mhs,
					'nim'			=> $this->request->getPost('nim'),
					'id_prodi'		=> $this->request->getPost('id_prodi'),
					'nama_mhs'		=> $this->request->getPost('nama_mhs'),
					'alamat'		=> $this->request->getPost('alamat'),
					'tmp_lahir'		=> $this->request->getPost('tmp_lahir'),
					'tgl_lahir'		=> $this->request->getPost('tgl_lahir'),
					'gender'		=> $this->request->getPost('gender'),
					'email'			=> $this->request->getPost('email'),
					'foto_mhs'		=> $nama_file,
				);
				//memindah foto dar input ke folder foto di direktori
				$foto->move('fotomhs', $nama_file);
				$this->ModelMhs->edit($data);
			}
			session()->setFlashdata('pesan', 'Data berhasil diupdate!');
			return redirect()->to(base_url('mahasiswa'));
		} else {
			//jika tidak valid
			session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('mahasiswa/edit/'. $id_mhs));
		}
	}

	public function delete($id_mhs)
	{
		$data = [
			'id_mhs'	=> $id_mhs,
		];

		$this->ModelMhs->delete_data($data);
		session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');
		return redirect()->to(base_url('mahasiswa'));
	}

	//--------------------------------------------------------------------

}
<?php namespace App\Controllers;

use App\Models\ModelDosen;
use App\Models\ModelJabatan;

class Dosen extends BaseController
{
	public function __construct()
	{
		helper('form');
		$this->ModelDosen 	= new ModelDosen();
		$this->ModelJabatan = new ModelJabatan();
	}
	public function index()
	{
		$data = [
			'title' 	=> 'Dosen',
			'dosen' 	=> $this->ModelDosen->allData(),
			'jabatan' 	=> $this->ModelJabatan->allData(),
			'isi'		=> 'admin/dosen/dosen_index'
		];
		return view('layout/wrapper', $data);
	}

	public function add()
	{
		$data = [
			'title' 	=> 'Tambah Data Dosen',
			'jabatan' 	=> $this->ModelJabatan->allData(),
			'isi'		=> 'admin/dosen/add_dosen'
		];
		return view('layout/wrapper', $data);
	}

	public function rincian($id_dosen)
	{
		$data = [
			'title' 	=> 'Dosen',
			'jabatan' 	=> $this->ModelJabatan->allData(),
			'dosen' 	=> $this->ModelDosen->allDataDosen($id_dosen),
			'isi'		=> 'admin/dosen/detail_dosen'
		];
		return view('layout/wrapper', $data);
	}
	
	public function detail($id_dosen)
	{
		$data = [
			'title' => 'Dosen',
			'dosen' => $this->ModelDosen->detailData($id_dosen),
			'isi'	=> 'admin/makul/edit_dosen'
		];
		return view('layout/wrapper', $data);
	}

	public function insert()
	{
		if ($this->validate([
			'kode_dosen'	=> [
				'label'	=> 'Kode Dosen',
				'rules'	=> 'required',
				'errors'=> [
					'required'	=> '{field} Wajib Diisi!',
				]
			],
			'nidn'	=> [
				'label'	=> 'NIDN',
				'rules'	=> 'required',
				'errors'=> [
					'required'	=> '{field} Wajib Diisi!'
				]
			],
			'nama_dosen'	=> [
				'label'	=> 'Nama Dosen',
				'rules'	=> 'required',
				'errors'=> [
					'required'	=> '{field} Wajib Diisi!'
				]
			],
			'id_jabatan'	=> [
				'label'	=> 'Jabatan',
				'rules'	=> 'required',
				'errors'=> [
					'required'	=> '{field} Wajib Diisi!'
				]
			],
			'pend_akhir'	=> [
				'label'	=> 'Pendidikan Terakhir',
				'rules'	=> 'required',
				'errors'=> [
					'required'	=> '{field} Wajib Diisi!'
				]
			],
			'prodi_pend'	=> [
				'label'	=> 'Program Studi',
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
			'tempat_lahir'	=> [
				'label'	=> 'Tempat Lahir',
				'rules'	=> 'required',
				'errors'=> [
					'required'	=> '{field} Wajib Diisi!'
				]
			],
			'tanggal_lahir'	=> [
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
			'pass_dosen'	=> [
				'label'	=> 'Password',
				'rules'	=> 'required',
				'errors'=> [
					'required'	=> '{field} Wajib Diisi!'
				]
			],
			'foto_dosen'	=> [
				'label'	=> 'Foto Dosen',
				'rules'	=> 'uploaded[foto_dosen]|max_size[foto_dosen,1024]|mime_in[foto_dosen,image/png,image/jpeg,image/jpg,image/gif,image/ico]',
				'errors'=> [
					'required'	=> '{field} Wajib Diisi!',
					'max_size'	=> '{field} Max 1024 KB',
					'required'	=> 'Format {field} Wajib *.png, *.jpg, *.jpeg, *.gif, *.ico'
				]
			],
		])) {
			//mengambil file foto dari input
			$foto = $this->request->getFile('foto_dosen');
			//rename foto
			$nama_file = $foto->getRandomName();
			//jika valid
			$data = array(
				'kode_dosen'	=> $this->request->getPost('kode_dosen'),
				'nidn'			=> $this->request->getPost('nidn'),
				'nama_dosen'	=> $this->request->getPost('nama_dosen'),
				'id_jabatan'	=> $this->request->getPost('id_jabatan'),
				'pend_akhir'	=> $this->request->getPost('pend_akhir'),
				'prodi_pend'	=> $this->request->getPost('prodi_pend'),
				'alamat'		=> $this->request->getPost('alamat'),
				'tempat_lahir'	=> $this->request->getPost('tempat_lahir'),
				'tanggal_lahir'	=> $this->request->getPost('tanggal_lahir'),
				'gender'		=> $this->request->getPost('gender'),
				'email'			=> $this->request->getPost('email'),
				'pass_dosen'	=> $this->request->getPost('pass_dosen'),
				'foto_dosen'	=> $nama_file,
			);
			//memindah foto dar input ke folder foto di direktori
			$foto->move('fotodosen', $nama_file);
			$this->ModelDosen->add($data);
			session()->setFlashdata('pesan', 'Data berhasil ditambahkan!');
			return redirect()->to(base_url('dosen'));
		} else {
			//jika tidak valid
			session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('dosen/add'));
		}
	}

	public function edit($id_dosen)
	{
		$data = [
			'title' 	=> 'Edit Data Dosen',
			'jabatan' 	=> $this->ModelJabatan->allData(),
			'dosen' 	=> $this->ModelDosen->detailData($id_dosen),
			'isi'		=> 'admin/dosen/edit_dosen'
		];
		return view('layout/wrapper', $data);
	}

	public function update($id_dosen)
	{
		if ($this->validate([
			'kode_dosen'	=> [
				'label'	=> 'Kode Dosen',
				'rules'	=> 'required',
				'errors'=> [
					'required'	=> '{field} Wajib Diisi!',
				]
			],
			'nidn'	=> [
				'label'	=> 'NIDN',
				'rules'	=> 'required',
				'errors'=> [
					'required'	=> '{field} Wajib Diisi!'
				]
			],
			'nama_dosen'	=> [
				'label'	=> 'Nama Dosen',
				'rules'	=> 'required',
				'errors'=> [
					'required'	=> '{field} Wajib Diisi!'
				]
			],
			'id_jabatan'	=> [
				'label'	=> 'Jabatan',
				'rules'	=> 'required',
				'errors'=> [
					'required'	=> '{field} Wajib Diisi!'
				]
			],
			'pend_akhir'	=> [
				'label'	=> 'Pendidikan Terakhir',
				'rules'	=> 'required',
				'errors'=> [
					'required'	=> '{field} Wajib Diisi!'
				]
			],
			'prodi_pend'	=> [
				'label'	=> 'Program Studi',
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
			'tempat_lahir'	=> [
				'label'	=> 'Tempat Lahir',
				'rules'	=> 'required',
				'errors'=> [
					'required'	=> '{field} Wajib Diisi!'
				]
			],
			'tanggal_lahir'	=> [
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
			'foto_dosen'	=> [
				'label'	=> 'Foto Dosen',
				'rules'	=> 'max_size[foto_dosen,1024]|mime_in[foto_dosen,image/png,image/jpeg,image/jpg,image/gif,image/ico]',
				'errors'=> [
					'max_size'	=> '{field} Max 1024 KB',
					'required'	=> 'Format {field} Wajib *.png, *.jpg, *.jpeg, *.gif, *.ico'
				]
			],
		])) {
			//mengambil file foto dari form input
			$foto = $this->request->getFile('foto_dosen');
			if ($foto->getError() == 4) {
				//jika tidak ganti foto
				$data = array(
					'id_dosen'		=> $id_dosen,
					'kode_dosen'	=> $this->request->getPost('kode_dosen'),
					'nidn'			=> $this->request->getPost('nidn'),
					'nama_dosen'	=> $this->request->getPost('nama_dosen'),
					'id_jabatan'	=> $this->request->getPost('id_jabatan'),
					'pend_akhir'	=> $this->request->getPost('pend_akhir'),
					'prodi_pend'	=> $this->request->getPost('prodi_pend'),
					'alamat'		=> $this->request->getPost('alamat'),
					'tempat_lahir'	=> $this->request->getPost('tempat_lahir'),
					'tanggal_lahir'	=> $this->request->getPost('tanggal_lahir'),
					'gender'		=> $this->request->getPost('gender'),
					'email'			=> $this->request->getPost('email'),
				);
				$this->ModelDosen->edit($data);
			} else {
				//menghapus foto lama
				$dosen = $this->ModelDosen->detailData($id_dosen);
				if ($dosen['foto_dosen'] != "") {
					unlink('fotodosen/' . $dosen['foto_dosen']);
				}
				//rename file foto
				$nama_file = $foto->getRandomName();
				//jika valid
				$data = array(
					'id_dosen'		=> $id_dosen,
					'kode_dosen'	=> $this->request->getPost('kode_dosen'),
					'nidn'			=> $this->request->getPost('nidn'),
					'nama_dosen'	=> $this->request->getPost('nama_dosen'),
					'id_jabatan'	=> $this->request->getPost('id_jabatan'),
					'pend_akhir'	=> $this->request->getPost('pend_akhir'),
					'prodi_pend'	=> $this->request->getPost('prodi_pend'),
					'alamat'		=> $this->request->getPost('alamat'),
					'tempat_lahir'	=> $this->request->getPost('tempat_lahir'),
					'tanggal_lahir'	=> $this->request->getPost('tanggal_lahir'),
					'gender'		=> $this->request->getPost('gender'),
					'email'			=> $this->request->getPost('email'),
					'foto_dosen'	=> $nama_file,
				);
				//memindahkan file foto dari form input ke folder foto di direktori
				$foto->move('fotodosen', $nama_file);
				$this->ModelDosen->edit($data);
			}
			session()->setFlashdata('pesan', 'Data berhasil diupdate!');
			return redirect()->to(base_url('dosen'));
		} else {
			//jika tidak valid
			session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('dosen/edit/'. $id_dosen));
		}
	}

	public function delete($id_dosen)
	{
		$data = [
			'id_dosen'	=> $id_dosen,
		];

		$this->ModelDosen->delete_data($data);
		session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');
		return redirect()->to(base_url('dosen'));
	}

	//--------------------------------------------------------------------

}
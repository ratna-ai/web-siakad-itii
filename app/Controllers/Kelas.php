<?php namespace App\Controllers;

use App\Models\ModelKelas;
use App\Models\ModelDosen;
use App\Models\ModelProdi;

class Kelas extends BaseController
{
    public function __construct()
    {
        $this->ModelKelas = new ModelKelas();
		$this->ModelDosen = new ModelDosen();
		$this->ModelProdi = new ModelProdi();
        helper('form');
    }
    
    public function index()
	{
		$data = [
            'title' => 'Kelas',
            'kelas' => $this->ModelKelas->allData(),
            'dosen' => $this->ModelDosen->allData(),
            'prodi' => $this->ModelProdi->allData(),
			'isi'	=> 'admin/kelas/kelas_index'
		];
		return view('layout/wrapper', $data);
    }
    
    public function add()
    {
        if ($this->validate([
			'nama_kelas'	=> [
				'label'	=> 'Nama Kelas',
				'rules'	=> 'required',
				'errors'=> [
					'required'	=> '{field} Wajib Diisi!',
				]
			],
			'id_prodi'	=> [
				'label'	=> 'Program Studi',
				'rules'	=> 'required',
				'errors'=> [
					'required'	=> '{field	} Wajib Diisi!'
				]
			],
			'id_dosen'	=> [
				'label'	=> 'Nama Dosen',
				'rules'	=> 'required',
				'errors'=> [
					'required'	=> '{field} Wajib Diisi!'
				]
			],
			'angkatan'	=> [
				'label'	=> 'Angkatan',
				'rules'	=> 'required',
				'errors'=> [
					'required'	=> '{field} Wajib Diisi!'
				]
			],
		])) {
            //jika data valid
            $data = [
                'nama_kelas'    => $this->request->getPost('nama_kelas'),
                'id_prodi'      => $this->request->getPost('id_prodi'),
                'id_dosen'      => $this->request->getPost('id_dosen'),
                'angkatan'      => $this->request->getPost('angkatan'),
            ];
            $this->ModelKelas->add($data);
            session()->setFlashdata('pesan', 'Data Berhasil Ditambah!');
            return redirect()->to(base_url('kelas'));
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('kelas'));
        }
    }

    public function delete($id_kelas)
    {
        $data = [
			'id_kelas'	=> $id_kelas,
		];

		$this->ModelKelas->delete_data($data);
		session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');
		return redirect()->to(base_url('kelas'));
	}
	
	public function mahasiswa($id_kelas)
	{
		$data = [
            'title' 	=> 'Kelas',
			'kelas'		=> $this->ModelKelas->detail($id_kelas),
			'mhs'		=> $this->ModelKelas->dataMahasiswa($id_kelas),
			'jml'		=> $this->ModelKelas->jml_mhs($id_kelas),
			'data_mhs'	=> $this->ModelKelas->data_mhs(),
			'isi'		=> 'admin/kelas/kelas_detail'
		];
		return view('layout/wrapper', $data);
	}

	public function add_anggota_kelas($id_mhs, $id_kelas)
	{
		$data = [
			'id_mhs'	=> $id_mhs,
			'id_kelas'	=> $id_kelas
		];

		$this->ModelKelas->update_mhs($data);
		session()->setFlashdata('pesan', 'Mahasiswa Berhasil Ditambahkan ke dalam kelas.');
		return redirect()->to(base_url('kelas/mahasiswa/'. $id_kelas));
	}

	public function remove_anggota_kelas($id_mhs, $id_kelas)
	{
		$data = [
			'id_mhs'	=> $id_mhs,
			'id_kelas'	=> null
		];

		$this->ModelKelas->update_mhs($data);
		session()->setFlashdata('pesan', 'Mahasiswa Berhasil Dihapus dari kelas!');
		return redirect()->to(base_url('kelas/mahasiswa/'. $id_kelas));
	}
	//--------------------------------------------------------------------

}
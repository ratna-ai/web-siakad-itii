<?php namespace App\Controllers;

use App\Models\ModelBooks;

class Books extends BaseController
{
	public function __construct()
	{
		helper('form');
		$this->ModelBooks = new ModelBooks();
	}
	
	public function index()
	{
		$data = [
			'title' => 'Buku',
			'books' => $this->ModelBooks->allData(),
			'isi'	=> 'admin/books/books_index'
		];
		return view('layout/wrapper', $data);
	}

	public function add()
	{
		$data = [
			'title' => 'Tambah Data Buku',
			'isi'	=> 'admin/books/add_books'
		];
		return view('layout/wrapper', $data);
	}

	public function rincian($id_buku)
	{
		$data = [
			'title' => 'Buku',
			'books' => $this->ModelBooks->allDataBuku($id_buku),
			'isi'	=> 'admin/books/detail_books'
		];
		return view('layout/wrapper', $data);
	}
	
	public function detail($id_buku)
	{
		$data = [
			'title' => 'Buku',
			'books' => $this->ModelBooks->detailData($id_buku),
			'isi'	=> 'admin/makul/edit_books'
		];
		return view('layout/wrapper', $data);
	}

	public function insert()
	{
		if ($this->validate([
			'kode_buku'	=> [
				'label'	=> 'Kode Buku',
				'rules'	=> 'required',
				'errors'=> [
					'required'	=> '{field} Wajib Diisi!',
				]
			],
			'judul'	=> [
				'label'	=> 'Judul Buku',
				'rules'	=> 'required',
				'errors'=> [
					'required'	=> '{field} Wajib Diisi!'
				]
			],
			'penulis'	=> [
				'label'	=> 'Penulis',
				'rules'	=> 'required',
				'errors'=> [
					'required'	=> '{field} Wajib Diisi!'
				]
			],
			'penerbit'	=> [
				'label'	=> 'Penerbit',
				'rules'	=> 'required',
				'errors'=> [
					'required'	=> '{field} Wajib Diisi!'
				]
			],
			'tgl_publish'	=> [
				'label'	=> 'Tanggal Publish',
				'rules'	=> 'required',
				'errors'=> [
					'required'	=> '{field} Wajib Diisi!'
				]
			],
			'tgl_entry'	=> [
				'label'	=> 'Tanggal Entry',
				'rules'	=> 'required',
				'errors'=> [
					'required'	=> '{field} Wajib Diisi!'
				]
			],
			'isi_buku'	=> [
				'label'	=> 'Isi',
				'rules'	=> 'required',
				'errors'=> [
					'required'	=> '{field} Wajib Diisi!'
				]
			],
			'foto_buku'	=> [
				'label'	=> 'Cover Buku',
				'rules'	=> 'uploaded[foto_buku]|max_size[foto_buku,1024]|mime_in[foto_buku,image/png,image/jpeg,image/jpg,image/gif,image/ico]',
				'errors'=> [
					'required'	=> '{field} Wajib Diisi!',
					'max_size'	=> '{field} Max 1024 KB',
					'required'	=> 'Format {field} Wajib *.png, *.jpg, *.jpeg, *.gif, *.ico'
				]
			],
		])) {
			//mengambil file foto dari input
			$foto = $this->request->getFile('foto_buku');
			//rename foto
			$nama_file = $foto->getRandomName();
			//jika valid
			$data = array(
				'kode_buku'		=> $this->request->getPost('kode_buku'),
				'judul'			=> $this->request->getPost('judul'),
				'penulis'		=> $this->request->getPost('penulis'),
				'penerbit'		=> $this->request->getPost('penerbit'),
				'tgl_publish'	=> $this->request->getPost('tgl_publish'),
				'tgl_entry'		=> $this->request->getPost('tgl_entry'),
				'isi_buku'		=> $this->request->getPost('isi_buku'),
				'foto_buku'		=> $nama_file,
			);
			//memindah foto dar input ke folder foto di direktori
			$foto->move('fotobuku', $nama_file);
			$this->ModelBooks->add($data);
			session()->setFlashdata('pesan', 'Data berhasil ditambahkan!');
			return redirect()->to(base_url('books'));
		} else {
			//jika tidak valid
			session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('books/add'));
		}
	}

	public function edit($id_buku)
	{
		$data = [
			'title' => 'Edit Data Buku',
			'books' => $this->ModelBooks->detailData($id_buku),
			'isi'	=> 'admin/books/edit_books'
		];
		return view('layout/wrapper', $data);
	}

	public function update($id_buku)
	{
		if ($this->validate([
			'kode_buku'	=> [
				'label'	=> 'Kode Buku',
				'rules'	=> 'required',
				'errors'=> [
					'required'	=> '{field} Wajib Diisi!',
				]
			],
			'judul'	=> [
				'label'	=> 'Judul Buku',
				'rules'	=> 'required',
				'errors'=> [
					'required'	=> '{field} Wajib Diisi!'
				]
			],
			'penulis'	=> [
				'label'	=> 'Penulis',
				'rules'	=> 'required',
				'errors'=> [
					'required'	=> '{field} Wajib Diisi!'
				]
			],
			'penerbit'	=> [
				'label'	=> 'Penerbit',
				'rules'	=> 'required',
				'errors'=> [
					'required'	=> '{field} Wajib Diisi!'
				]
			],
			'tgl_publish'	=> [
				'label'	=> 'Tanggal Publish',
				'rules'	=> 'required',
				'errors'=> [
					'required'	=> '{field} Wajib Diisi!'
				]
			],
			'tgl_entry'	=> [
				'label'	=> 'Tanggal Entry',
				'rules'	=> 'required',
				'errors'=> [
					'required'	=> '{field} Wajib Diisi!'
				]
			],
			'isi_buku'	=> [
				'label'	=> 'Isi',
				'rules'	=> 'required',
				'errors'=> [
					'required'	=> '{field} Wajib Diisi!'
				]
			],
			'foto_buku'	=> [
				'label'	=> 'Cover Buku',
				'rules'	=> 'max_size[foto_buku,1024]|mime_in[foto_buku,image/png,image/jpeg,image/jpg,image/gif,image/ico]',
				'errors'=> [
					'max_size'	=> '{field} Max 1024 KB',
					'required'	=> 'Format {field} Wajib *.png, *.jpg, *.jpeg, *.gif, *.ico'
				]
			],
		])) {
			//mengambil file foto dari form input
			$foto = $this->request->getFile('foto_buku');
			if ($foto->getError() == 4) {
				//jika tidak ganti foto
				$data = array(
					'id_buku'		=> $id_buku,
					'kode_buku'		=> $this->request->getPost('kode_buku'),
					'judul'			=> $this->request->getPost('judul'),
					'penulis'		=> $this->request->getPost('penulis'),
					'penerbit'		=> $this->request->getPost('penerbit'),
					'tgl_publish'	=> $this->request->getPost('tgl_publish'),
					'tgl_entry'		=> $this->request->getPost('tgl_entry'),
					'isi_buku'		=> $this->request->getPost('isi_buku'),
				);
				$this->ModelBooks->edit($data);
			} else {
				//menghapus foto lama
				$books = $this->ModelBooks->detailData($id_buku);
				if ($books['foto_buku'] != "") {
					unlink('fotobuku/' . $books['foto_buku']);
				}
				//rename file foto
				$nama_file = $foto->getRandomName();
				//jika valid
				$data = array(
					'id_buku'		=> $id_buku,
					'kode_buku'		=> $this->request->getPost('kode_buku'),
					'judul'			=> $this->request->getPost('judul'),
					'penulis'		=> $this->request->getPost('penulis'),
					'penerbit'		=> $this->request->getPost('penerbit'),
					'tgl_publish'	=> $this->request->getPost('tgl_publish'),
					'tgl_entry'		=> $this->request->getPost('tgl_entry'),
					'isi_buku'		=> $this->request->getPost('isi_buku'),
					'foto_buku'		=> $nama_file,
				);
				//memindahkan file foto dari form input ke folder foto di direktori
				$foto->move('fotobuku', $nama_file);
				$this->ModelBooks->edit($data);
			}
			session()->setFlashdata('pesan', 'Data berhasil diupdate!');
			return redirect()->to(base_url('books'));
		} else {
			//jika tidak valid
			session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('books/edit/'. $id_buku));
		}
	}

	public function delete($id_buku)
	{
		$data = [
			'id_buku'	=> $id_buku,
		];

		$this->ModelBooks->delete_data($data);
		session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');
		return redirect()->to(base_url('books'));
	}

	//--------------------------------------------------------------------

}
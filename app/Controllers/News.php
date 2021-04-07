<?php namespace App\Controllers;

use App\Models\ModelNews;
class News extends BaseController
{
	public function __construct()
	{
		helper('form');
		$this->ModelNews = new ModelNews();
	}
	public function index()
	{
		$data = [
			'title' => 'Berita',
			'news' => $this->ModelNews->allData(),
			'isi'	=> 'admin/news/news_index'
		];
		return view('layout/wrapper', $data);
	}

	public function add()
	{
		$data = [
			'title' => 'Tambah Data Berita',
			'isi'	=> 'admin/news/add_news'
		];
		return view('layout/wrapper', $data);
	}

	public function rincian($id_news)
	{
		$data = [
			'title' => 'Berita',
			'news' 	=> $this->ModelNews->allDataNews($id_news),
			'isi'	=> 'admin/news/detail_news'
		];
		return view('layout/wrapper', $data);
	}
	
	public function detail($id_news)
	{
		$data = [
			'title' => 'Berita',
			'news' 	=> $this->ModelNews->detailData($id_news),
			'isi'	=> 'admin/news/edit_news'
		];
		return view('layout/wrapper', $data);
	}

	public function insert()
	{
		if ($this->validate([
			'kode_news'	=> [
				'label'	=> 'Kode Berita',
				'rules'	=> 'required',
				'errors'=> [
					'required'	=> '{field} Wajib Diisi!',
				]
			],
			'judul_news'	=> [
				'label'	=> 'Judul Berita',
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
			'tgl_entry'	=> [
				'label'	=> 'Tanggal Entry',
				'rules'	=> 'required',
				'errors'=> [
					'required'	=> '{field} Wajib Diisi!'
				]
			],
			'isi_news'	=> [
				'label'	=> 'Isi Berita',
				'rules'	=> 'required',
				'errors'=> [
					'required'	=> '{field} Wajib Diisi!'
				]
			],
			'dokumentasi'	=> [
				'label'	=> 'Foto',
				'rules'	=> 'uploaded[dokumentasi]|max_size[dokumentasi,1024]|mime_in[dokumentasi,image/png,image/jpeg,image/jpg,image/gif,image/ico]',
				'errors'=> [
					'required'	=> '{field} Wajib Diisi!',
					'max_size'	=> '{field} Max 1024 KB',
					'required'	=> 'Format {field} Wajib *.png, *.jpg, *.jpeg, *.gif, *.ico'
				]
			],
		])) {
			//mengambil file foto dari input
			$foto = $this->request->getFile('dokumentasi');
			//rename foto
			$nama_file = $foto->getRandomName();
			//jika valid
			$data = array(
				'kode_news'		=> $this->request->getPost('kode_news'),
				'judul_news'	=> $this->request->getPost('judul_news'),
				'penulis'		=> $this->request->getPost('penulis'),
				'tgl_entry'		=> $this->request->getPost('tgl_entry'),
				'isi_news'		=> $this->request->getPost('isi_news'),
				'dokumentasi'	=> $nama_file,
			);
			//memindah foto dar input ke folder foto di direktori
			$foto->move('fotonews', $nama_file);
			$this->ModelNews->add($data);
			session()->setFlashdata('pesan', 'Data berhasil ditambahkan!');
			return redirect()->to(base_url('news'));
		} else {
			//jika tidak valid
			session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('news/add'));
		}
	}

	public function edit($id_news)
	{
		$data = [
			'title' => 'Edit Data Berita',
			'news'	=> $this->ModelNews->detailData($id_news),
			'isi'	=> 'admin/news/edit_news'
		];
		return view('layout/wrapper', $data);
	}

	public function update($id_news)
	{
		if ($this->validate([
			'kode_news'	=> [
				'label'	=> 'Kode Berita',
				'rules'	=> 'required',
				'errors'=> [
					'required'	=> '{field} Wajib Diisi!',
				]
			],
			'judul_news'	=> [
				'label'	=> 'Judul Berita',
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
			'tgl_entry'	=> [
				'label'	=> 'Tanggal Entry',
				'rules'	=> 'required',
				'errors'=> [
					'required'	=> '{field} Wajib Diisi!'
				]
			],
			'isi_news'	=> [
				'label'	=> 'Isi Berita',
				'rules'	=> 'required',
				'errors'=> [
					'required'	=> '{field} Wajib Diisi!'
				]
			],
			'dokumentasi'	=> [
				'label'	=> 'Foto',
				'rules'	=> 'max_size[dokumentasi,1024]|mime_in[dokumentasi,image/png,image/jpeg,image/jpg,image/gif,image/ico]',
				'errors'=> [
					'max_size'	=> '{field} Max 1024 KB',
					'required'	=> 'Format {field} Wajib *.png, *.jpg, *.jpeg, *.gif, *.ico'
				]
			],
		])) {
			//mengambil file foto dari form input
			$foto = $this->request->getFile('dokumentasi');
			if ($foto->getError() == 4) {
				//jika tidak ganti foto
				$data = array(
					'id_news'		=> $id_news,
					'kode_news'		=> $this->request->getPost('kode_news'),
					'judul_news'	=> $this->request->getPost('judul_news'),
					'penulis'		=> $this->request->getPost('penulis'),
					'tgl_entry'		=> $this->request->getPost('tgl_entry'),
					'isi_news'		=> $this->request->getPost('isi_news'),
				);
				$this->ModelNews->edit($data);
			} else {
				//menghapus foto lama
				$news = $this->ModelNews->detailData($id_news);
				if ($news['dokumentasi'] != "") {
					unlink('fotonews/' . $news['dokumentasi']);
				}
				//rename file foto
				$nama_file = $foto->getRandomName();
				//jika valid
				$data = array(
					'id_news'		=> $id_news,
					'kode_news'		=> $this->request->getPost('kode_news'),
					'judul_news'	=> $this->request->getPost('judul_news'),
					'penulis'		=> $this->request->getPost('penulis'),
					'tgl_entry'		=> $this->request->getPost('tgl_entry'),
					'isi_news'		=> $this->request->getPost('isi_news'),
					'dokumentasi'	=> $nama_file,
				);
				//memindahkan file foto dari form input ke folder foto di direktori
				$foto->move('fotonews', $nama_file);
				$this->ModelNews->edit($data);
			}
			session()->setFlashdata('pesan', 'Data berhasil diupdate!');
			return redirect()->to(base_url('news'));
		} else {
			//jika tidak valid
			session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('news/edit/'. $id_news));
		}
	}

	public function delete($id_news)
	{
		$data = [
			'id_news'	=> $id_news,
		];

		$this->ModelNews->delete_data($data);
		session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');
		return redirect()->to(base_url('news'));
	}

	//--------------------------------------------------------------------

}
<?php namespace App\Controllers;

use App\Models\ModelAbout;
use App\Models\ModelNews;
use App\Models\ModelBooks;
use App\Models\ModelHeadline;

class Home extends BaseController
{
	public function __construct()
	{
		helper('form');
		$this->ModelAbout = new ModelAbout();
		$this->ModelNews = new ModelNews();
		$this->ModelBooks = new ModelBooks();
		$this->ModelHeadline = new ModelHeadline();
	}
	
	public function index()
	{
		$data = [
			'title' 	=> 'Home',
            'about'     => $this->ModelAbout->allData(),
            'news'	    => $this->ModelNews->allData(),
            'books'	    => $this->ModelBooks->allData(),
            'headline'  => $this->ModelHeadline->allData(),
			'isi'		=> 'home'
		];
		return view('home.php', $data);
	}

	public function detail_buku($id_buku)
	{
		$data = [
			'title' => 'Buku',
			'books' => $this->ModelBooks->allDataBuku($id_buku)
		];
		return view('detail_buku', $data);
	}
	public function detail_berita($id_news)
	{
		$data = [
			'title' => 'Berita',
			'news'	=> $this->ModelNews->allDataNews($id_news)
		];
		return view('detail_berita', $data);
	}

	//--------------------------------------------------------------------

}

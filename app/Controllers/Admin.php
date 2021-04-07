<?php 

namespace App\Controllers;

use App\Models\ModelAdmin;

class Admin extends BaseController
{
	public function __construct()
	{
		$this->ModelAdmin = new ModelAdmin();
	}
	
	public function index()
	{
		$data = [
			'title' 		=> 'Admin',
			'jml_buku'		=> $this->ModelAdmin->jml_buku(),
			'jml_news'		=> $this->ModelAdmin->jml_news(),
			'jml_dosen'		=> $this->ModelAdmin->jml_dosen(),
			'jml_mhs'		=> $this->ModelAdmin->jml_mhs(),
			'isi'			=> 'admin'
		];
		return view('layout/wrapper', $data);
	}

	//--------------------------------------------------------------------

}
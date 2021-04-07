<?php namespace App\Controllers;

use App\Models\ModelAbout;

class Pendaftaran extends BaseController
{
	public function __construct()
	{
		helper('form');
		$this->ModelAbout = new ModelAbout();
	}
	
	public function index()
	{
		$data = [
			'title' 	=> 'STAK-RRI',
            'about'     => $this->ModelAbout->allData()
		];
		return view('pendaftaran.php', $data);
	}

	//--------------------------------------------------------------------

}

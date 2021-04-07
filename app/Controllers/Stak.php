<?php namespace App\Controllers;

use App\Models\ModelAbout;
use App\Models\ModelDosen;

class Stak extends BaseController
{
	public function __construct()
	{
		helper('form');
		$this->ModelAbout = new ModelAbout();
		$this->ModelDosen = new ModelDosen();
	}
	
	public function index()
	{
		$data = [
			'title' 	=> 'STAK-RRI',
            'about'     => $this->ModelAbout->allData(),
            'dosen'     => $this->ModelDosen->allData()
		];
		return view('stak.php', $data);
	}

	//--------------------------------------------------------------------

}

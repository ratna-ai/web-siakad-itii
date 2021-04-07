<?php namespace App\Controllers;

use App\Models\ModelAbout;
use App\Models\ModelDosen;

class Itii extends BaseController
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
			'title' 	=> 'ITII/YTII',
            'about'     => $this->ModelAbout->allData(),
            'dosen'     => $this->ModelDosen->allData()
		];
		return view('itii.php', $data);
	}

	//--------------------------------------------------------------------

}

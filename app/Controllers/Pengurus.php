<?php namespace App\Controllers;

use App\Models\ModelDosen;

class Pengurus extends BaseController
{
	public function __construct()
	{
		helper('form');
		$this->ModelDosen = new ModelDosen();
	}
	
	public function index()
	{
		$data = [
			'title' 	=> 'STAK-RRI',
            'dosen'     => $this->ModelDosen->allData()
		];
		return view('pengurus.php', $data);
	}

	//--------------------------------------------------------------------

}

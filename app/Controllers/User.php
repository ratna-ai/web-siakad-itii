<?php namespace App\Controllers;

use App\Models\ModelUser;
class User extends BaseController
{
	public function __construct()
	{
		helper('form');
		$this->ModelUser = new ModelUser();
	}
	
	public function index()
	{
		$data = [
            'title' => 'User',
            'user'  => $this->ModelUser->allData(),
			'isi'	=> 'admin/user_index'
		];
		return view('layout/wrapper', $data);
	}
	//--------------------------------------------------------------------

}
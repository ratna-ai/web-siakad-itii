<?php namespace Config;

use CodeIgniter\Config\BaseConfig;

class Filters extends BaseConfig
{
	// Makes reading things below nicer,
	// and simpler to change out script that's used.
	public $aliases = [
		'csrf'     		=> \CodeIgniter\Filters\CSRF::class,
		'toolbar'  		=> \CodeIgniter\Filters\DebugToolbar::class,
		'honeypot' 		=> \CodeIgniter\Filters\Honeypot::class,
		'filteradmin' 	=> \App\Filters\FilterAdmin::class, 
		'filtermhs' 	=> \App\Filters\FilterMhs::class, 
		'filterdosen' 	=> \App\Filters\FilterDosen::class, 
	];

	// Always applied before every request
	public $globals = [
		'before' => [
			'filteradmin' => [ 'except' => [
					'auth', 'auth/*',
					'home', 'home/*',
					'itii', 'itii/*',
					'stak', 'stak/*',
					'pendaftaran', 'pendaftaran/*',
					'/'
				]
			],
			'filtermhs' => [ 'except' => [
					'auth', 'auth/*',
					'home', 'home/*',
					'itii', 'itii/*',
					'stak', 'stak/*',
					'pendaftaran', 'pendaftaran/*',
					'/'
				]
			],
			'filterdosen' => [ 'except' => [
					'auth', 'auth/*',
					'home', 'home/*',
					'itii', 'itii/*',
					'stak', 'stak/*',
					'pendaftaran', 'pendaftaran/*',
					'/'
				]
			],
			//'honeypot'
			// 'csrf',
		],
		'after'  => [
			'filteradmin' => [ 'except' => [
					'admin', 'admin/*',
					'home', 'home/*',
					'itii', 'itii/*',
					'stak', 'stak/*',
					'pendaftaran', 'pendaftaran/*',
					'/',
					'prodi', 'prodi/*',
					'ta', 'ta/*',
					'makul', 'makul/*',
					'news', 'news/*',
					'books', 'books/*',
					'dosen', 'dosen/*',
					'mahasiswa', 'mahasiswa/*',
					'jabatan', 'jabatan/*',
					'about', 'about/*',
					'user', 'user/*',
					'kelas', 'kelas/*',
					'setting', 'setting/*',
					'jadwalkuliah', 'jadwalkuliah/*',
					'headline', 'headline/*',
				]
			],
			'filtermhs' => [ 'except' => [
					'mhs', 'mhs/*',
					'home', 'home/*',
					'itii', 'itii/*',
					'stak', 'stak/*',
					'pendaftaran', 'pendaftaran/*',
					'/',
					'krs', 'krs/*',
				]
			],
			'filterdosen' => [ 'except' => [
					'dsn', 'dsn/*',
					'home', 'home/*',
					'itii', 'itii/*',
					'stak', 'stak/*',
					'pendaftaran', 'pendaftaran/*',
					'/',
				]
			],
			'toolbar',
			//'honeypot'
		],
	];

	// Works on all of a particular HTTP method
	// (GET, POST, etc) as BEFORE filters only
	//     like: 'post' => ['CSRF', 'throttle'],
	public $methods = [];

	// List filter aliases and any before/after uri patterns
	// that they should run on, like:
	//    'isLoggedIn' => ['before' => ['account/*', 'profiles/*']],
	public $filters = [];
}

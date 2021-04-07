<?php 

namespace App\Controllers;

use App\Models\ModelDsn;
use App\Models\ModelTa;

class Dsn extends BaseController
{
	public function __construct()
	{
		helper('form');
        $this->ModelDsn = new ModelDsn();
        $this->ModelTa = new ModelTa();
	}
	
	public function index()
	{
		$data = [
			'title' => 'Dosen',
			'dosen'	=> $this->ModelDsn->DataDosen(),
			'isi'	=> 'dashboard_dsn'
		];
		return view('layout/wrapper', $data);
	}

	public function edit($id_dosen)
	{
		$data = [
			'id_dosen'		=> $id_dosen,
            'pass_dosen'	=> $this->request->getPost('pass_dosen'),
		];

		$this->ModelDsn->edit($data);
		session()->setFlashdata('pesan', 'Password Berhasil Dirubah.');
		return redirect()->to(base_url('dsn'));
	}

	public function jadwal()
	{
		$ta  = $this->ModelTa->ta_aktif();
		$dosen  = $this->ModelDsn->DataDosen();
		$data = [
			'title' 	=> 'Jadwal Mengajar',
			'ta'		=> $ta,
			'jadwal'	=> $this->ModelDsn->JadwalDosen($dosen['id_dosen'], $ta['id_ta']),
			'isi'		=> 'dosen/jadwal_index'
		];
		return view('layout/wrapper', $data);
	}

	public function AbsenKelas()
	{
		$ta  = $this->ModelTa->ta_aktif();
		$dosen  = $this->ModelDsn->DataDosen();
		$data = [
			'title' 	=> 'Presensi Kelas',
			'ta'		=> $ta,
			'absen'		=> $this->ModelDsn->JadwalDosen($dosen['id_dosen'], $ta['id_ta']),
			'isi'		=> 'dosen/absenkelas/absen_index'
		];
		return view('layout/wrapper', $data);
	}

	public function absensi($id_jadwal)
	{
		$ta  = $this->ModelTa->ta_aktif();
		$data = [
			'title' 	=> 'Presensi Kehadiran Mahasiswa',
			'ta'		=> $ta,
			'jadwal'	=> $this->ModelDsn->DetailJadwal($id_jadwal),
			'mhs'		=> $this->ModelDsn->mhs($id_jadwal),
			'isi'		=> 'dosen/absenkelas/absensi'
		];
		return view('layout/wrapper', $data);
	}

	public function SimpanAbsen($id_jadwal)
	{
		$mhs = $this->ModelDsn->mhs($id_jadwal);
		foreach ($mhs as $key => $value) {
			$data = [
				'id_krs'	=> $this->request->getPost($value['id_krs'] . 'id_krs'),
				'p1' 		=> $this->request->getPost($value['id_krs'] . 'p1'),
				'p2' 		=> $this->request->getPost($value['id_krs'] . 'p2'),
				'p3' 		=> $this->request->getPost($value['id_krs'] . 'p3'),
				'p4' 		=> $this->request->getPost($value['id_krs'] . 'p4'),
				'p5' 		=> $this->request->getPost($value['id_krs'] . 'p5'),
				'p6' 		=> $this->request->getPost($value['id_krs'] . 'p6'),
				'p7' 		=> $this->request->getPost($value['id_krs'] . 'p7'),
				'p8' 		=> $this->request->getPost($value['id_krs'] . 'p8'),
				'p9' 		=> $this->request->getPost($value['id_krs'] . 'p9'),
				'p10' 		=> $this->request->getPost($value['id_krs'] . 'p10'),
				'p11' 		=> $this->request->getPost($value['id_krs'] . 'p11'),
				'p12' 		=> $this->request->getPost($value['id_krs'] . 'p12'),
				'p13' 		=> $this->request->getPost($value['id_krs'] . 'p13'),
				'p14' 		=> $this->request->getPost($value['id_krs'] . 'p14'),
				'p15' 		=> $this->request->getPost($value['id_krs'] . 'p15'),
				'p16' 		=> $this->request->getPost($value['id_krs'] . 'p16'),
				'p17' 		=> $this->request->getPost($value['id_krs'] . 'p17'),
				'p18' 		=> $this->request->getPost($value['id_krs'] . 'p18'),
			];
			$this->ModelDsn->SimpanAbsen($data);
		}
		session()->setFlashdata('pesan', 'Presensi mahasiswa berhasil diupdate!');
		return redirect()->to(base_url('dsn/absensi/' . $id_jadwal));
	}

	public function print_absensi($id_jadwal)
	{
		$ta  = $this->ModelTa->ta_aktif();
		$data = [
			'title' 	=> 'Cetak Presensi',
			'ta'		=> $ta,
			'jadwal'	=> $this->ModelDsn->DetailJadwal($id_jadwal),
			'mhs'		=> $this->ModelDsn->mhs($id_jadwal),
		];
		return view('dosen/absenkelas/print_absensi', $data);
	}

	public function NilaiMahasiswa()
	{
		$ta  = $this->ModelTa->ta_aktif();
		$dosen  = $this->ModelDsn->DataDosen();
		$data = [
			'title' 	=> 'Nilai Mahasiswa',
			'ta'		=> $ta,
			'absen'		=> $this->ModelDsn->JadwalDosen($dosen['id_dosen'], $ta['id_ta']),
			'isi'		=> 'dosen/nilai/nilai_index'
		];
		return view('layout/wrapper', $data);
	}

	public function DataNilai($id_jadwal)
	{
		$ta  = $this->ModelTa->ta_aktif();
		$data = [
			'title' 	=> 'Nilai Mahasiswa',
			'ta'		=> $ta,
			'jadwal'	=> $this->ModelDsn->DetailJadwal($id_jadwal),
			'mhs'		=> $this->ModelDsn->mhs($id_jadwal),
			'isi'		=> 'dosen/nilai/data_nilai'
		];
		return view('layout/wrapper', $data);
	}

	public function SimpanNilai($id_jadwal)
	{
		$mhs = $this->ModelDsn->mhs($id_jadwal);
		foreach ($mhs as $key => $value) {
			$absen = $this->request->getPost($value['id_krs'] . 'absen');
			$tugas = $this->request->getPost($value['id_krs'] . 'nilai_tugas');
			$uts = $this->request->getPost($value['id_krs'] . 'nilai_uts');
			$uas = $this->request->getPost($value['id_krs'] . 'nilai_uas');
			$na = ($absen * 15/100) + ($tugas * 15/100) + ($uts * 30/100) + ($uas * 40/100);
			if ($na >= 85) {
				$nh = 'A';
				$bobot = 4;
			} elseif ($na < 85 && $na >= 75) {
				$nh = 'B'; 
				$bobot = 3;
			} elseif ($na < 75 && $na >= 65) {
				$nh = 'C';
				$bobot = 2;
			} elseif ($na < 65 && $na >= 55) {
				$nh = 'D';
				$bobot = 1;
			} else {
				$nh = 'E';
				$bobot = 0;
			}
			$data = [
				'id_krs'		=> $this->request->getPost($value['id_krs'] . 'id_krs'),
				'nilai_tugas'	=> $this->request->getPost($value['id_krs'] . 'nilai_tugas'),
				'nilai_uts'		=> $this->request->getPost($value['id_krs'] . 'nilai_uts'),
				'nilai_uas'		=> $this->request->getPost($value['id_krs'] . 'nilai_uas'),
				'nilai_akhir'	=> number_format($na, 0),
				'nilai_huruf'	=> $nh,
				'bobot'			=> $bobot,
			];
			$this->ModelDsn->SimpanNilai($data);
		}
		session()->setFlashdata('pesan', 'Nilai mahasiswa berhasil diupdate!');
		return redirect()->to(base_url('dsn/DataNilai/' . $id_jadwal));
	}

	public function PrintNilai($id_jadwal)
	{
		$ta  = $this->ModelTa->ta_aktif();
		$data = [
			'title' 	=> 'Rekap Nilai Mahasiswa',
			'ta'		=> $ta,
			'jadwal'	=> $this->ModelDsn->DetailJadwal($id_jadwal),
			'mhs'		=> $this->ModelDsn->mhs($id_jadwal),
		];
		return view('dosen/nilai/print_nilai', $data);
	}

	//--------------------------------------------------------------------

}
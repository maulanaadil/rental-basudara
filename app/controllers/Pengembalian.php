<?php

class Pengembalian extends Controller
{
	public function __construct()
	{
		if ($_SESSION['session_login'] != 'sudah_login') {
			Flasher::setMessage('Login', 'Tidak ditemukan.', 'danger');
			header('location: ' . base_url . '/login');
			exit;
		}
	}
	public function index()
	{
		$data['title'] = 'Pengembalian';
		$data['pengembalian'] = $this->model('PengembalianModel')->getDataPengembalian();
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('pengembalian/index', $data);
		$this->view('templates/footer');
	}

	public function dikembalikan($id)
	{
		if ($this->model('PengembalianModel')->setStatusMenjadiDikembalikan($id) > 0) {
			Flasher::setMessage('Berhasil', 'diupdate', 'success');
            header('location: ' . base_url . '/pengembalian');
            exit;
		} else {
			Flasher::setMessage('Gagal', 'diupdate', 'danger');
            header('location: ' . base_url . '/pengembalian');
            exit;
		}
	}
}

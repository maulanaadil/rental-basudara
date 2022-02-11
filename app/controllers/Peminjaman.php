<?php

class Peminjaman extends Controller
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
		$data['title'] = 'Peminjaman';
		$data['peminjaman'] = $this->model('PeminjamanModel')->getDataPeminjaman();
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('peminjaman/index', $data);
		$this->view('templates/footer');
	}

	public function dipinjam($id)
	{
		if ($this->model('PeminjamanModel')->setStatusMenjadiDipinjam($id) > 0) {
			Flasher::setMessage('Berhasil', 'diupdate', 'success');
            header('location: ' . base_url . '/peminjaman');
            exit;
		} else {
			Flasher::setMessage('Gagal', 'diupdate', 'danger');
            header('location: ' . base_url . '/peminjaman');
            exit;
		}
	}
}

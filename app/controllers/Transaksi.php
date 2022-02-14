<?php

class Transaksi extends Controller
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
		$data['title'] = 'Transaksi';
		$data['transaksi'] = $this->model("TransaksiModel")->getAllTransaksi();
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('transaksi/index', $data);
		$this->view('templates/footer');
	}

	public function tolak($id)
	{
		$status = $this->model('TransaksiModel')->tolakTransaksi($id);
		if ($status['status'] > 0) {
			Flasher::setMessage('Berhasil', 'ditolak', 'success');
			header('location: ' . base_url . '/transaksi');
			exit;
		} else {
			Flasher::setMessage('Gagal', 'dihapus', 'danger');
			header('location: ' . base_url . '/transaksi');
			exit;
		}
	}
	public function accept($id)
	{
		$status = $this->model('TransaksiModel')->acceptTransaksi($id);
		if ($status['status'] > 0) {
			Flasher::setMessage('Berhasil', 'diterima', 'success');
			header('location: ' . base_url . '/transaksi');
			exit;
		} else {
			Flasher::setMessage('Gagal', 'diterima', 'danger');
			header('location: ' . base_url . '/transaksi');
			exit;
		}
	}
}

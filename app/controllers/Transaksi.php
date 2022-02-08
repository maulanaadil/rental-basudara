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

	public function onAccept($transaksi_id)
	{
		if ($this->model('TransaksiModel')->updateDataTransaksiAccept($transaksi_id) > 0) {
			Flasher::setMessage('Berhasil', 'diupdate', 'success');
			header('location: ' . base_url . '/transaksi');
			exit;
		} else {
			Flasher::setMessage('Gagal', 'diupdate', 'danger');
			header('location: ' . base_url . '/transaksi');
			exit;
		}
	}
	public function onTolak($transaksi_id)
	{
		if ($this->model('TransaksiModel')->updateDataTransaksiTolak($transaksi_id) > 0) {
			Flasher::setMessage('Berhasil', 'diupdate', 'success');
			header('location: ' . base_url . '/transaksi');
			exit;
		} else {
			Flasher::setMessage('Gagal', 'diupdate', 'danger');
			header('location: ' . base_url . '/transaksi');
			exit;
		}
	}
}

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
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('transaksi/index', $data);
		$this->view('templates/footer');
	}

	public function tolak($id)
    {
        if ($this->model('TransaksiModel')->tolakTransaksi($id) > 0) {
            Flasher::setMessage('Berhasil', 'ditolak', 'success');
            header('location: ' . base_url . '/transaksi');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'dihapus', 'danger');
            header('location: ' . base_url . '/transaksi');
            exit;
        }
    }
}

<?php

class Login extends Controller
{
	public function index()
	{
		$data['title'] = 'Halaman Login';

		$this->view('login/login', $data);
	}

	public function prosesLogin()
	{
		if ($this->model('LoginModel')->checkLogin($_POST) > 0) {
			$data = $this->model('LoginModel')->checkLogin($_POST);
			setcookie('username',  $data['username']);
			$_SESSION['session_login'] = 'sudah_login';
			//$this->model('LoginModel')->isLoggedIn($_SESSION['session_login']);

			header('location: ' . base_url . '/home');
		} else {
			Flasher::setMessage('Username / Password', 'salah.', 'danger');
			header('location: ' . base_url . '/login');
			exit;
		}
	}
}

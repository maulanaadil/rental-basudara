<?php

class Customer extends Controller
{
    public function index()
    {
        $data['title'] = 'Rental Basudara';
        $this->view('customer/index', $data);
    }

    public function simpanCustomer()
    {
        if( $this->model('CustomerModel')->tambahCustomer($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','ditambahkan','success');
			header('location: '. base_url . '/customer');
			exit;			
		}else{
			Flasher::setMessage('Gagal','ditambahkan','danger');
			header('location: '. base_url . '/customer');
			exit;	
		}
    }
}

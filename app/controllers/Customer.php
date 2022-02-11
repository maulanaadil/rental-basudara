<?php

class Customer extends Controller
{
    public function index()
    {
        $data['title'] = 'Rental Basudara';
        $data['ps'] = $this->model('PlaystationModel')->jenisPlaystationTersedia();
        $this->view('customer/index', $data);
    }

    public function simpanCustomer()
    {
        if ($this->model('CustomerModel')->tambahCustomer($_POST, $_FILES) > 0) {
            Flasher::setMessagePelanggan('Berhasil', 'ditambahkan', 'success');
            header('location: ' . base_url . '/customer');
            exit;
        } else {
            Flasher::setMessagePelanggan('Gagal', 'ditambahkan', 'danger');
            header('location: ' . base_url . '/customer');
            exit;
        }
    }
}

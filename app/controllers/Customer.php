<?php

class Customer extends Controller
{
    public function index()
    {
        $data['title'] = 'Saya Suka Windah';
        $this->view('customer/index', $data);
    }
}

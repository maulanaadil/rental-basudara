<?php

class CustomerModel {
	
	private $table = 'customer';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getCustomerById($customer_id)
	{
		$this->db->query('SELECT * FROM ' . $this->table . 'WHERE customer_id:=customer_id');
		$this->db->bind('customer_id', $customer_id);
		return $this->db->single();
	}

}
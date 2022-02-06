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

	public function tambahCustomer($data)
	{
		$query = "INSERT INTO customer (customer_id, nama, no_hp, email) VALUES(:customer_id, :nama, :no_hp, :email)";
		$this->db->query($query);
		$this->db->bind('nama', $data['nama']);
		$this->db->bind('no_hp', $data['no_hp']);
		$this->db->bind('email', $data['email']);
		$this->db->execute();

		return $this->db->rowCount();
	}
}
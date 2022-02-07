<?php

class CustomerModel
{

	private $table = 'customer';
	private $db;
	private $transaksi;

	public function __construct()
	{
		require_once(__DIR__ . '/TransaksiModel.php');
		$this->db = new Database;
		$this->transaksi = new TransaksiModel;
	}

	public function getCustomerById($customer_id)
	{
		$this->db->query('SELECT * FROM ' . $this->table . 'WHERE customer_id:=customer_id');
		$this->db->bind('customer_id', $customer_id);
		return $this->db->single();
	}

	public function tambahCustomer($data)
	{
		// Tambah Customer
		$query = "INSERT INTO customer ( nama, no_hp, email) VALUES( :nama, :no_hp, :email)";
		$this->db->query($query);
		$this->db->bind('nama', $data['nama']);
		$this->db->bind('no_hp', $data['no_hp']);
		$this->db->bind('email', $data['email']);
		$this->db->execute();

		// Query 'customer_id' terbaru
		$this->db->query("SELECT MAX(customer_id) FROM " . $this->table);
		$this->db->execute();

		// Memasukan 'customer_id' ke array $data
		$customer_id = $this->getCustomerIdMax();
		$data['customer_id'] = $customer_id;

		// Menambahkan data baru ke tabel 'transaksi'
		$this->transaksi->tambahTransaksi($data);

		return $this->db->rowCount();
	}

	public function getCustomerIdMax()
	{
		$this->db->query("SELECT MAX(customer_id) as max_customer_id FROM " . $this->table);
		$this->db->execute();
		$data = $this->db->single();

		return $data['max_customer_id'];
	}
}

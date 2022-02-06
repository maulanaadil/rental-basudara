<?php

class TransaksiModel {
	
	private $table = 'transaksi';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAllTransaksi()
	{
		$this->db->query('SELECT * FROM ' . $this->table);
		return $this->db->resultSet();
	}

	public function getTransaksiById($transaksi_id)
	{
		$this->db->query('SELECT * FROM ' . $this->table . 'WHERE transaksi_id:=transaksi_id');
        $this->db->bind('transaksi_id', $transaksi_id);
		return $this->db->single();
	}	
}
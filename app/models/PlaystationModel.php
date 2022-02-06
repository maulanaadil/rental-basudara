<?php

class PlaystationModek {
	
	private $table = 'playstation';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

    public function getAllPlaystation() 
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getPlaystationById($ps_id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . 'WHERE ps_id:=ps_id');
        $this->db->bind('ps_id', $ps_id);
        return $this->db->single();
    }

	public function getAllPlaystationWhereTersedia()
	{
		$this->db->query('SELECT * FROM ' . $this->table . 'WHERE status_peminjaman="tersedia"');
		return $this->db->resultSet();
	}

    public function getAllPlaystationWhereDipinjam()
	{
		$this->db->query('SELECT * FROM ' . $this->table . 'WHERE status_peminjaman="dipinjam"');
		return $this->db->resultSet();
	}
}
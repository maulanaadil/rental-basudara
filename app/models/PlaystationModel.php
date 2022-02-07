<?php

class PlaystationModel
{

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
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE ps_id=:ps_id');
		$this->db->bind('ps_id', $ps_id);
		return $this->db->single();
	}

	public function getAllPlaystationWhereTersedia()
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE status_peminjaman="tersedia"');
		return $this->db->resultSet();
	}

	public function getAllPlaystationWhereDipinjam()
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE status_peminjaman="dipinjam"');
		return $this->db->resultSet();
	}

	public function getCountPlaystationWhereTersedia()
	{
		$this->db->query('SELECT COUNT(ps_id) as total_tersedia FROM' . $this->table . ' WHERE status_peminjaman = "tersedia"');
		return $this->db->resultSet();
	}

	public function getCountPlaystationWhereDipinjam()
	{
		$this->db->query('SELECT COUNT(ps_id) as total_dipinjam FROM ' . $this->table . ' WHERE status_peminjaman = "dipinjam"');
		return $this->db->resultSet();
	}

	public function getPlaystationTersediaByJenis($jenis)
	{
		$this->db->query("SELECT ps_id FROM " . $this->table . " WHERE status_peminjaman = 'tersedia' AND jenis=:jenis");
		$this->db->bind("jenis", $jenis);
		$this->db->execute();
		$data = $this->db->single();
		$res = array();
		if (is_bool($data)) {
			$res['ps_id'] = NULL;
			$res['msg'] = $jenis . "tidak tersedia";
		} else {
			$res = $data;
		}

		return $res;
	}

	public function setPlaystationStatusPeminjaman($ps_id, $status)
	{
		$this->db->query("UPDATE " . $this->table . " SET `status_peminjaman` = :status WHERE `ps_id` = :ps_id");
		$this->db->bind("status", $status);
		$this->db->bind("ps_id", $ps_id);
		$this->db->execute();
	}
}

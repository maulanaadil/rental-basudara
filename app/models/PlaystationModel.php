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

	public function getCountPlaystationWhereTersedia()
	{
		$this->db->query('SELECT COUNT(*) as total FROM ' . $this->table . ' WHERE status_peminjaman="tersedia"');
		$this->db->execute();
		return $this->db->count();
	}

	public function getCountPlaystationWhereDipinjam()
	{
		$this->db->query('SELECT COUNT(*) as total FROM ' . $this->table . ' WHERE status_peminjaman="dipinjam"');
		$this->db->execute();
		return $this->db->count();
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

	public function tambahPlaystation($data)
	{
		$queryId = "SELECT MAX(ps_id) AS max_ps_id FROM playstation;";
		$this->db->query($queryId);
		$this->db->execute();
		$id = $this->db->single();

		$ps_id = (int) filter_var($id['max_ps_id'], FILTER_SANITIZE_NUMBER_INT);
		$query = "INSERT INTO " . $this->table . " (`ps_id`, `jenis`, `harga`, `status_peminjaman`) VALUES (:ps_id, :jenis, :harga, :status_peminjaman)";
		$this->db->query($query);
		$this->db->bind('ps_id', "P" . ($ps_id + 1));
		$this->db->bind("jenis", $data["jenis-playstation"]);
		$this->db->bind("harga", $data["harga"]);
		$this->db->bind("status_peminjaman", $data["status-peminjaman"]);
		$this->db->execute();

		return $this->db->rowCount();
	}
	public function updateDataPlaystation($data)
	{
		$query = "UPDATE " . $this->table . " SET `jenis` = :jenis , `harga` = :harga WHERE `ps_id` = :ps_id";
		$this->db->query($query);
		$this->db->bind("ps_id", $data['ps_id']);
		$this->db->bind("jenis", $data['jenis-playstation']);
		$this->db->bind("harga", $data['harga']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function deletePlaystation($id)
	{
		$this->db->query('DELETE FROM ' . $this->table . ' WHERE ps_id=:id');
		$this->db->bind('id', $id);
		$this->db->execute();

		return $this->db->rowCount();
	}
}

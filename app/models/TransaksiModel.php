<?php

class TransaksiModel
{

	private $table = 'transaksi';
	private $db;
	private $playstation;

	public function __construct()
	{
		require_once(__DIR__ . '/PlaystationModel.php');
		$this->playstation = new PlaystationModel;
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

	public function tambahTransaksi($data)
	{
		// Menentukan perbedaan berapa hari dari 'tanggal' dan 'tanggal_kembali'
		$date1 = new DateTime($data['tanggal']);
		$date2 = new DateTime($data['tanggal_kembali']);
		$interval = $date1->diff($date2);
		$bedaTanggal = $interval->days;

		// TODO: Menentukan harga dari playstation yang tersedia dan sesuai jenis yang dipilih customer
		// TODO: Merubah 'status_peminjaman' menjadi 'dipinjam'
		$ps_id = $this->playstation->getPlaystationTersediaByJenis($data['jenis-playstation']);
		if (is_null($ps_id['ps_id'])) {
			// Flasher::setMessage($ps_id['msg'], "dicari", "danger");
			return 0;
		} else {
			$res_ps = $this->playstation->getPlaystationById($ps_id['ps_id']);
			$harga = $res_ps['harga'];
			$this->playstation->setPlaystationStatusPeminjaman($ps_id, "dipinjam");
		}

		$query = "INSERT INTO `rental_basudara`.`transaksi` (`customer_id`, `ps_id`, `pegawai_id`, `tanggal_pinjam`, `tanggal_kembali`, `total`, `status_transaksi`, `denda`) VALUES (:customer_id, :ps_id, :pegawai_id, :tgl_pinjam, :tgl_kembali, :total, :status_transaksi, :denda)";
		$this->db->query($query);
		$this->db->bind('customer_id', $data['customer_id']);
		$this->db->bind('ps_id', 'P1');
		$this->db->bind('pegawai_id', 'A1');
		$this->db->bind('tgl_pinjam', $data['tanggal']);
		$this->db->bind('tgl_kembali', $data['tanggal_kembali']);
		$this->db->bind('total', $bedaTanggal * $harga);
		$this->db->bind('status_transaksi', 'pending');
		$this->db->bind('denda', 0);
		$this->db->execute();

		return $this->db->single();
	}

	public function tolakTransaksi($id)
	{
		$this->db->query('DELETE FROM ' . $this->table . ' WHERE transaksi_id=:id');
		$this->db->bind('id', $id);
		$this->db->execute();

		return $this->db->rowCount();
	}


	public function getCountTransaksi() 
	{
		$this->db->query('SELECT COUNT(*) as total FROM ' . $this->table );
		$this->db->execute();
		return $this->db->count();
	}
}

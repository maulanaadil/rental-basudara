<?php
class PeminjamanModel
{
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

    public function getDataPeminjaman()
	{
		$this->db->query('SELECT 
                        customer.nama as nama, customer.email as email , playstation.ps_id as ps_id, playstation.jenis as jenis, transaksi.tanggal_pinjam as tanggal_pinjam, transaksi.tanggal_kembali as tanggal_kembali, transaksi.status_transaksi as status
                        FROM customer 
                        JOIN transaksi on customer.customer_id = transaksi.customer_id 
                        JOIN playstation on playstation.ps_id = transaksi.ps_id
                        WHERE transaksi.status_transaksi = "success" AND playstation.status_peminjaman = "tersedia"
                        ');
		return $this->db->resultSet();
	}

    public function setStatusMenjadiDipinjam($id)
    {
        $this->db->query('UPDATE playstation SET `status_peminjaman` = "dipinjam" WHERE `ps_id` =:id');
        $this->db->bind("id", $id);
        $this->db->execute();

		return $this->db->rowCount();
    }
}


?>
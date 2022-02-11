<?php
class PengembalianModel
{
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

    public function getDataPengembalian()
	{
		$this->db->query('SELECT 
                        customer.nama as nama, customer.email as email , playstation.ps_id as ps_id, playstation.jenis as jenis, transaksi.tanggal_pinjam as tanggal_pinjam, transaksi.tanggal_kembali as tanggal_kembali, transaksi.denda as denda, playstation.status_peminjaman as status_peminjaman
                        FROM customer 
                        JOIN transaksi on customer.customer_id = transaksi.customer_id 
                        JOIN playstation on playstation.ps_id = transaksi.ps_id
                        WHERE playstation.status_peminjaman = "dipinjam";
                        ');
		return $this->db->resultSet();
	}

    public function setStatusMenjadiDikembalikan($id)
    {
        $this->db->query('UPDATE playstation SET `status_peminjaman` = "tersedia" WHERE `ps_id` =:id');
        $this->db->bind("id", $id);
        $this->db->execute();

		return $this->db->rowCount();
    }

   
}


?>
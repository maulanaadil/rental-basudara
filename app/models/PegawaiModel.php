<?php

class PegawaiModel {
	
	private $table = 'pegawai';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

}
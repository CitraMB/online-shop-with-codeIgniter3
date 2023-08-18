<?php 
	class M_Transaksi extends CI_Model
	{
		/* Untuk melakukan input data pada tabel. */
		public function input($data, $table)
		{
			$this->db->insert($table,$data);
		}

		/* Untuk mengambil semua data yang ada pada tabel transaksi_penjualan. */
		public function ambil ()
		{
			$data = $this->db->query('SELECT * FROM transaksi_penjualan');
			return $data->result();
		}
	}



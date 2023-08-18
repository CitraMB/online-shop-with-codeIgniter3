<?php 
	class M_Barang extends CI_Model
	{
		/* Untuk mengambil semua data pada tabel barangToko. */
		public function ambil ()
		{
			$data = $this->db->query('SELECT * FROM barangToko');
			return $data->result();
		}

		/* Untuk melakukan input data terhadap tabel. */
		public function input($data, $table)
		{
			$this->db->insert($table,$data);
		}

		/* Untuk melakukan pencarian barang dengan menggunakan kode barang dan mendapatkan datanya. */
		public function cariBarang($kode)
		{
			$data = $this->db->query("SELECT * FROM barangToko WHERE ID='$kode'");
			return $data->result();
		}

		/* Untuk melakukan update terhadap stok barang. */
		public function update($id_barang, $kapasitasBaru)
		{
			$this->db->query("UPDATE barangToko SET STOK='$kapasitasBaru' WHERE ID='$id_barang'");
		}
	}

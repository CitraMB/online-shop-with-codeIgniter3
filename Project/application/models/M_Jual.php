<?php 
	class M_Jual extends CI_Model
	{
		/* Untuk melakukan input data terhadap tabel. */
		public function input($data, $table)
		{
			$this->db->insert($table,$data);
		}

		/* Untuk mengambil semua data yang terdapat pada tabel jual.*/
		public function ambil()
		{
			$data = $this->db->query('SELECT * FROM jual');
			return $data->result();
		}
	}

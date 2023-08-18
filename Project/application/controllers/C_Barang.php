<?php
defined('BASEPATH') OR exit('No direct script access allowed');

#[\AllowDynamicProperties]

class C_Barang extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_Barang');
		$this->load->helper('url');
		$this->CI =& get_instance();
		session_start();
	}

	/* Untuk menampilkan view dengan menampilkan data barang yang dijual. */
	public function display()
	{
		$data['content_view'] = "V_Barang.php";
		$data['barang'] = $this->M_Barang->ambil();
		$this->load->view('V_Template', $data);
	}

	/* Untuk menampilkan view form input data barang. */
	public function formInputData()
	{
		$data['content_view'] = "V_Form_InputData";
		$this->load->view('V_Template', $data);
	}

	/* Untuk melakukan input data dari form data barang ke database model barang. */
	public function inputData()
	{
		$namaBarang = $this->input->post('nama');
		$hargaBarang = $this->input->post('harga');
		$stokBarang = $this->input->post('stok');
		$fotoBarang = $_FILES['foto']['name'];

		/* Memindahkan lokasi foto lokal ke folder assets pada project. */
        $file_tmp = $_FILES['foto']['tmp_name'];
		move_uploaded_file($file_tmp, 'assets/'.$fotoBarang);

		$data = array(
			'NAMA' => $namaBarang,
			'HARGA' => $hargaBarang,
			'STOK' => $stokBarang,
			'FOTO' => $fotoBarang,
		);
		$this->M_Barang->input($data, 'barangToko');
		redirect('index.php/C_Barang/display');
	}
}

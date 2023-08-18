<?php
defined('BASEPATH') OR exit('No direct script access allowed');

#[\AllowDynamicProperties]

class C_Transaksi extends CI_Controller {

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
		$this->load->model('M_Transaksi');
		$this->load->model('M_Jual');
		$this->load->helper('url');
		$this->CI =& get_instance();
		session_start();
	}

	/* Untuk mengambil input data pembeli dari form check out. */
	public function transaksiPenjualan()
	{
		$data['nama'] = $this->input->post('nama');
		$data['alamat'] = $this->input->post('alamat');
		$data['kecamatan'] = $this->input->post('kecamatan');
		$data['kota'] = $this->input->post('kota');

		$data['barang'] = $this->M_Barang->ambil();
		$data['transaksi'] = $this->M_Transaksi->ambil();
		$data['jual'] = $this->M_Jual->ambil();

		$data['content_view'] = "V_Transaksi";
		$this->load->view('V_Template', $data);
	}

	/* Untuk menyimpan data pada tabel many to many. */
	public function masukJual($id_barang="", $id_transaksi="", $kapasitas="", $harga="")
	{
		$data = array(
			'ID_BARANG' => $id_barang,
			'ID_TRANSAKSI' => $id_transaksi,
			'STOK' => $kapasitas,
			'HARGA' => $harga,
		);
		$this->M_Jual->input($data, 'jual');
		return TRUE;
	}

	/* Untuk menyimpan data transaksi pada tabel transaksi_penjualan. */
	public function masukTransaksi($id_transaksi="", $nama_pembeli="", $alamat_pembeli="", $kecamatan_pembeli="", $kota_pembeli="")
	{
		/* Mengambil tanggal hari ini pada komputer */
		$tanggal = date('Y-m-d');

		$data = array(
			'ID' => $id_transaksi,
			'TANGGAL' => $tanggal,
			'NAMA' => $nama_pembeli,
			'ALAMAT' => $alamat_pembeli,
			'KECAMATAN' => $kecamatan_pembeli,
			'KOTA' => $kota_pembeli
		);
		$this->M_Transaksi->input($data, 'transaksi_penjualan');
		return TRUE;
	}

	/* Untuk menampilkan struk pembelian setelah melakukan check out. */
	public function strukDisplay()
	{
		unset($_SESSION['cart']);
		$data['transaksi'] = $this->M_Transaksi->ambil();
		$data['jual'] = $this->M_Jual->ambil();
		$data['barang'] = $this->M_Barang->ambil();
		$data['content_view'] = "V_Struk.php";
		$this->load->view('V_Template', $data);
	}

	/* Untuk menampilkan struk pembelian terakhir. */
	public function lastStrukDisplay()
	{
		$data['transaksi'] = $this->M_Transaksi->ambil();
		$data['jual'] = $this->M_Jual->ambil();
		$data['barang'] = $this->M_Barang->ambil();
		$data['content_view'] = "V_Struk.php";
		$this->load->view('V_Template', $data);
	}

	/* Untuk melakukan update terhadap stok barang yang sudah terjual. */
	public function updateBarang($id_barang="", $kapasitasBaru="")
	{
		$this->M_Barang->update($id_barang, $kapasitasBaru);
		return TRUE;
	}
}

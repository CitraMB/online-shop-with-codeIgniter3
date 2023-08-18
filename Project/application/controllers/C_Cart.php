<?php
defined('BASEPATH') OR exit('No direct script access allowed');

#[\AllowDynamicProperties]

class C_Cart extends CI_Controller {

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
		session_start();
	}

	/* Untuk memasukkan barang yang akan dibeli ke keranjang. */
	public function masukCart($kode="")
	{
		$data['barang'] = $this->M_Barang->cariBarang($kode);
		$data['content_view'] = "V_Cart_Barang.php";
		$this->load->view('V_Template', $data);
	}

	/* Untuk menampilkan view keranjang belanja. */
	public function displayCart()
	{
		$data['content_view'] = "V_Cart_Display.php";
		$this->load->view('V_Template', $data);
	}

	/* Untuk menghapus semua barang pada keranjang belanja. */
	public function deleteCart()
	{
		unset($_SESSION['cart']);
		redirect('index.php/C_Barang/display');
	}

	/* Untuk melakukan check out terhadap seluruh barang yang ada di keranjang. */
	public function checkOutCart()
	{
		$data['content_view'] = "V_Form_CheckOut.php";
		$this->load->view('V_Template', $data);
	}
}

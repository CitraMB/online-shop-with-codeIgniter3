<?php
    if(!$_SESSION['id_transaksi']){
        $_SESSION['id_transaksi'] = 0;
    }

	$_SESSION['id_transaksi']++;
	$CI =& get_instance();
	$dataLama = 0;

	/* Melakukan pengecekan id_transaksi. */
	if(!$_SESSION['id_transaksi']){
		foreach ($transaksi as $dataTransaksi)
		{
			if ($dataTransaksi->ID > $dataLama)
			{
				$dataLama = $dataTransaksi->ID;
			}
		}
		$_SESSION['id_transaksi'] = $dataLama;
	}

	$id_transaksi = $_SESSION['id_transaksi'];
	$valid = 1;
    $max = sizeof($_SESSION['cart']);

    foreach($_SESSION['cart'] as $data){
        $id_barang = $data['kode'];
    
        $kapasitas = $data['banyak'];

		/* Mengambil harga barang. */
		foreach ($barang as $dataBarang)
		{
			if ($id_barang == $dataBarang->ID)
			{
				$harga = $dataBarang->HARGA;
			}
		}

		if ($valid == 1)
		{
			$nama_pembeli = $nama;
    		$alamat_pembeli = $alamat;
			$kecamatan_pembeli = $kecamatan;
			$kota_pembeli = $kota;
    		
			$validasi = 0;
			$maxTransaksi = 0;

			/* Mengambil id transaksi untuk dilakukan pengecekan. */
			foreach ($transaksi as $dataTransaksi)
			{
				if ($dataTransaksi->ID > $validasi)
				{
					$validasi = $dataTransaksi->ID;
				}
			}

			/* Pengecekan jika id transaksi berbeda dengan id transaksi yang sudah ditambahkan sebelumnya. */
			if ($validasi != $id_transaksi)
			{
				/* Mengirim data transaksi ke controller. */
				$berhasil_trans = $this->CI->masukTransaksi($id_transaksi, $nama_pembeli, $alamat_pembeli, $kecamatan_pembeli, $kota_pembeli);
				echo "masuk transaksi";
			}
			$valid = 0;
		}

		/* Mengirim data jual ke controller. */
		$berhasil_insert = $this->CI->masukJual($id_barang, $id_transaksi, $kapasitas, $harga);

        if ($berhasil_insert){
			foreach ($barang as $dataBarang)
			{	
				if ($id_barang == $dataBarang->ID)
				{
					/* Pengurangan stok barang sesuai dengan banyaknya barang yang dibeli pada barang tertentu. */
					$kapasitasBaru = $dataBarang->STOK - $kapasitas;
				}
			}

			/* Melakukan update stok barang dengan mengirim data ke controller. */
			$d = $this->CI->updateBarang($id_barang, $kapasitasBaru);

            if($d){
                    echo "berhasil";
            }
        }
    }
	redirect('index.php/C_Transaksi/strukDisplay');
?>

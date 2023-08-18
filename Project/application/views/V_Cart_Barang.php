<?php 
	if(!isset($_SESSION['cart'])){
        $_SESSION['cart']=array();
    }

	foreach ($barang as $u){	
		$valid = 0;
		$nama = $u->NAMA;
		$max = sizeof($_SESSION['cart']);

		if (isset($_SESSION['cart'])){
			for ($i=0; $i<=$max; $i++) {
				$a = $_SESSION['cart'];

				/* Jika ada barang yang dimasukkan sama dengan barang pada keranjang akan menambahkan banyaknya barang pada keranjang. */
				if($a[$i]['kode'] == $u->ID){
					$banyakBaru = $a[$i]['banyak'] + 1;
					$totalBaru = $banyakBaru * $a[$i]['harga'];
	
					/* Mengganti isi array dengan banyak barang dan subtotal yang baru. */
					$baru = array("banyak"=>$banyakBaru, "subtotal"=>$totalBaru);
					$n = array_replace($a[$i], $baru);
					
					array_push($_SESSION['cart'], $n);
					unset($_SESSION['cart'][$i]);
					$valid = 1;
					break;
				}
			}
		}

		if ($valid == 0){
			$banyak = 1;
			$harga = $u->HARGA;
			$subtotal = $banyak * $harga;
	
			/* Menambahkan barang yang tidak ada barang yang sama pada keranjang. */
			$a = array("kode"=>$u->ID, "nama"=>"$u->NAMA", "banyak"=>$banyak, "harga"=>$u->HARGA, "subtotal"=>$subtotal);
	
			array_push($_SESSION['cart'], $a);
		}
	}

	redirect('index.php/C_Cart/displayCart');
	
?>

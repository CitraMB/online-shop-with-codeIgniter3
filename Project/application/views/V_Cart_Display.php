<!DOCTYPE html>
<html>
	<head>

	</head>
	<body>
		<h1>KERANJANG</h1><br>
		<table class="table table-striped">
        	<tr>
                <th>KODE BARANG</th>
            	<th>NAMA BARANG</th>
                <th>BANYAK</th>
                <th>HARGA</th>
                <th>SUBTOTAL</th>
            </tr>
            <?php   
            	$total = 0;
                if(!isset($_SESSION['cart'])){
                    $_SESSION['cart']=array();
                }
                $max = sizeof($_SESSION['cart']);
                foreach($_SESSION['cart'] as $data){ 
			?>
            <tr>
            	<th><?php echo $data['kode']; ?></th>
        		<th><?php echo $data['nama']; ?></th> 
        		<th><?php echo $data['banyak']; ?></th>
                <th><?php echo $data['harga']; ?></th>
                <th><?php echo $data['subtotal']; ?></th>
            </tr>
            <?php
					/* Menambahkan keseluruhan subtotal menjadi total harga. */
                	$total += $data['subtotal'];
                }
				$_SESSION['total'] = $total;
            ?>
                <tr>
                	<th colspan="4">JUMLAH</th>
                    <th><?php echo $total; ?></th>
                </tr>
        </table>
		<a class="btn btn-info" href="<?php echo base_url().'index.php/C_Barang/display' ?>">Kembali</a>
		<?php if($total != 0){ ?>
			<a class="btn btn-success" href="<?php echo base_url().'index.php/C_Cart/checkOutCart' ?>">Check Out</a>
			<a class="btn btn-danger" href="<?php echo base_url().'index.php/C_Cart/deleteCart' ?>">Delete All</a>
		<?php } ?>
	</body>
</html>

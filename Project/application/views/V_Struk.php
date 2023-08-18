<!DOCTYPE html>
<html>
	<head>
		<style>
			.bg-barcode{
        		background-image: url(<?php echo base_url("assets/fotoBarcode.jpg");?>);
				height: 100px;
  				width: 350px;
    		}
		</style>
	</head>
	<body align="center">
		<h1>TOKO MAMA</h1>
		<p>
			Address: Jl. Serba Guna, No. 12
		</p>
		<p>*****************************************************</p> 
		<?php
			$total = 0;
			$dataLama = 0;
			if($_SESSION['id_transaksi'] || !$_SESSION['id_transaksi']){
				foreach ($transaksi as $dataTransaksi)
				{
					if ($dataTransaksi->ID >= $dataLama)
					{
						$dataLama = $dataTransaksi->ID;
					}
				}
				$_SESSION['id_transaksi'] = $dataLama;
			}
		?>
		<table align="center" width="350px">
			<?php 
			foreach ($transaksi as $dataTransaksi)
			{
				if ($dataTransaksi->ID == $_SESSION['id_transaksi'])
				{
					?>
						<tr>
							<td style="font-weight: bold; text-align: left;">Nama Penerima:</td>
							<td style="text-align: right;"><?php echo $dataTransaksi->NAMA; ?></td>
						</tr>
						<tr>
							<td style="font-weight: bold; text-align: left;">Alamat Tujuan:</td>
							<td style="text-align: right;"><?php echo $dataTransaksi->ALAMAT.", Kec. ".$dataTransaksi->KECAMATAN.", Kota ".$dataTransaksi->KOTA; ?></td>
						</tr>
						<tr>
							<td style="font-weight: bold; text-align: left;">Tanggal Transaksi:</td>
							<td style="text-align: right;"><?php echo $dataTransaksi->TANGGAL; ?></td>
						</tr>
					<?php
				}
			}
			?>
		</table>
		<p>*****************************************************</p> 
		<table align="center" width="350px">
			<tr>
				<td style="font-weight: bold; text-align: left;">Description</td>
				<td style="font-weight: bold; text-align: right;">Price</td>
			</tr>
				<?php 
					$id_transaksi = $_SESSION['id_transaksi'];
					foreach ($jual as $dataJual)
					{
						if ($id_transaksi == $dataJual->ID_TRANSAKSI)
						{
							?><tr><?php
							foreach ($barang as $dataBarang)
							{
								if ($dataJual->ID_BARANG == $dataBarang->ID)
								{
									?>
									<td style="text-align: left;"><?php echo $dataBarang->NAMA; ?>
									<?php
									if ($dataJual->STOK > 1)
									{
										?>
										<br>
										<?php echo "~ x".$dataJual->STOK." @ Rp.".$dataJual->HARGA ?>
										<?php
									}
									?>
									</td>
									<td style="text-align: right;">
										<?php 
										$subTotal = $dataJual->STOK*$dataJual->HARGA;
										echo "Rp. ".$subTotal;
										$total += $subTotal;
										?>
									</td>
									<?php
								}
							}
						}
						?></tr><?php
					}
				?>
		</table>
		<p>*****************************************************</p> 
		<table align="center" width="350px">
			<tr>
				<td style="font-weight: bold; text-align: left;">TOTAL AMOUNT</td>
				<td style="text-align: right;"><?php echo "Rp. ".$total; ?></td>
			</tr>
		</table>
		<p>*****************************************************</p> 
		<h3>THANK YOU FOR SHOPPING</h3>
		<img class="bg-barcode" src="<?php echo base_url().'assets/fotoBarcode.jpg' ?>">
	</body>
</html>

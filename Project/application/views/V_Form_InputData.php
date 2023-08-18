<form method="POST" action="<?php echo base_url().'index.php/C_Barang/inputData'; ?>" enctype="multipart/form-data">
	<table align="center">
		<tr>
			<td>
				<label for="nama">Nama Barang:</label><br>
				<input type="text" name="nama" id="">
			</td>
		</tr>
		<tr>
			<td>
				<label for="harga">Harga:</label><br>
				<input name="harga" id="">
			</td>
		</tr>
		<tr>
			<td>
				<label for="stok">Stok:</label><br>
				<input name="stok" id="">
			</td>
		</tr>
		<tr>
			<td>
				<label for="foto">Foto:</label><br>
				<input type="file" name="foto">
			</td>
		</tr>
		<tr>
			<td>
				<input type="submit" name="submit" value="Submit">
			</td>
		</tr>
	</table>
</form>

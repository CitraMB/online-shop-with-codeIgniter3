<!DOCTYPE html>
<html>
	<head>

	</head>
	<body>
    	<h1>CHECK OUT</h1><br>
        <form method="POST" action="<?php echo base_url().'index.php/C_Transaksi/transaksiPenjualan'; ?>">
            <table>
            	<tr>
                    <td>
                        <label for="nama">NAMA LENGKAP:</label><br>
                        <input type="text" name="nama" id="">
                    </td>
				</tr>
				<tr>
                	<td>
                        <label for="alamat">ALAMAT:</label><br>
                        <input type="text" name="alamat" id="">
                    </td>
                </tr>
				<tr>
                	<td>
                        <label for="alamat">KECAMATAN:</label><br>
                        <input type="text" name="kecamatan" id="">
                    </td>
                </tr>
				<tr>
                	<td>
                        <label for="alamat">KOTA:</label><br>
                        <input type="text" name="kota" id="">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="submit" value="Bayar Rp. <?php echo $_SESSION['total']; ?>">
                    </td>
                </tr>
            </table>
        </form>
	</body>
</html>

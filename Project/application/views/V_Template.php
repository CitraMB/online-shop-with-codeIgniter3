<!DOCTYPE html>
<html lang="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>TOKO MAMA</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <style>
            .table-striped>tbody>tr:nth-child(odd)>td,
            .table-striped>tbody>tr:nth-child(odd)>th  {
                background-color: #fdd7e4;
            }
            .table-striped>tbody>tr:nth-child(even)>td,
            .table-striped>tbody>tr:nth-child(even)>th {
                background-color: #ADD8E6;
            }
			.bg-login{
        		background-image: url(<?php echo base_url("assets/fotoHeader.jpg");?>);
    		}
        </style>
	</head>
	<body>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <div class="container border border-dark py-5 bg-login">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-center">TOKO MAMA</h1>
                </div>
            </div>
        </div>

		<div class="navigationBar">
			<div class="container border border-dark">
				<div class="row">
					<div class="col-12">
						<a href="<?php echo base_url().'index.php/C_Barang/display' ?>">Home</a> ||
						<a href="<?php echo base_url().'index.php/C_Barang/formInputData' ?>">Input Data Barang</a> ||
						<a href="<?php echo base_url().'index.php/C_Cart/displayCart' ?>">Keranjang</a> ||
						<a href="<?php echo base_url().'index.php/C_Transaksi/lastStrukDisplay' ?>">Struk Terakhir</a> ||							
					</div>
				</div>
			</div>
		</div>

		<div class="content">
			<div class="container border border-dark py-5 text-center">
				<div class="row">
					<div class="col-12">
						<?php 			
							$this->load->view($content_view);	
						?>
					</div>
				</div>
			</div>
		</div>

        <div class="container border border-dark py-3 text-center">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-center">Ini Footer</h1>
                </div>
            </div>
        </div>

    </body>
</html>

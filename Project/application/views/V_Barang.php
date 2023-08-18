<!DOCTYPE html>
<html lang="en">
	<head>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<style>
			/* Media Query for Mobile Devices */
			@media only screen and (min-width: 480px) {
				.tombolBack {
					display: block;
				}
			}
			/* Media Query for Laptops and Desktops */
			@media only screen and (min-width: 1000px){
				.tombolBack {
					display: none;
				}
        	}
		</style>
	</head>
	<body>
		<div class="container-fluid">
        	<div class="container">
                <div class="row">
					<?php foreach ($barang as $u){	
						$kode = $u->ID; 
					?>
					<div class="col-3 my-3">
                        <div class="card">
                            <img class="card-img-top" src="<?php echo base_url().'assets/'.$u->FOTO ?>" class="img-fluid">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $u->NAMA ?></h5>
                                <p class="card-text">
									Rp. <?php echo $u->HARGA ?><br>
									Stok: <?php echo $u->STOK ?>
								</p>
								<a href="<?php echo base_url().'index.php/C_Cart/masukCart/'.$kode ?>" class="btn btn-info">Beli</a>
							</div>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>	
	</body>
</html>

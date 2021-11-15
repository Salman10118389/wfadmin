	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>nassets/styles/main_styles.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>nassets/styles/responsive.css">


	<div class="banner">
		<div class="container">
			<div class="row">
				<?php 
		        $kategori = $this->modelproduk->kategori();
		        for ($i=0; $i < count($kategori); $i++) { ?>
		        	<a href="<?php echo base_url()."/daftar-produk/".$kategori[$i]['link_list']?>" class="col-md-4 mt-4">
						<div class="banner_item align-items-center" style="background-image:url(<?php echo base_url() ?>gambar/kategori/<?php echo $kategori[$i]['gambar']?>)">
							<div class="banner_category text-center">
								<h3><?php echo $kategori[$i]['nama_list']?></h3>
							</div>
						</div>
					</a>
			    <?php } ?>
			</div>
		</div>
	</div>
		
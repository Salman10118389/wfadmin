	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>nassets/styles/main_styles.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>nassets/styles/responsive.css">

<style type="text/css">
	.section_title::after{
		background: #ffffff;
	}
</style>

	<div class="new_arrivals">
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<div class="section_title new_arrivals_title">
						<h2>Kategori Timbangan Duduk</h2>
						<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">	
					</div>
				</div>
			</div>
			<?php 
                $produk = $this->modelproduk->kategori_produk('');
            ?>
			<div class="row">
				<div class="col">
					<div class="product-grid" data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>
						<?php 
							for ($i=0; $i < count($produk); $i++) { ?>
							<div class="product-item <?php echo $produk[$i]['link_list'] ?>">
								<a href="<?php echo base_url() ?>">
									<div class="product discount product_filter">
										<div class="product_image">
											<img src="<?php echo base_url().'gambar/produk/gambar-utama/'.$produk[$i]['gambar_utama'] ?>"  alt="">
										</div>

										<!-- <div class="favorite favorite_left"></div>
										<div class="favorite"></div> -->

										<!-- 
										<div class="product_bubble product_bubble_left product_bubble_green d-flex flex-column align-items-center"><span>new</span></div>
										 -->

										 <?php if($produk[$i]['diskon']){ ?>
											<div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span><?php echo $produk[$i]['diskon'] ?>%</span></div>

											<div class="product_info">
												<h6 class="product_name"><a href="single.html"><?php echo $produk[$i]['nama_produk'] ?></a></h6>
												<div class="product_price"><span><?php echo number_format($produk[$i]['harga'],2,',','.'); ?></span><br><?php echo number_format($produk[$i]['harga'],2,',','.'); ?></div>
											</div>

										 <?php }else{ ?>
											<div class="product_info">
												<h6 class="product_name"><a href="single.html"><?php echo $produk[$i]['nama_produk'] ?></a></h6>
												<div class="product_price"><?php echo number_format($produk[$i]['harga'],2,',','.'); ?></div>
											</div>
										 <?php } ?>

									</div>
								</a>
								<div class="row ml-0 mr-0">
									<div class="blue_button add_to_cart_button col-6"><a href="#">Beli</a></div>
									<div class="red_button add_to_cart_button col-6"><a href="#">Keranjang</a></div>		
								</div>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>



	<script src="<?php echo base_url() ?>nassets/js/custom.js"></script>


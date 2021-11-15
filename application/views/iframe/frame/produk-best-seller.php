	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>nassets/styles/main_styles.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>nassets/styles/responsive.css">

	<style type="text/css">
		.add_to_cart_button {
		    margin-left: 0px !important;
		}
	</style>

	<div class="best_sellers">
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<div class="section_title new_arrivals_title">
						<h2>Best Sellers</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="product_slider_container">
						<div class="owl-carousel owl-theme product_slider">
							<?php 
						    $best_seller = $this->modelweb->daftar_produk();
							for ($i=0; $i < count($best_seller); $i++) { 
							?>
								<div class="owl-item product_slider_item">
									<div class="product-item">
										<a href="<?php echo base_url() ?><?echo $best_seller[$i]['link'] ?>">
											<div class="product discount product_filter">
												<div class="product_image">
													<img src="<?php echo base_url().'gambar/produk/gambar-utama/'.$best_seller[$i]['gambar_utama'] ?>"  alt="">
												</div>

												<!-- <div class="favorite favorite_left"></div>
												<div class="favorite"></div> -->
												
												<div class="product_info">
													<h6 class="product_name"><a href="single.html"><?php echo $best_seller[$i]['nama_produk'] ?></a></h6>
													<div class="product_price"><?php echo number_format($best_seller[$i]['harga'],2,',','.'); ?></div>
												</div>
											</div>
										</a>
										<div class="row ml-0 mr-0">
											<div class="blue_button add_to_cart_button col-6"><a href="#">Beli</a></div>
											<div class="red_button add_to_cart_button col-6"><a href="#">Keranjang</a></div>		
										</div>
									</div>
								</div>								
							<?php } ?>
							
						</div>
						<!-- Slider Navigation -->
						<div class="product_slider_nav_left product_slider_nav d-flex align-items-center justify-content-center flex-column">
							<i class="fa fa-chevron-left" aria-hidden="true"></i>
						</div>
						<div class="product_slider_nav_right product_slider_nav d-flex align-items-center justify-content-center flex-column">
							<i class="fa fa-chevron-right" aria-hidden="true"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>




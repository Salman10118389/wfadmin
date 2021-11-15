
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>nassets/styles/single_styles.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>nassets/styles/single_responsive.css">
	<style type="text/css">
		.single_product_container{
			margin-top: 0px;
		}
	</style>
	
	<div class="container single_product_container">
		<div class="row">
			<div class="col-lg-7">
				<div class="single_product_pics">
					<div class="row">
						<div class="col-lg-3 thumbnails_col order-lg-1 order-2">
							<div class="single_product_thumbnails">
								<ul>

									<?php 
										$data = $this->modelproduk->detail_produk("cubix");
									?>

									<li><img src="gambar/produk/gambar-utama/<?php echo $data[0]['gambar_utama'] ?>" alt="" data-image="gambar/produk/gambar-utama/<?php echo $data[0]['gambar_utama'] ?>"></li>

									<li><img src="gambar/produk/gambar-depan/<?php echo $data[0]['gambar_pertama'] ?>" alt="" data-image="gambar/produk/gambar-depan/<?php echo $data[0]['gambar_pertama'] ?>"></li>

									<li><img src="gambar/produk/gambar-kiri/<?php echo $data[0]['gambar_kedua'] ?>" alt="" data-image="gambar/produk/gambar-kiri/<?php echo $data[0]['gambar_kedua'] ?>"></li>


									




								</ul>
							</div>
						</div>
						<div class="col-lg-9 image_col order-lg-2 order-1">
							<div class="single_product_image">
								<div class="single_product_image_background" style="background-image:url('gambar/produk/gambar-utama/<?php echo $data[0]['gambar_utama'] ?>')"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-5">
				<div class="product_details">
					<div class="product_details_title">
						<h2><?php echo $data[0]['nama_produk'] ?></h2>
						<p><?php echo $data[0]['detail'] ?></p>
					</div>
					<div class="free_delivery d-flex flex-row align-items-center justify-content-center">
						<span class="ti-truck"></span><span>free delivery</span>
					</div>
					<div class="original_price"><?php echo $data[0]['harga'] ?></div>
					<div class="product_price"><?php echo $data[0]['harga'] ?></div>

					<ul class="star_rating">
						<li><i class="fa fa-star" aria-hidden="true"></i></li>
						<li><i class="fa fa-star" aria-hidden="true"></i></li>
						<li><i class="fa fa-star" aria-hidden="true"></i></li>
						<li><i class="fa fa-star" aria-hidden="true"></i></li>
						<li><i class="fa fa-star-o" aria-hidden="true"></i></li>
					</ul>
					<div class="product_color">
						<span>Select Color:</span>
						<ul>
							<li style="background: #e54e5d"></li>
							<li style="background: #252525"></li>
							<li style="background: #60b3f3"></li>
						</ul>
					</div>
					<div class="quantity d-flex flex-column flex-sm-row align-items-sm-center">
						<span>Quantity:</span>
						<div class="quantity_selector">
							<span class="minus"><i class="fa fa-minus" aria-hidden="true"></i></span>
							<span id="quantity_value">1</span>
							<span class="plus"><i class="fa fa-plus" aria-hidden="true"></i></span>
						</div>
						<div class="red_button add_to_cart_button"><a href="#">add to cart</a></div>
						<div class="product_favorite d-flex flex-column align-items-center justify-content-center"></div>
					</div>
				</div>
			</div>
		</div>

	</div>

	<!-- Tabs -->

	<script src="<?php echo base_url() ?>nassets/js/single_custom.js"></script>
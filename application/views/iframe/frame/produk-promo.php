
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>nassets/styles/main_styles.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>nassets/styles/responsive.css">

	<div class="deal_ofthe_week">
		<div class="container">
			<div class="row align-items-center">
				<?php $promo = $this->modelproduk->produk_promo();?>
				<div class="col-lg-6">
					<div class="deal_ofthe_week_img">
						<img src="<?php echo base_url().'gambar/produk/gambar-promo/'.$promo[0]['gambar_promo'] ?>"  alt="">
						<div class="corner-ribbon top-left sticky red shadow">
							Diskon <?php echo $promo[0]['diskon'] ?> % <br>
							<div class="product_price promo text-white"><?php echo number_format($promo[0]['harga'],2,',','.'); ?><span class="harga_asli"><?php echo number_format($promo[0]['harga'],2,',','.'); ?></span></div>
						</div>
					</div>
				</div>

				<div class="col-lg-6 text-right deal_ofthe_week_col">
					<div class="deal_ofthe_week_content d-flex flex-column align-items-center float-right">
						<div class="section_title">
							<h2>Promo Minggu Ini</h2>
						</div>

						<ul class="timer">
							<li class="d-inline-flex flex-column justify-content-center align-items-center">
							<?php 
								$day = date ('D');
								switch ($day) {
								    case "Sunday":
								        $days = 0;
								        break;
								    case "Monday":
								        $days = 6;
								        break;
								    case "Tuesday":
								        $days = 5;
								        break;
								    case "Wednesday":
								        $days = 4;
								        break;
								    case "Thursday":
								        $days = 3;
								        break;
								    case "Friday":
								        $days = 2;
								        break;
								    case "Saturday":
								        $days = 1;
								        break;
								}
							?>


								<div id="day" class="timer_num">09</div>
								<div class="timer_unit">Day</div>
							</li>
							<li class="d-inline-flex flex-column justify-content-center align-items-center">
								<div id="hour" class="timer_num">05</div>
								<div class="timer_unit">Hours</div>
							</li>
							<li class="d-inline-flex flex-column justify-content-center align-items-center">
								<div id="minute" class="timer_num">05</div>
								<div class="timer_unit">Mins</div>
							</li>
							<li class="d-inline-flex flex-column justify-content-center align-items-center">
								<div id="second" class="timer_num">03</div>
								<div class="timer_unit">Sec</div>
							</li>
						</ul>

						<div class="red_button deal_ofthe_week_button"><a href="#">Beli Sekarang</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>
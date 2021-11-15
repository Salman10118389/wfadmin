	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>nassets/styles/main_styles.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>nassets/styles/responsive.css">

<style type="text/css">
	.main_slider {
		margin-top: 0px;
	}
</style>

	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
	  <ol class="carousel-indicators">
			<?php 
                $slider = $this->modelslider->ambil_slider_home(1);
                $status = 'class="active"';
                for ($i=0; $i < count($slider); $i++) { ?>
					<li data-target="#carouselExampleIndicators" data-slide-to="0" <?php echo $status ?> ></li>
            <?php
            	$status = '';
                }
            ?>
	  </ol>
	  <div class="carousel-inner">
		<?php 
			$status = "active";
            for ($i=0; $i < count($slider); $i++) { ?>
					<div class="carousel-item <?php echo $status ?>">
						<a href="<?php echo($slider[$i]['url_tujuan']) ?>" target="_BLANK">
					 		<div class="main_slider" style="background-image:url(<?php echo base_url() ?>gambar/slider/<?php echo($slider[$i]['nama_gambar']) ?>)" title="Gambar <?php echo($slider[$i]['title']) ?>">
								

								<!-- <div class="container fill_height">
									<div class="row align-items-center fill_height">
										<div class="col">
											<div class="main_slider_content">
												<h6>Spring / Summer Collection 2017</h6>
												<h1>Get up to 30% Off New Arrivals</h1>
												<div class="red_button shop_now_button"><a href="#">shop now</a></div>
											</div>
										</div>
									</div>
								</div> -->


							</div>
						</a>
				    </div>
        <?php
        	$status = '';
            }
        ?>

	  </div>
	  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
	    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
	    <span class="sr-only">Previous</span>
	  </a>
	  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
	    <span class="carousel-control-next-icon" aria-hidden="true"></span>
	    <span class="sr-only">Next</span>
	  </a>
	</div>


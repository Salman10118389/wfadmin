
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>nassets/styles/main_styles.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>nassets/styles/responsive.css">
	<footer class="footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="footer_social d-flex flex-row align-items-center justify-content-left">
						<div>Design by <a href="https://colorlib.com/">Colorlib</a></div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="footer_social d-flex flex-row align-items-center justify-content-lg-end justify-content-right">
						<ul>
							<?php 
			                    $sosial = $this->modelsosial->daftar_sosial();
			                    for ($i=0; $i < count($sosial); $i++) { ?>
									<li><a href="<?php echo $sosial[$i]['url'] ?>" title="<?php echo $sosial[$i]['title'] ?>"><i class="<?php echo $sosial[$i]['logo'] ?>" aria-hidden="true"></i></a></li>
							<?php } ?>

								<!-- <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li> -->

						</ul>
					</div>
				</div>
			</div>
		</div>
	</footer>

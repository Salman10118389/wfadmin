	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>nassets/styles/main_styles.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>nassets/styles/responsive.css">
	<div class="benefit">
		<div class="container">
			<div class="row benefit_row">
				<?php 
                    $jaminan = $this->modeljaminan->daftar_jaminan();
                    for ($i=0; $i < count($jaminan); $i++) { ?>
					<div class="col-lg-3 benefit_col">
						<div class="benefit_item d-flex flex-row align-items-center">
							<div class="benefit_icon"><i class="<?php echo $jaminan[$i]['logo'] ?>" aria-hidden="true"></i></div>
							<div class="benefit_content">
								<h6><?php echo $jaminan[$i]['title'] ?></h6>
								<p><?php echo $jaminan[$i]['keterangan'] ?></p>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>

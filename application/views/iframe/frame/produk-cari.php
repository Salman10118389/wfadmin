

	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>nassets/styles/categories_styles.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>nassets/styles/categories_responsive.css">

	<style type="text/css">
		.product_section_container{
			margin-top: 0px;
		}
	</style>

	<div class="container product_section_container">
		<div class="row">
			<div class="col product_section clearfix">
				<div class="sidebar">
					<div class="sidebar_section">
						<div class="sidebar_title">
							<h5>Type Produk</h5>
						</div>
						<ul class="sidebar_categories">
						<?php 
							$curenturl = base_url()."timbangan?page=1&sortir=nama-asc&sortir=nama-asc";
							$type = "";
							$page = 1;
							$sorturl = str_replace("&type=".$type, "", $curenturl);
							$sorturl = str_replace("page=".$page, "page=1", $sorturl);
							$listtype = $this->modelproduk->daftar_list_type();
							$listfungsi = $this->modelproduk->daftar_list_fungsi();
							$produk = $this->modelproduk->daftar_produk(0, "", $type, "nama-asc", "");
							$jumlah = $this->modelproduk->jumlah_produk();
							$jumlahpage = round($jumlah/12);
							$fungsi = "";
							$sortir = "";
							if($jumlahpage < $jumlah/12){
								$jumlahpage = $jumlahpage +1;
							}

  				    	    for($p = 0; $p < count($listtype); $p++ ) { ?>
  				    	    	<li 
  				    	    	<?php if($listtype[$p]['link_list'] == $type){ ?>
  				    	    		class="active"
	  				    	    <?php } ?>
	  				    	    >
  				    	    		<a href="<?php echo $sorturl."&type=".$listtype[$p]['link_list'] ?>">
  				    	    	<?php if($listtype[$p]['nama_list'] == $type){ ?>
  				    	  			<span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>
							    <?php } ?>
  				    	    		<?php echo $listtype[$p]['nama_list'] ?></a></li>
						    <?php } ?>	
						</ul>
					</div>
					<div class="sidebar_section">
						<div class="sidebar_title">
							<h5>Fungsi Produk</h5>
						</div>
						<ul class="sidebar_categories">
							<?php 
							$sorturl = str_replace("&fungsi=".$fungsi, "", $curenturl);
							$sorturl = str_replace("page=".$page, "page=1", $sorturl);
  				    	    for($p = 0; $p < count($listfungsi); $p++ ) { ?>
  				    	    	<li 
  				    	    	<?php if($listfungsi[$p]['link_list'] == $fungsi){ ?>
  				    	    		class="active"
	  				    	    <?php } ?>
	  				    	    >
  				    	    		<a href="<?php echo $sorturl."&fungsi=".$listfungsi[$p]['link_list'] ?>">
  				    	    	<?php if($listfungsi[$p]['nama_list'] == $fungsi){ ?>
  				    	  			<span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>
							    <?php } ?>
  				    	    		<?php echo $listfungsi[$p]['nama_list'] ?></a></li>
						    <?php 

							} ?>	
						</ul>
					</div>


					<!-- <div class="sidebar_section">
						<div class="sidebar_title">
							<h5>Filter by Price</h5>
						</div>
						<p>
							<input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
						</p>
						<div id="slider-range"></div>
						<div class="filter_button"><span>filter</span></div>
					</div>
 -->


				</div>
				<style type="text/css">
					input:focus {   
					  border-color: #e3e3e3 !important;
					  box-shadow: none !important;
					  outline: 0 none;
					}

					.add_to_cart_button{
						margin-left: 0px; 
					}

					.center-pagination {
					    display: flex;
					    justify-content: center;
					    align-items: centet;
					}

					.font-action{
						font-size: 10px !important;
					}
				</style>
				<!-- Main Content -->
				<div class="main_content">
					<!-- Products -->
					<div class="products_iso">
						<div class="row">
							<div class="col">
								<!-- Product Sorting -->
								<div class="product_sorting_container product_sorting_container_top row">
									<div class="form-group col-8">
									   <small class="form-text text-muted">Tekan Enter Untuk Mencari</small>
									   <input type="text" class="form-control" placeholder="Cari Timbangan" id="cari">
									   <script type="text/javascript">
									   	$('document').ready(function(){
											alert("okes");
										    $('#cari').keypress(function(e){
										        if(e.which == 13){        	
												<?php 
													echo "var url = "."\"".$curenturl."\"";
												?>
										        	window.location = url + "&cari=asdasd";
										        }
										    });
										});
									   </script>
									</div>
									<ul class="product_sorting col-4">
										<small class="form-text text-muted">Sortir Berdasarkan</small>
										<li class="col-md-12">
											<span class="type_sorting_text col-md-12">
												Nama ASC
											</span>
											<i class="fa fa-angle-down"></i>
											<ul class="sorting_type">
												<li class="type_sorting_btn"><a href="<?php echo $sorturl."&sortir=nama-asc" ?>"><span>Nama ASC</span></a></li>
												<li class="type_sorting_btn"><a href="<?php echo $sorturl."&sortir=nama-dsc" ?>"><span>Nama DSC</span></a></li>
												<li class="type_sorting_btn"><a href="<?php echo $sorturl."&sortir=harga-asc" ?>"><span>Harga ASC</span></a></li>
												<li class="type_sorting_btn"><a href="<?php echo $sorturl."&sortir=harga-dsc" ?>"><span>Harga DSC</span></a></li>
												<li class="type_sorting_btn"><a href="<?php echo $sorturl."&sortir=kategori-asc" ?>"><span>Kategori DESC</span></a></li>
												<li class="type_sorting_btn"><a href="<?php echo $sorturl."&sortir=kategori-dsc" ?>"><span>Kategori DESC</span></a></li>

											</ul>
										</li>
									</ul>
								</div>
								<!-- Product Grid -->
								<div class="product-grid row">

									<?php 

										for ($i = 0; $i < count($produk); $i++) { ?>
										<div class="product-item <?php echo 'a' ?>">
											<a href="<?php echo base_url().$produk[$i]['link_list'].'-merek-'.$produk[$i]['link'] ?>">
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
												<div class="blue_button add_to_cart_button col-6"><a href="#" class="font-action">Beli</a></div>
												<div class="red_button add_to_cart_button col-6"><a href="#"  class="font-action">Keranjang</a></div>							
											</div>
										</div>
									<?php } ?>
									</div>

									<nav aria-label="Page navigation example" class="center-pagination">
									  <ul class="pagination">

									  	<?php
							                if(!strpos($curenturl, '?')){
							                    $curenturl = $curenturl."?";
							                }
								    		if(strpos($curenturl, 'page=')){
								    			$firstpage = str_replace("page=".$page,"page=1", $curenturl);
							    			}else{
							    				$firstpage = $curenturl."page=1";
							    			}
						    				$disabled = "";
							    			if($page == 1){
							    				$firstpage = "#";
							    				$disabled = "disabled";
							    			}

							    		?>

									    <li class="page-item <?php echo($disabled); ?>"><a class="page-link" href="
									    	<?php echo($firstpage); ?>
								    	"><<</a></li>

								    	<?php 
								    		if(strpos($curenturl, 'page=')){
								    			$beforepage = str_replace("page=".$page,"page=".($page-1), $curenturl);
							    			}else{
							    				$beforepage = $curenturl."page=".($page-1);
							    			}
							    			$disabled = "";
							    			if($page == 1){
								    			$beforepage = "#";
								    			$disabled = "disabled";
								    		}
							    		?>

									    <li class="page-item <?php echo($disabled); ?>"><a class="page-link" href="
									    	<?php echo($beforepage); ?>
									    "><</a></li>

									    <?php 
									    	 for($a = 1; $a <= $jumlahpage; $a++ ) { ?>
									    	
									    		<li class="page-item 
									    			<?php if ($page == $a){ echo 'active'; } ?>
									    			"><a class="page-link"  href="
												    	<?php 
												    		if(strpos($curenturl, 'page=')){
												    			echo str_replace("page=".$page,"page=".$a, $curenturl);
											    			}else{
											    				echo $curenturl."page=1";
											    			}
											    		?>
											    	">
									    			<?php 
									    				echo $a; 
									    			?>
									    		</a></li>
									    <?php } 
								    		if(strpos($curenturl, 'page=')){
								    			$nextpage = str_replace("page=".$page,"page=".($page+1), $curenturl);
							    			}else{
							    				 $nextpage = $curenturl."page=".($page+1);
							    			}
							    			$disabled = "";
								    		if($page == $jumlahpage){
								    			$nextpage = "#";
								    			$disabled = "disabled";
								    		}
							    		?>

									    <li class="page-item <?php echo($disabled); ?>"><a class="page-link" href="
								    		<?php echo($nextpage); ?>
								    	">></a></li>
								    	
								    	<?php 
								    		if(strpos($curenturl, 'page=')){
								    			$lasturl = str_replace("page=".$page,"page=".$jumlahpage, $curenturl);
							    			}else{
							    				$lasturl = $curenturl."page=".$jumlahpage;
							    			}
							    			$disabled = "";
								    		if($page == $jumlahpage){
								    			$lasturl = "#";
								    			$disabled = "disabled";
								    		}
							    		?>
									    <li class="page-item <?php echo($disabled); ?>"><a class="page-link" href="
									    	<?php echo($lasturl); ?>
									    ">>></a></li>
									  </ul>
									</nav>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

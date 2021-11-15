	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>nassets/styles/main_styles.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>nassets/styles/responsive.css">
<style type="text/css">
	.btn-fb{
	    color: #fff!important;
	    background-color: #3b5998!important;
	    border-color: #3b5998!important;
	    font-size: 24px!important;
	    text-align: right!important;
	    border-radius: 0px!important;
	}
	.btn-tw{
	    color: #fff!important;
	    background-color: #55acee!important;
	    border-color: #55acee!important;
	    font-size: 24px!important;
	    text-align: right!important;
	    border-radius: 0px!important;
	}
	.btn-gplus{
	    color: #fff!important;
	    background-color: #dd4b39!important;
	    border-color: #dd4b39!important;
	    font-size: 24px!important;
	    text-align: right!important;
	    border-radius: 0px!important;
	}
	.btn-li{
	    color: #fff!important;
	    background-color: #0082ca!important;
	    border-color: #0082ca!important;
	    font-size: 24px!important;
	    text-align: right!important;
	    border-radius: 0px!important;
	}
	.sosial-btn{
		 margin:0px; 
		 margin-bottom:10px;
	}
	.center-menu{
		 width: unset!important; 
		 margin-right: -120px!important;
	}
</style>

<div class="super_container">
	<!-- Header -->
	<header class="header trans_300">
		<!-- Top Navigation -->
		<div class="top_nav">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="top_nav_left">Temukan Semua Kebutuhan Timbanganmu</div>
					</div>
					<div class="col-md-6 text-right">
						<div class="top_nav_right">
							<ul class="top_nav_menu">
								<li class="account">
									<a href="#">
										Login
										<i class="fa fa-angle-down"></i>
									</a>
									<ul class="account_selection center-menu">
										<form action="<?php echo base_url() ?>login-user" method="post">
											<li>
												<input type="Email" name="email" placeholder="Email">
											</li>
											<li>
												<input type="password" name="password" placeholder="Password">
											</li>
											<li>
												<button type="submit" class="col-12">Masuk</button>
											</li>
											<li>
												atau login dengan
											</li>
											<li class="row sosial-btn">
												<!--Facebook-->
												<a href="<?php echo $this->session->userdata('link_facebook') ?>" class="btn btn-fb col-3"><i class="fa fa-facebook-f"></i> </a>
												<!--Twitter-->
												<a href="<?php echo base_url() ?>user/dashboard" class="btn btn-tw col-3"><i class="fa fa-twitter"></i> </a>
												<!--Google +-->
												<a href="<?php echo $this->session->userdata('link_google') ?>" class="btn btn-gplus col-3"><i class="fa fa-google-plus"></i> </a>
												<!--Linkedin-->
												<a href="<?php echo base_url() ?>user/dashboard" class="btn btn-li col-3"><i class="fa fa-linkedin"></i> </a>
											</li>
										</form>
									</ul>
								</li>
								<li class="account">
									<a href="#">
										Register
										<i class="fa fa-angle-down"></i>
									</a>
									<ul class="account_selection center-menu">
										<form action="<?php echo base_url() ?>register-user" method="post">
											<li>
												<input type="text" name="nama" placeholder="Nama">
											</li>
											<li>
												<input type="text" name="instansi" placeholder="Instansi (dapat dikosongkan )">
											</li>
											<li>
												<input type="text" name="handphone" placeholder="Nomor Handphone">
											</li>
											<li>
												<input type="Email" name="email" placeholder="Email">
											</li>
											<li>
												<input type="password" name="password" placeholder="Password">
											</li>
											<li>
												<button type="submit" class="col-12">Masuk</button>
											</li>
											<li>
												atau daftar dengan
											</li>
											<li class="row sosial-btn">
												<!--Facebook-->
												<a href="<?php echo $this->session->userdata('link_facebook') ?>" class="btn btn-fb col-3"><i class="fa fa-facebook-f"></i> </a>
												<!--Twitter-->
												<a href="<?php echo base_url() ?>user/dashboard" class="btn btn-tw col-3"><i class="fa fa-twitter"></i> </a>
												<!--Google +-->
												<a href="<?php echo $this->session->userdata('link_google') ?>" class="btn btn-gplus col-3"><i class="fa fa-google-plus"></i> </a>
												<!--Linkedin-->
												<a href="<?php echo base_url() ?>user/dashboard" class="btn btn-li col-3"><i class="fa fa-linkedin"></i> </a>
											</li>																		
										</form>
									</ul>
								</li>

								<script type="text/javascript">
									function register(){
										$.ajax({
										    type: 'POST',
										    url: 'http://nakolesah.ru/',
										    data: { 
										        'foo': 'bar', 
										        'ca$libri': 'no$libri' // <-- the $ sign in the parameter name seems unusual, I would avoid it
										    },
										    success: function(msg){
										        alert('wow' + msg);
										    }
										});										
									}
								</script>

								<li class="account">
									<a href="#">
										My Account
										<i class="fa fa-angle-down"></i>
									</a>
									<ul class="account_selection">
										<li><a href="#"><i class="fa fa-sign-in" aria-hidden="true"></i>Sign In</a></li>
										<li><a href="#"><i class="fa fa-user-plus" aria-hidden="true"></i>Register</a></li>
									</ul>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="main_nav_container">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 text-right">
						<div class="logo_container">
							<a href="#">
								<img src="<?php echo base_url();?>gambar/themplate/home-logo.png">
							</a>
						</div>
						<nav class="navbar">
							<ul class="navbar_menu">
								<?php 
				                    $menu = $this->modelweb->ambil_menu();
				                    for ($i=0; $i < count($menu); $i++) { ?>
										<li><a href="<?php echo base_url().$menu[$i]['link'] ?>"><?php echo $menu[$i]['title'] ?></a></li>
								<?php } ?>
							</ul>
							<ul class="navbar_user">
								<?php 
				                    $menu = $this->modelweb->spesial_menu_home();
				                    for ($i=0; $i < count($menu); $i++) { ?>
										<li class="checkout">
											<a href="<?php echo base_url().$menu[$i]['link'] ?>">
												<i class="<?php echo $menu[$i]['logo'] ?>" aria-hidden="true"></i>
												<span id="<?php echo $menu[$i]['id_span'] ?>" class="checkout_items">2</span>
											</a>
										</li>
								<?php } ?>
							</ul>
							<div class="hamburger_container">
								<i class="fa fa-bars" aria-hidden="true"></i>
							</div>
						</nav>
					</div>
				</div>
			</div>
		</div>

		<div class="fs_menu_overlay"></div>
		<div class="hamburger_menu">
			<div class="hamburger_close"><i class="fa fa-times" aria-hidden="true"></i></div>
			<div class="hamburger_menu_content text-right">
				<ul class="menu_top_nav">
					<li class="menu_item has-children">
						<a href="#">
							My Account
							<i class="fa fa-angle-down"></i>
						</a>
						<ul class="menu_selection">
							<li><a href="#"><i class="fa fa-sign-in" aria-hidden="true"></i>Sign In</a></li>
							<li><a href="#"><i class="fa fa-user-plus" aria-hidden="true"></i>Register</a></li>
						</ul>
					</li>
					<li class="menu_item has-children">
						<a href="#">
							My Account
							<i class="fa fa-angle-down"></i>
						</a>
						<ul class="menu_selection">
							<li><a href="#"><i class="fa fa-sign-in" aria-hidden="true"></i>Sign In</a></li>
							<li><a href="#"><i class="fa fa-user-plus" aria-hidden="true"></i>Register</a></li>
						</ul>
					</li>
					<?php 
	                    $menu = $this->modelweb->ambil_menu();
	                    for ($i=0; $i < count($menu); $i++) { ?>
						<li class="menu_item"><a href="<?php echo base_url().$menu[$i]['link'] ?>"><?php echo $menu[$i]['title'] ?></a></li>
					<?php } ?>
				</ul>
			</div>
		</div>

	</header>


        <?php $this->load->view('admin/themplate/top-headbar'); ?>
        <?php $this->load->view('admin/themplate/logo-headbar'); ?>
        <?php $this->load->view('admin/themplate/mobile-headbar'); ?>

            <!-- Mobile Menu end -->
            <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list single-page-breadcome">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <ul class="breadcome-menu">
                                            <?php 
                                                $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                                                $url = base_url();
                                                $bread = str_replace(base_url(),"",$actual_link);
                                                $bread = str_replace("-"," ",$bread);
                                                $bread = explode("/", $bread);
                                                for ($i=0; $i < count($bread); $i++) {
                                                    $url = $url.str_replace(" ","-",$bread[$i]);
                                                    if($i < (count($bread)-1)){ ?>
                                                        <li><a href="<?php echo $url ?>"><?php echo ucwords($bread[$i]) ?></a></li>
                                                        <li> <span class="bread-slash">/</span></li>
                                                    <?php 
                                                    $url = $url."/";
                                                } else{ ?>
                                                        <li><span class="bread-blod"><?php echo ucwords($bread[$i]) ?></span>     
                                                <?php  
                                                }
                                            } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

            
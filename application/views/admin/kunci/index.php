
<?php 
    $this->session->set_userdata('last_url', str_replace(base_url(),"",$_SERVER["HTTP_REFERER"]));
    $this->session->set_userdata('login', 0);
?>

    <div class="color-line"></div>
    <div class="container-fluid all">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 mt-10">
                    <div class="hpanel">
                        <div class="panel-body text-center lock-inner">
                            <img src="<?php echo base_url()."image/admin/".$this->session->userdata('photo') ?>" style="width: 200px;margin: 0px auto;height: 200px;opacity: 0.2;">
                            <i class="fa fa-lock" aria-hidden="true" style="position: absolute;margin-left: -127px;margin-top: 70px;"></i>
                            <br>
                            <h4><span class="text-success"><?php echo $this->session->userdata('nama'); ?></span></h4>
                            <h4><span class="text-success">3:43:15 PM</span></h4>
                            <h4><strong>Friday, February 27, 2015</strong></h4>
                            <p>Your are in lock screen. Main app was shut down and you need to enter your passwor to go back to app.</p>
                            <form action="<?php echo base_url(); ?>admin/buka-kunci" method="post" class="m-t">
                                <div class="form-group">
                                    <input type="password" required="" name="password" placeholder="******" class="form-control">
                                </div>
                                <button class="btn btn-primary block full-width" type="submit">Unlock</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
        </div>
    </div>
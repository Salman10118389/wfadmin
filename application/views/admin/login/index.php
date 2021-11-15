    <div class="color-line"></div>
    <div class="container-fluid all">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
            <div class="col-md-4 col-md-4 col-sm-4 col-xs-12" style="margin-top:5%">
                <div class="text-center m-b-md custom-login ">
                    <img src="<?php echo base_url() ?>gambar/template/logo.png" style="width: 330px;">
                    <p>Conten Management System Warung Freelancer</p>
                </div>
                <div class="hpanel">
                    <div class="panel-body">
                        <form action="<?php echo base_url() ?>login/cek-login" method="post">
                            <div class="form-group">
                                <label class="control-label" for="password">Kontak</label>
                                <input type="text" placeholder="username" value="" name="kontak" id="username" class="form-control">
                                <span class="help-block small"></span>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Password</label>
                                <input type="password" title="Please enter your password" placeholder="******" value="" name="password" id="password" class="form-control">
                                <span class="help-block small"></span>
                            </div>
                            <button class="btn btn-success btn-block loginbtn">Login</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
        </div>
    </div>

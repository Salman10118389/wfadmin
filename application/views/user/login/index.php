    <div class="color-line"></div>
    <div class="container-fluid all">
        <div class="row">
           <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
            <div class="col-md-4 col-md-4 col-sm-4 col-xs-12" style="margin-top:5%">
                <img src="<?php echo base_url() ?>gambar/themplate/logodhk.png" style="margin-left:130px">
                <div class="text-center m-b-md custom-login ">
                    <h3>DHK Online Sistem</h3>
                    <p>Sistem pemantauan pabrik DHK</p>
                </div>
                <div class="hpanel">
                    <div class="panel-body">
                        <form action="<?php echo base_url() ?>user/koneksi-timbangan" method="post">
                            <div class="form-group">
                                <label class="control-label" for="password" style="font-size: 20px">Nama Timbangan</label>
                                <input type="text" placeholder="Nama Timbangan" name="nama_timbangan"  class="form-control"  style="text-align: center;height: 100px; font-size: 40px">
                                <span class="help-block small"></span>
                            </div>
                            <button class="btn btn-success btn-block loginbtn" style="height: 100px; font-size: 38px">Temukan Timbangan</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
        </div>
    </div>

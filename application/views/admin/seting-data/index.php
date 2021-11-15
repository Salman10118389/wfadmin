<style type="text/css">
    .bg-white{
        background: white;
    }

    .add-submenu-dalam::after {
        border-top: none;
        border-bottom: none;
    }

    .add-submenu-luar::before {
        background: white;
    }

    .bg-white::after{
        border-left: 11px solid white;
    }

    .action{
        margin-top: 10px;
    }

    .edit{
        margin-left: 35px;
    }

    .alert-success-style1::before, .alert-success-style2::before, .alert-success-style3::before, .alert-success-style4::before {
        width: 11%;
    }

    .alert-success-style1::after, .alert-success-style2::after, .alert-success-style3::after, .alert-success-style4::after {
        border-top: none;
        border-bottom: none;
    }
    .ml-3{
        margin-left: 30px;
    }

    .form-radio {
        display: none;
    }

    .mt-2{
        margin-top: -2px;
    }

    .mlr-0{
        margin-right: 0px;
        margin-left: 0px;
    }

    .radio{
        margin-top: 0px;
    }

    .radio + .radio{
        margin-top: 0px;
    }

    .awesome-font-box{
        max-height: 100px;
        overflow: auto;
        background: #e3e3e3;
        padding: 15px;
    }

    .mt-25{
        margin-top: 25px;
    }

    .judul{
        height: 60px;
    }

    .width100{
        width: 100%;
    }

    .ptpb{
        padding-top: 3px;
        padding-bottom: 3px;
    }

</style>
        <!-- Alert Start-->
        <div class="alert-area mg-tb-15">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="alert-icon shadow-reset wrap-alert-b">
                            <div class="alert-title">
                                <h2>Menu</h2>
                                <p>Tambah, Hapus, Dan Edit Semua Menu</p>
                            </div>
                            <div class="panel-group adminpro-custon-design" id="accordions">
                                <div class="panel panel-default">
                                    <div class="panel-heading accordion-head judul">

                                        <a data-toggle="collapse" data-parent="#accordions" href="#usermenus">
                                            <div class="col-xs-8 col-sm-8 col-md-8">
                                                <h2 class="panel-title float-left">Setting Harga Pokok</h2>
                                                <p class="float-left">Ubah harga pokok yang menjadi patokan rumus</p>
                                            </div>
                                        </a>
                                        <div class="btn btn-primary col-xs-3 col-sm-3 col-md-3 ml-3" >Simpan Perubahan</div>

                                    </div>
                                    <div id="usermenus" class="panel-collapse panel-ic collapse in width100">
                                        <div class="panel-body admin-panel-content">

                                            <div class="alert alert-success alert-success-style1">
                                                <button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
                                                        <span class="icon-sc-cl" aria-hidden="true">&times;</span>
                                                    </button>
                                                <i class="fa fa-check adminpro-checked-pro admin-check-pro" aria-hidden="true"></i>
                                                <p><strong>Success!</strong> Indicates a successful or positive action.</p>
                                            </div>
                                            <div class="alert alert-info alert-success-style2">
                                                <button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
                                                        <span class="icon-sc-cl" aria-hidden="true">&times;</span>
                                                    </button>
                                                <i class="fa fa-info-circle adminpro-inform admin-check-pro" aria-hidden="true"></i>
                                                <p><strong>Info!</strong> Indicates a neutral informative change or action.</p>
                                            </div>
                                            <div class="alert alert-warning alert-success-style3">
                                                <button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
                                                        <span class="icon-sc-cl" aria-hidden="true">&times;</span>
                                                    </button>
                                                <i class="fa fa-exclamation-triangle adminpro-warning-danger admin-check-pro" aria-hidden="true"></i>
                                                <p><strong>Warning!</strong> A warning that might need attention.</p>
                                            </div>
                                            <div class="alert alert-danger alert-mg-b alert-success-style4">
                                                <button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
                                                        <span class="icon-sc-cl" aria-hidden="true">&times;</span>
                                                    </button>
                                                <i class="fa fa-times adminpro-danger-error admin-check-pro" aria-hidden="true"></i>
                                                <p><strong>Danger!</strong> A dangerous or potentially negative action.</p>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="panel-group adminpro-custon-design" id="accordion">
                                <div class="panel panel-default">
                                    <div class="panel-heading accordion-head judul">

                                        <a data-toggle="collapse" data-parent="#accordion" href="#usermenu">
                                            <div class="col-xs-8 col-sm-8 col-md-8">
                                                <h2 class="panel-title float-left">Setting Aplikasi</h2>
                                                <p class="float-left">Uabh setingan aplikasi seperti warna, logo dan lainnya</p>
                                            </div>
                                        </a>
                                        <div class="btn btn-primary col-xs-3 col-sm-3 col-md-3 ml-3" onclick="tambahmenuuser()">Tambah Menu User</div>

                                    </div>
                                    <div id="usermenu" class="panel-collapse panel-ic collapse in width100">
                                        <div class="panel-body admin-panel-content">

                                            <div class="alert alert-success alert-success-style1">
                                                <button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
                                                        <span class="icon-sc-cl" aria-hidden="true">&times;</span>
                                                    </button>
                                                <i class="fa fa-check adminpro-checked-pro admin-check-pro" aria-hidden="true"></i>
                                                <p><strong>Success!</strong> Indicates a successful or positive action.</p>
                                            </div>
                                            <div class="alert alert-info alert-success-style2">
                                                <button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
                                                        <span class="icon-sc-cl" aria-hidden="true">&times;</span>
                                                    </button>
                                                <i class="fa fa-info-circle adminpro-inform admin-check-pro" aria-hidden="true"></i>
                                                <p><strong>Info!</strong> Indicates a neutral informative change or action.</p>
                                            </div>
                                            <div class="alert alert-warning alert-success-style3">
                                                <button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
                                                        <span class="icon-sc-cl" aria-hidden="true">&times;</span>
                                                    </button>
                                                <i class="fa fa-exclamation-triangle adminpro-warning-danger admin-check-pro" aria-hidden="true"></i>
                                                <p><strong>Warning!</strong> A warning that might need attention.</p>
                                            </div>
                                            <div class="alert alert-danger alert-mg-b alert-success-style4">
                                                <button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
                                                        <span class="icon-sc-cl" aria-hidden="true">&times;</span>
                                                    </button>
                                                <i class="fa fa-times adminpro-danger-error admin-check-pro" aria-hidden="true"></i>
                                                <p><strong>Danger!</strong> A dangerous or potentially negative action.</p>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>

                </div>
            </div>
        </div>
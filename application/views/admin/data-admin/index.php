    <style type="text/css">
        .hapus{
            position: absolute;
            margin-left: 300px;
            font-size: 20px;
            margin-top: -10px;
            color: red;
        }
        
        .edit{
            position: absolute;
            margin-left: 270px;
            font-size: 20px;
            margin-top: -10px;
            color: blue;
        }
        
        .view{
            position: absolute;
            margin-left: 240px;
            font-size: 20px;
            margin-top: -10px;
            color: green;
        }
        
        .mt30{
            margin-top:30px
        }

        .mt100{
            margin-top: 100px
        }

        .pb{
            position: block;
        }

        .profile{
            width: 100%
        }
    </style>

		<div class="author-area-pro mt30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="author-widgets-single">
                            <div class="row">
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                    <div class="input-group mg-b-pro-edt">
                                        <span class="input-group-addon"><i class="fa fa-search" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control quicksearch" placeholder="Cari Admin">
                                    </div>    
                                </div>
                                <a href="<?php echo base_url()?>admin/data-admin/tambah-admin" class="col-lg-3 col-md-3 col-sm-3 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="btn btn-block btn-primary col">Tambah Admin</div>
                                </a>                                            
                            </div>
                        </div>
                    </div>

                    <?php  
                        $optional = [];
                        $optional['select'] = "";
                        $optional['where'] = "";
                        $optional['search'] = "";
                        $optional['distinct'] = "";
                        $optional['join'] = "";
                        $optional['order_by'] = "";
                        $optional['limit'] = "";
                        $optional['offset'] = "";
                        $data = $this->modeladmin->ambil_data("admin_admin",$optional); 
                    ?>

                    <div class="grid mt100">
                        <?php for($i = 0; $i < count($data); $i++){ ?>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 element-item mt30 pb" data-category="admin">
                                <div class="author-widgets-single res-mg-t-30">
                                    <a href="<?php echo base_url()?>admin/data-admin/data-lengkap-admin/<?php echo $data[$i]['id'] ?>" class="lihat">
                                        <i class="fas fa-eye"></i>   
                                    </a>
                                    <a href="<?php echo base_url()?>admin/data-admin/edit-admin/<?php echo $data[$i]['id'] ?>" class="edit">
                                        <i class="fas fa-edit"></i>   
                                    </a>
                                    <a onclick="hapus('<?php echo $data[$i]['nama'] ?>', '<?php echo $data[$i]['id'] ?>', '<?php echo $data[$i]['photo'] ?>')" class="hapus">
                                        <i class="fas fa-trash-alt"></i>   
                                    </a>
                                    <div class="author-wiget-inner">
                                        <div class="perso-img">
                                            <img src="<?php echo base_url() ?>gambar/admin/<?php echo $data[$i]['photo'] ?>" class=" circle-border m-b-md profile" alt="profile">
                                        </div>
                                        <div class="persoanl-widget-hd persoanl1-widget-hd">
                                            <h2 class="nama"><?php echo $data[$i]['nama'] ?></h2>
                                            <p class="username"><?php echo $data[$i]['username'] ?></p>
                                            <p class="handphone"><?php echo $data[$i]['nomor_telepone'] ?></p>
                                        </div>
                                    </div>                                 
                                </div>
                            </div>
                         <?php } ?>                        
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            function hapus(nama, id, gambar){
                swal({
                    title: "Hapus Admin "+nama,
                    text: "Kirim Pesan Anda ?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Ya, Kirimkan !",
                    cancelButtonText: "Batal",
                    closeOnConfirm: false
                }, function (isConfirm) {
                    if (!isConfirm) return;
                    $.ajax({
                        url: "<?php echo base_url()?>admin/hapus-data",
                        type: "POST",
                        data: {
                            id            : id,
                            jenis         : "admin",
                            photo         : gambar,
                            nama          : nama
                        },
                        dataType: "html",
                        async: false,
                        success: function () {
                            location.reload(); 
                        },
                        error: function (xhr, ajaxOptions, thrownError) {
                            swal("Gagal!", "mohon coba lagi..", "error");
                        }
                    });
                });     
            }
        </script>



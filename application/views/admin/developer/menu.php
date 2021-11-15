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
                            <div class="panel-group adminpro-custon-design" id="accordion">
                                <div class="panel panel-default">
                                    <div class="panel-heading accordion-head judul">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#adminmenu">
                                            <div class="col-xs-8 col-sm-8 col-md-8">
                                                <h2 class="panel-title float-left">Admin Menu</h2>
                                                <p class="float-left">Tambah, Hapus, Dan Edit Menu Serta Urutannya</p>
                                            </div>
                                        </a>
                                        <div class="btn btn-primary col-xs-3 col-sm-3 col-md-3 ml-3" onclick="tambahadminmenu()">Tambah Menu Admin</div>
                                    </div>
                                    <div id="adminmenu" class="panel-collapse panel-ic collapse <?php echo($this->session->userdata('admin_menu')); $this->session->set_userdata('admin_menu', '');?> width100">
                                        <div class="panel-body admin-panel-content">

                                                <?php
                                                $data = []; 

                                                $curl = curl_init();
                                                curl_setopt_array($curl, array(
                                                  CURLOPT_URL => base_url()."api/ambil-menu-admin",
                                                  CURLOPT_RETURNTRANSFER => true,
                                                  CURLOPT_TIMEOUT => 30,
                                                  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                                  CURLOPT_CUSTOMREQUEST => "GET",
                                                  CURLOPT_HTTPHEADER => array(
                                                    "cache-control: no-cache"
                                                  ),
                                                ));
                                                $response = curl_exec($curl);
                                                $err = curl_error($curl);
                                                curl_close($curl);
                                                $response = json_decode($response, true);
                                                $menu = $response['data']; 

                                                $data['menu'][0] = "Pertama"; 
                                                $data['menu_urutan'][0] = 1; 
                                                for($i = 0; $i < count($menu); $i++){ 
                                                    $data['menu'][$i+1] = "Setelah ".$menu[$i]['title'];
                                                    $data['menu_urutan'][$i+1] = $menu[$i]['urutan']+1;
                                                    ?>
                                                <div class="alert ptpb 
                                                    <?php 
                                                        if($menu[$i]['status'] == "active"){ ?>
                                                            alert-info alert-success-style2
                                                    <?php 
                                                        }else{ ?>
                                                            alert-danger alert-success-style4
                                                    <?php } ?>
                                                ">
                                                <?php 
                                                    $curl = curl_init();
                                                    curl_setopt_array($curl, array(
                                                      CURLOPT_URL => base_url()."api/ambil-submenu-admin/".$menu[$i]['id'],
                                                      CURLOPT_RETURNTRANSFER => true,
                                                      CURLOPT_TIMEOUT => 30,
                                                      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                                      CURLOPT_CUSTOMREQUEST => "GET",
                                                      CURLOPT_HTTPHEADER => array(
                                                        "cache-control: no-cache"
                                                      ),
                                                    ));
                                                    $response = curl_exec($curl);
                                                    $err = curl_error($curl);
                                                    curl_close($curl);
                                                    $response = json_decode($response, true);
                                                    $submenu = $response['data']; 


                                                    if($menu[$i]['status'] == "active"){ ?>

                                                        <button type="button" class="close sucess-op edit action"  title="Edit Menu" aria-label="Close" onclick="ubahadminmenu('<?php echo $menu[$i]['id'] ?>', '<?php echo $menu[$i]['title'] ?>')">
                                                            <span class="icon-sc-cl" aria-hidden="true"><i class="fas fa-pen"></i></span>
                                                        </button>
                                                        
                                                        <button type="button" class="close sucess-op action" title="Inactive Menu" onclick="inactivemenu('<?php echo $menu[$i]['id'] ?>', '<?php echo $menu[$i]['title'] ?>', 'admin_menu' )" aria-label="Close">
                                                            <span class="icon-sc-cl" aria-hidden="true"><i class="fas fa-minus-circle"></i></span>
                                                        </button>

                                                    <?php 
                                                    }else{ 
                                                        if(count($submenu) > 0){
                                                        ?>

                                                        <button type="button" class="close sucess-op edit action" title="Hapus Menu" onclick="barier('<?php echo $menu[$i]['title'] ?>')" aria-label="Close">
                                                            <span class="icon-sc-cl" aria-hidden="true"><i class="fas fa-trash"></i></span>
                                                        </button>

                                                        <?php 
                                                        }else{ 
                                                        ?>

                                                        <button type="button" class="close sucess-op edit action" title="Hapus Menu" onclick="hapusmenu('<?php echo $menu[$i]['id'] ?>', '<?php echo $menu[$i]['title'] ?>', '<?php echo $menu[$i]['urutan'] ?>', '<?php echo $menu[$i]['id_parent'] ?>', 'admin_menu')" aria-label="Close">
                                                            <span class="icon-sc-cl" aria-hidden="true"><i class="fas fa-trash"></i></span>
                                                        </button>

                                                        <?php 
                                                        } 
                                                        ?>
                         
                                                        <button type="button" class="close sucess-op action" onclick="activemenu('<?php echo $menu[$i]['id'] ?>', '<?php echo $menu[$i]['title'] ?>', 'admin_menu')"  aria-label="Close">
                                                            <span class="icon-sc-cl" aria-hidden="true"><i class="fas fa-check-circle"></i></span>
                                                        </button>
                                                    <?php } ?>
                                                    <i class="fas <?php echo $menu[$i]['logo'] ?> admin-check-pro" aria-hidden="true"></i>
                                                    <p><strong><?php echo $menu[$i]['title'] ?></strong> 
                                                        ( Menu / <?php echo $menu[$i]['status'] ?> ) <br>
                                                        <?php echo(base_url())?>admin/<strong><?php echo $menu[$i]['link'] ?></strong>
                                                    </p>
                                                </div>

                                                <?php 
                                                    $data[$menu[$i]['title']][0] = "Pertama";
                                                    $data[$menu[$i]['title']."_urutan"][0] = ($menu[$i]['id']."01");
                                                    for($j = 0; $j < count($submenu); $j++){
                                                        $data[$menu[$i]['title']][$j+1] = "Setelah ".$submenu[$j]['title'];
                                                        $data[$menu[$i]['title']."_urutan"][$j+1] = $submenu[$j]['urutan']+1;
                                                        if(count($submenu)){
                                                            ?>
                                                            <div class="alert  ptpb 
                                                                <?php 
                                                                    if($submenu[$j]['status'] == "active"){ ?>
                                                                        alert-success alert-success-style1
                                                                <?php 
                                                                    }else{ ?>
                                                                        alert-warning alert-success-style3
                                                                <?php } ?>
                                                            ">
                                                                <?php 
                                                                if($submenu[$j]['status'] == "active"){ ?>
                                                                    <button type="button" class="close sucess-op edit action" onclick="alert('oke2')" aria-label="Close">
                                                                        <span class="icon-sc-cl" aria-hidden="true"><i class="fas fa-pen simbol"></i></span>
                                                                    </button>
                                                                    <button type="button" class="close sucess-op action" onclick="inactivemenu('<?php echo $submenu[$j]['id'] ?>', '<?php echo $submenu[$j]['title'] ?>', 'admin_menu')" aria-label="Close">
                                                                        <span class="icon-sc-cl" aria-hidden="true"><i class="fas fa-minus-circle simbol"></i></span>
                                                                    </button>
                                                                <?php 
                                                                }else{ ?>
                                                                    <button type="button" class="close sucess-op edit action" title="Hapus Menu" onclick="hapusmenu('<?php echo $submenu[$j]['id'] ?>', '<?php echo $submenu[$j]['title'] ?>', '<?php echo $submenu[$j]['urutan'] ?>', '<?php echo $submenu[$j]['id_parent'] ?>', 'admin_menu')" aria-label="Close">
                                                                        <span class="icon-sc-cl" aria-hidden="true"><i class="fas fa-trash"></i></span>
                                                                    </button>
                                                                    <button type="button" class="close sucess-op action" onclick="activemenu('<?php echo $submenu[$j]['id'] ?>', '<?php echo $submenu[$j]['title'] ?>', 'admin_menu')"  aria-label="Close">
                                                                        <span class="icon-sc-cl" aria-hidden="true"><i class="fas fa-check-circle"></i></span>
                                                                    </button>
                                                                <?php } ?>
                                                                <i class="admin-check-pro bg-white" aria-hidden="true"></i>
                                                                <p><strong><?php echo $submenu[$j]['title'] ?></strong> 
                                                                    ( Submenu / <?php echo $submenu[$j]['status'] ?> )<br>
                                                                    <?php echo(base_url())?>admin/<strong><?php echo $menu[$i]['link'] ?>/<?php echo $submenu[$j]['link'] ?></strong></p>
                                                            </div>
                                                        <?php }
                                                    } ?>       

                                                    <!--
                                                        <div class="alert alert-info alert-success-style2 add-submenu-luar">
                                                            <i class="admin-check-pro bg-white add-submenu-dalam" aria-hidden="true"></i>
                                                            <p class="text-center"><strong>++++++++ Add Submenu ++++++++</strong></p>
                                                        </div> 
                                                    -->
                                        
                                            <?php } ?>




                                        </div>
                                    </div>
                                </div>
                                
                            </div>


                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Alert End-->

        <div class="modal fade" id="addadminmenu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
          <div class="modal-dialog mt-25" role="document">
            <div class="modal-content">
                <form action="<?php echo(base_url())?>admin/upload-menu-all/admin_menu" method="post">        
                  <div class="modal-header">
                  </div>
                  <div class="modal-body">
                        <div class="row mlr-0">
                            <div class="single-pro-size col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <h6>Role</h6>
                            <div class="form-group">
                                <select class="form-control" name="id_role" required="">
                                    <?php 
                                        $role = $this->modeladmin->ambil_role();
                                        for ($r=0; $r < count($role); $r++) {  
                                        ?>
                                        <option value="<?php echo $role[$r]['id'] ?>"><?php echo $role[$r]['nama_role'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="single-pro-size col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <h6>Type</h6>
                            <div class="form-group">
                                <select class="form-control" id="type" onchange="typemenu()">
                                    <option value="1">Menu</option>
                                    <option value="2">Submenu</option>
                                </select>
                            </div>
                        </div>
                        <div class="single-pro-size col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <h6>Parent Menu</h6>
                            <div class="form-group">
                                <select class="form-control" id="menu" name="id_parent" onchange="susunan()" disabled="" >
                                  <option value="0">Tanpa Parent</option>
                                  <?php 
                                    for($i = 0; $i < count($menu); $i++){ ?>
                                    <option value="<?php echo $menu[$i]['id']; ?>"><?php echo $menu[$i]['title'] ?></option>
                                  <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="single-pro-size col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <h6>Order</h6>
                            <div class="form-group">
                                <select class="form-control" name="urutan" id="order" required="">
                                </select>
                            </div>
                        </div>
                        <div class="single-pro-size col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <h6>Title</h6>
                            <div class="form-group">
                                <input type="text" placeholder="Masukan Title" required="" id="title" onchange="updatelink()" name="title" class="form-control">
                            </div>
                        </div>
                        <div class="single-pro-size col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <h6>Link</h6>
                            <div class="form-group">
                                <input type="text" placeholder="Masukan Link" required="" name="link" class="form-control">
                            </div>
                        </div>
                        <div class="single-pro-size col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <h6>Logo</h6>
                            <div class="form-group row mlr-0 awesome-font-box">
                                <div class="radio radiofill col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                    <label>
                                        <input type="radio" checked="" name="logo" value="" class="form-radio">
                                            <i class="helper mt-2"></i> none</i>
                                    </label>
                                </div>
                                <?php 
                                    $logo = $this->modeladmin->ambil_logo();
                                    for ($l=0; $l < count($logo); $l++) {  
                                    ?>
                                    <div class="radio radiofill col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                        <label>
                                            <input type="radio" name="logo" class="form-radio" value="<?php echo $logo[$l]['data'] ?>">
                                            <i class="helper mt-2"></i> <i class="fas <?php echo $logo[$l]['data'] ?>"></i>
                                        </label>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah Menu</button>
                  </div>
              </form>
            </div>
          </div>
        </div>





        <div class="modal fade" id="editmenu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
          <div class="modal-dialog mt-25" role="document">
            <div class="modal-content">
                <form action="<?php echo(base_url())?>admin/upload-menu-admin/admin-menu" method="post">                    
                  <div class="modal-header">
                  </div>
                  <div class="modal-body">
                        <div class="row mlr-0">
                            <div class="single-pro-size col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <h6>Role</h6>
                            <div class="form-group">
                                <select class="form-control" name="id_role" required="">
                                    <?php 
                                        $role = $this->modeladmin->ambil_role();
                                        for ($r=0; $r < count($role); $r++) {  
                                        ?>
                                        <option value="<?php echo $role[$r]['id'] ?>"><?php echo $role[$r]['nama_role'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="single-pro-size col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <h6>Type</h6>
                            <div class="form-group">
                                <select class="form-control" id="type" onchange="typemenu()">
                                    <option value="1">Menu</option>
                                    <option value="2">Submenu</option>
                                </select>
                            </div>
                        </div>
                        <div class="single-pro-size col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <h6>Parent Menu</h6>
                            <div class="form-group">
                                <select class="form-control" id="menu" name="id_parent" onchange="susunan()" disabled="" >
                                  <option value="0">Tanpa Parent</option>
                                  <?php 
                                    for($i = 0; $i < count($menu); $i++){ ?>
                                    <option value="<?php echo $menu[$i]['id']; ?>"><?php echo $menu[$i]['title'] ?></option>
                                  <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="single-pro-size col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <h6>Order</h6>
                            <div class="form-group">
                                <select class="form-control" name="urutan" id="order" required="">
                                </select>
                            </div>
                        </div>
                        <div class="single-pro-size col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <h6>Title</h6>
                            <div class="form-group">
                                <input type="text" placeholder="Masukan Title" required="" name="title" class="form-control">
                            </div>
                        </div>
                        <div class="single-pro-size col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <h6>Link</h6>
                            <div class="form-group">
                                <input type="text" placeholder="Masukan Link" required="" name="link" class="form-control">
                            </div>
                        </div>
                        <div class="single-pro-size col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <h6>Logo</h6>
                            <div class="form-group row mlr-0 awesome-font-box">
                                <div class="radio radiofill col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                    <label>
                                        <input type="radio" checked="" name="logo" value="" class="form-radio">
                                            <i class="helper mt-2"></i> none</i>
                                    </label>
                                </div>
                                <?php 
                                    $logo = $this->modeladmin->ambil_logo();
                                    for ($l=0; $l < count($logo); $l++) {  
                                    ?>
                                    <div class="radio radiofill col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                        <label>
                                            <input type="radio" name="logo" class="form-radio" value="<?php echo $logo[$l]['data'] ?>">
                                            <i class="helper mt-2"></i> <i class="fas <?php echo $logo[$l]['data'] ?>"></i>
                                        </label>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah Menu</button>
                  </div>
              </form>
            </div>
          </div>
        </div>







        <script type="text/javascript">



        <?php 
            $cetak = [];
            $cetak["menu"] = "";
            $value_cetak = [];
            $value_cetak["menu"] = "";
            for($c = 0; $c < count($data["menu"]); $c++){
                if( $c+1 < count($data["menu"])){
                    $cetak["menu"] = $cetak["menu"].$data["menu"][$c].', ';
                    $value_cetak["menu"] = $value_cetak["menu"].$data["menu_urutan"][$c].', ';
                }else{
                    $cetak["menu"] = $cetak["menu"].$data["menu"][$c];
                    $value_cetak["menu"] = $value_cetak["menu"].$data["menu_urutan"][$c];
                }
                if( $c > 0 ){
                    $search = str_replace("Setelah ", "", $data["menu"][$c]);
                    for($d = 0; $d < count($data[ $search ]); $d++){
                        if ( $d == 0 ){
                            $cetak[ $search ] = "";
                            $value_cetak[ $search ] = "";
                        }
                        if( $d+1 < count($data[ $search ]) ){
                            $value_cetak[ $search ] = $value_cetak[ $search ].$data[ $search."_urutan"][$d].', ';
                            $cetak[$search] = $cetak[$search].$data[$search][$d].', ';
                        }else{
                            $value_cetak[ $search ] = $value_cetak[ $search ].$data[ $search."_urutan"][$d];
                            $cetak[$search] = $cetak[$search].$data[$search][$d];
                        }
                    }                    
                }
            } 

            echo "var susun = {\n";
            echo "\t\t\tmenu : '".$cetak["menu"]."',\n";
            echo "\t\t\tmenu_value : '".$value_cetak["menu"]."',\n";
            for($e = 1; $e < count($data["menu"]); $e++){
                $search = str_replace("Setelah ", "", $data["menu"][$e]);
                echo "\t\t\t".str_replace(" ", "_", strtolower($search))." : '".$cetak[$search]."',\n";
                echo "\t\t\t".str_replace(" ", "_", strtolower($search))."_value : '".$value_cetak[$search]."',\n";       
            }
            echo "\t\t\tlast : 'Terimakasih'\n";
            echo "\t\t};\n\n";
        ?>


            setTimeout(function(){
                typemenu();
            },  1000);
            function tambahadminmenu(){
                $('#addadminmenu').modal('show');            
            }

            function updatelink(){
                title
            }

            function typemenu(){
                if($("#type").val() == 1){
                    $("#menu").prop("disabled", true);
                    $("#order").prop("disabled", false);
                    susunan("menu");
                }else{
                    $("#menu").prop("disabled", false);
                    $("#order").prop("disabled", true);
                }
            }

            function susunan(note = ""){
                var cari = $("#menu").find('option:selected').text().replace(" ", "_").toLowerCase();
                if(note == ""){                 
                    key = susun[cari].split(", ");
                    value = susun[cari+"_value"].split(", ");
                }else{
                    key = susun["menu"].split(", ");
                    value = susun["menu_value"].split(", ");
                }

                $('#order').find('option').remove();
                
                for (var i = 0; i < key.length; i++) {
                    $('#order')
                         .append($("<option></option>")
                                    .attr("value",value[i])
                                    .text(key[i])); 
                }
                     

                $("#order").prop("disabled", false);
            }


            function ubahadminmenu(id, title, urutan){
                $('#editmenu').modal('show');
            }

            function inactivemenu (id, title, type_menu){
                swal({
                    title: "Inactive Menu "+title,
                    text: "Menu yang enactive masih bisa diactifkan kembali. \n Inactivekan Menu ?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Ya, Inactivekan !",
                    cancelButtonText: "Batal",
                    closeOnConfirm: false
                }, function (isConfirm) {
                    if (!isConfirm) return;
                    window.location.href = "<?php echo(base_url())?>admin/inactive-menu-admin/"+id+"/"+type_menu;
                });     
            }

            function activemenu (id, title, type_menu){
                swal({
                    title: "Active Menu "+title,
                    text: "Aktifkan kembali menu. \n Aktifkan Menu ?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Ya, Aktifkan !",
                    cancelButtonText: "Batal",
                    closeOnConfirm: false
                }, function (isConfirm) {
                    if (!isConfirm) return;
                    window.location.href = "<?php echo(base_url())?>admin/active-menu-admin/"+id+"/"+type_menu;
                });     
            }

            function hapusmenu(id, title, urutan, id_parent, type_menu){
                swal({
                    title: "Hapus Admin Menu "+title,
                    text: "Data yang sudah di hapus tidak bisa di kembalikan. \n Hapusk Admin Menu ?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Ya, Hapuskan !",
                    cancelButtonText: "Batal",
                    closeOnConfirm: false
                }, function (isConfirm) {
                    if (!isConfirm) return;
                    window.location.href = "<?php echo(base_url())?>admin/hapus-menu-admin/"+id+"/"+urutan+"/"+id_parent+"/"+type_menu;
                });
            }


            function barier(title){
                swal({
                    title: "Tidak Bisa Delete Menu \n\""+title+"\"",
                    text: "Tidak bisa delete menu \""+title+"\" karena masih memiliki submenu. Harap hapus submenu terlebih dahulu.",
                    type: "warning",
                    showCancelButton: true,
                    cancelButtonText: "OKE",
                    closeOnConfirm: false
                });     
            }
        </script>
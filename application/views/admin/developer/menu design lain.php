
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="alert-icon shadow-reset wrap-alert-b">
                            <div class="alert-title row">
                                <div class="col-xs-8 col-sm-8 col-md-8">
                                    <h2 class="float-left">Admin Menu</h2>
                                    <p class="float-left">Tambah, Hapus, Dan Edit Menu Serta Urutannya</p>
                                </div>
                                <div class="btn btn-primary col-xs-3 col-sm-3 col-md-3 ml-3" onclick="tambahmenu()">Tambah Admin</div>
                            </div>

                            <?php
                            $data = []; 
                            $menu = $this->session->userdata('menu');
                            $data['menu'][0] = "Pertama"; 
                            $data['menu_urutan'][0] = 1; 
                            for($i = 0; $i < count($menu); $i++){ 
                                $data['menu'][$i+1] = "Setelah ".$menu[$i]['title'];
                                $data['menu_urutan'][$i+1] = $menu[$i]['urutan']+1;
                                ?>
                            <div class="alert 
                                <?php 
                                    if($menu[$i]['status'] == "active"){ ?>
                                        alert-info alert-success-style2
                                <?php 
                                    }else{ ?>
                                        alert-danger alert-success-style4
                                <?php } ?>
                            ">
                                <?php 
                                if($menu[$i]['status'] == "active"){ ?>

                                    <button type="button" class="close sucess-op edit"  title="Edit Menu" aria-label="Close">
                                        <span class="icon-sc-cl" aria-hidden="true"><i class="fas fa-pen simbol"></i></span>
                                    </button>
                                    
                                    <button type="button" class="close sucess-op" title="Inactive Menu" onclick="inactive('<?php echo $menu[$i]['id'] ?>', '<?php echo $menu[$i]['title'] ?>')" aria-label="Close">
                                        <span class="icon-sc-cl" aria-hidden="true"><i class="fas fa-minus-circle simbol"></i></span>
                                    </button>

                                <?php 
                                }else{ ?>

                                    <button type="button" class="close sucess-op edit" title="Hapus Menu" onclick="hapus('<?php echo $menu[$i]['id'] ?>', '<?php echo $menu[$i]['title'] ?>')" aria-label="Close">
                                        <span class="icon-sc-cl" aria-hidden="true"><i class="fas fa-trash simbol"></i></span>
                                    </button>
             
                                    <button type="button" class="close sucess-op" onclick="active('<?php echo $menu[$i]['id'] ?>', '<?php echo $menu[$i]['title'] ?>')"  aria-label="Close">
                                        <span class="icon-sc-cl" aria-hidden="true"><i class="fas fa-check-circle simbol"></i></span>
                                    </button>

                                <?php } ?>
                                <i class="fas <?php echo $menu[$i]['logo'] ?> admin-check-pro" aria-hidden="true"></i>
                                <p><strong><?php echo $menu[$i]['title'] ?></strong> 
                                    ( Menu / <?php echo $menu[$i]['status'] ?> )</p>
                            </div>

                            <?php 
                                $submenu = $this->modeladmin->ambil_submenu($menu[$i]['id']);
                                $data[$menu[$i]['title']][0] = "Pertama";
                                $data[$menu[$i]['title']."_urutan"][0] = ($menu[0]['id_parent']."01");
                                for($j = 0; $j < count($submenu); $j++){
                                    $data[$menu[$i]['title']][$j+1] = "Setelah ".$submenu[$j]['title'];
                                    $data[$menu[$i]['title']."_urutan"][$j+1] = $submenu[$j]['urutan']+1;
                                    if(count($submenu)){
                                        ?>
                                        <div class="alert 
                                            <?php 
                                                if($submenu[$j]['status'] == "active"){ ?>
                                                    alert-success alert-success-style1
                                            <?php 
                                                }else{ ?>
                                                    alert-warning alert-success-style3
                                            <?php } ?>
                                        ">
                                            <button type="button" class="close sucess-op edit" onclick="alert('oke2')" aria-label="Close">
                                                <span class="icon-sc-cl" aria-hidden="true"><i class="fas fa-pen simbol"></i></span>
                                            </button>
                                            <?php 
                                            if($submenu[$j]['status'] == "active"){ ?>
                                                <button type="button" class="close sucess-op" onclick="alert('oke')" aria-label="Close">
                                                    <span class="icon-sc-cl" aria-hidden="true"><i class="fas fa-minus-circle simbol"></i></span>
                                                </button>
                                            <?php 
                                            }else{ ?>
                                                <button type="button" class="close sucess-op" onclick="alert('oke2')" aria-label="Close">
                                                    <span class="icon-sc-cl" aria-hidden="true"><i class="fas fa-check-circle simbol"></i></span>
                                                </button>
                                            <?php } ?>
                                            <i class="admin-check-pro bg-white" aria-hidden="true"></i>
                                            <p><strong><?php echo $submenu[$j]['title'] ?></strong> 
                                                ( Submenu / <?php echo $submenu[$j]['status'] ?> )</p>
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

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="alert-icon shadow-reset wrap-alert-b">
                            <div class="alert-title">
                                <h2>Website Menu</h2>
                                <p>These are the Custom bootstrap Cross alerts style One</p>
                            </div>
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
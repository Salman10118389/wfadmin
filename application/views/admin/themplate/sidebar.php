<?php 
    $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $menu = $this->session->userdata('menu');
?>

<style type="text/css">
    .metismenu > .active, .submenu-angle > .active{
        background: #E12503;
    }
    .metismenu > .active > a > span, .metismenu > .active > a > i, .submenu-angle > .active > a > span, .submenu-angle > .active > a > i{
        color: white !important;
    }
    .main-logo{
        height: 60px;
    }
</style>
    <div class="left-sidebar-pro">
        <nav id="sidebar" class="">
            <div class="sidebar-header">
                <img class="main-logo" src="<?php echo base_url() ?>gambar/template/logo.png" alt="" />
                <strong style="color: GREEN;margin: 10px;font-family: Algerian;font-size: 40px;">
                    WF                
                </strong>
            </div>
            <div class="left-custom-menu-adp-wrap comment-scrollbar">
                <nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1">
                        <?php 
                            for($i = 0; $i < count($menu); $i++){ 
                                $submenu = $this->modeladmin->ambil_submenu($menu[$i]['id']);?>
                            <li 
                                <?php if(strpos($actual_link, $menu[$i]['link'] )){ ?>
                                    class="active"
                                <?php } ?>
                            >
                                <a 
                                    <?php if(count($submenu)){ ?>
                                        class="has-arrow"
                                    <?php } ?>
                                 href="<?= base_url() ?>admin/<?php echo $menu[$i]['link'] ?>">
    							   <i class="fa big-icon <?php echo $menu[$i]['logo'] ?> icon-wrap"></i>
    							   <span class="mini-click-non"><?php echo $menu[$i]['title'] ?></span>
    							</a>
                                
                                <?php 
                                if(count($submenu)){ ?>
                                    <ul class="submenu-angle" aria-expanded="true">
                                        <?php for($j = 0; $j < count($submenu); $j++){ ?>
                                            <li
                                            <?php if(strpos($actual_link, $submenu[$j]['link'] ) && strpos($actual_link, $menu[$i]['link'] )){ ?>
                                                class="active"
                                            <?php } ?>
                                            >
                                                <a title="File Manager" href="<?= base_url() ?>admin/<?php echo $menu[$i]['link'] ?>/<?php echo $submenu[$j]["link"] ?>">
                                                    <i class="fa <?php echo $submenu[$j]["logo"] ?> sub-icon-mg" aria-hidden="true"></i> 
                                                    <span class="mini-sub-pro"><?php echo $submenu[$j]["title"] ?></span>
                                                </a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                <?php } ?>   
                            </li>
                        <?php } ?>
                    </ul>
                </nav>
            </div>
        </nav>
    </div>
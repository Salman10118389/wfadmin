                    <div class="col-md-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="hpanel responsive-mg-b-30">
                            <div class="panel-body">
                                <a href="<?php echo base_url() ?>admin/data-pesan/tulis-pesan" class="btn btn-success compose-btn btn-block m-b-md">Compose</a>
                                <ul class="mailbox-list">
                                    <?php 
                                        $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                                    ?>
                                    <li 
                                    <?php if(strpos($actual_link, "pesan-masuk")){ ?>
                                        class="active"
                                    <?php } ?> 
                                    >
                                        <a href="<?php echo base_url() ?>admin/data-pesan/pesan-masuk">
                                            <i class="fa fa-envelope"></i> Inbox
                                        </a>
                                    </li>
                                    <li
                                    <?php if(strpos($actual_link, "pesan-terkirim")){ ?>
                                        class="active"
                                    <?php } ?> 
                                    >
                                        <a href="<?php echo base_url() ?>admin/data-pesan/pesan-terkirim"><i class="fa fa-paper-plane"></i> Pesan Terkirim</a>
                                    </li>
                                    <li
                                    <?php if(strpos($actual_link, "draft-pesan")){ ?>
                                        class="active"
                                    <?php } ?> 
                                    >
                                        <a href="<?php echo base_url() ?>admin/data-pesan/draft-pesan"><i class="fa fa-edit"></i> Draft Pesan</a>
                                    </li>
                                    <li
                                    <?php if(strpos($actual_link, "pesan-dihapus")){ ?>
                                        class="active"
                                    <?php } ?> 
                                    >
                                        <a href="<?php echo base_url() ?>admin/data-pesan/pesan-dihapus"><i class="fa fa-trash"></i> Pesan Dihapus</a>
                                    </li>
                                </ul>
                                <hr>
                                <ul class="mailbox-list">
                                    <li
                                    <?php if(strpos($actual_link, "label-travel")){ ?>
                                        class="active"
                                    <?php } ?> 
                                    >
                                        <a href="<?php echo base_url() ?>admin/data-pesan/label-travel"><i class="fa fa-plane text-danger"></i> Label Travel</a>
                                    </li>
                                    <li
                                    <?php if(strpos($actual_link, "label-sosial-media")){ ?>
                                        class="active"
                                    <?php } ?> 
                                    >
                                        <a href="<?php echo base_url() ?>admin/data-pesan/label-sosial-media"><i class="fa fa-users text-info"></i> Label Social</a>
                                    </li>
                                    <li
                                    <?php if(strpos($actual_link, "label-promosi")){ ?>
                                        class="active"
                                    <?php } ?> 
                                    >
                                        <a href="<?php echo base_url() ?>admin/data-pesan/label-promosi">
                                            <i class="fa fa-tag text-success"></i> Label Promosi
                                        </a>
                                    </li>
                                </ul>
                                <hr>
                                <ul class="mailbox-list">
                                    <li>
                                        <a href="#"><i class="fa fa-cogs"></i> Settings</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-info-circle"></i> Support</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
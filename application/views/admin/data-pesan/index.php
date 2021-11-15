        <div class="mailbox-area mg-tb-15">
            <div class="container-fluid">
                <div class="row">

                    <?php $this->load->view('admin/themplate/menu-pesan'); ?>

                    <div class="col-md-9 col-md-9 col-sm-9 col-xs-12">
                        <div class="hpanel mg-b-15">
                            <div class="panel-heading hbuilt mailbox-hd">
                                <div class="text-center p-xs font-normal">
                                    <div class="input-group">
                                        <input type="text" class="form-control input-sm" placeholder="Search email in your inbox..."> 
                                        <span class="input-group-btn"> 
                                            <button type="button" class="btn btn-sm btn-default">Search</button> 
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-mailbox">
                                        <tbody>
                                            <?php 
                                            for ($i=0; $i < 10; $i++) { ?>
                                                <tr class="unread"> <!-- class="active" -->
                                                    <td class="">
                                                        <div class="checkbox checkbox-single checkbox-success">
                                                            <input type="checkbox" checked>
                                                            <label></label>
                                                        </div>
                                                    </td>
                                                    <td><a href="<?php echo $this->session->userdata('url') ?>baca-pesan/id">Jeremy Massey </a> <span class="label label-warning">Finance</span></td>
                                                    <td><a href="<?php echo $this->session->userdata('url') ?>baca-pesan/id">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a></td>
                                                    <td class="mail-date">Tue, Nov 25</td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-md-6 col-sm-6 col-xs-12 mg-b-15">
                                        
                                    </div>
                                    <div class="col-md-6 col-md-6 col-sm-6 col-xs-12 mailbox-pagination mg-b-15">
                                        10/100 Pesan
                                        <div class="btn-group">
                                            <button class="btn btn-default btn-sm"><i class="fa fa-arrow-left"></i></button>
                                            <button class="btn btn-default btn-sm"><i class="fa fa-arrow-right"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
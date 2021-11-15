
            <?php  
            $optional = [];
            $optional['select'] = "";
            $where["field"][0] = "id";
            $where["velue"][0] = $this->session->userdata('id_detail'); 
            $optional['where'] = $where;
            $optional['search'] = "";
            $optional['join'] = "";
            $optional['order_by'] = "";
            $optional['limit'] = "";
            $optional['offset'] = "";
            $optional['distinct'] = "";
            $data = $this->modeladmin->ambil_data("admin_admin",$optional);
        ?>

        <div class="single-product-tab-area mg-t-15 mg-b-30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <img src="<?php echo base_url() ?>gambar/admin/<?php echo $data[0]["photo"] ?>" alt="" />
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="single-product-details res-pro-tb">
                            <div style="background: white;padding: 10px;padding-left: 10px;padding-left: 20px;">
                                <h6>Nama Admin</h6>
                                <h2><?php echo $data[0]["nama"] ?></h2>
                            </div><div style="background: white;padding: 10px;padding-left: 10px;padding-left: 20px;">
                                <h6>Username</h6>
                                <h2><?php echo $data[0]["username"] ?></h2>
                            </div>
                            <div style="background: white;padding: 10px;padding-left: 10px;padding-left: 20px;">
                                <h6>Nomor Telepone</h6>
                                <h2><?php echo $data[0]["nomor_telepone"] ?></h2>
                            </div>
                            <div style="background: white;padding: 10px;padding-left: 10px;padding-left: 20px;height: 180px;">
                                <h6>Catatan</h6>
                                <p><?php echo $data[0]["catatan"] ?>aaaaa aaaa aaaa aaaa a a a a aaaaa Tim support kami selalu online Anda tidak perlu khawatir apabila mengalah kesulitan Tim Support kami selalu online 24×7 Anda bisa menghubungi kami melalui WhatsApp ataupun Email dan Tiket. Tim support kami selalu online Anda tidak perlu khawatir apabila mengalah kesulitan Tim Support kami selalu online 24×7 Anda bisa menghubungi kami melalui WhatsApp ataupun Email dan Tiket.</p>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<!--         <div class="data-table-area mg-tb-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1>Riwayat Kegiatan <span class="table-project-n">Admin</span></h1>
                                </div>
                            </div>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <div id="toolbar">
                                        <select class="form-control">
                                                <option value="">Export Basic</option>
                                                <option value="all">Export All</option>
                                                <option value="selected">Export Selected</option>
                                            </select>
                                    </div>
                                    <table data-toggle="table" data-pagination="true" data-search="true" data-show-pagination-switch="true" data-show-refresh="true" data-show-export="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                                <th data-field="id">No</th>
                                                <th data-field="name" data-editable="true">Tanggal</th>
                                                <th data-field="company" data-editable="true">Kegiatan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Kamis 14 Juli 2020 14:23:50</td>
                                                <td>Login Ke Aplikasi</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Kamis 14 Juli 2020 14:28:50</td>
                                                <td>Mandownload Data Laporan Transaksi '10 Juli 2020'</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Kamis 14 Juli 2020 14:28:50</td>
                                                <td>Mandownload Data Laporan Transaksi '11 Juli 2020'</td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Product Title</td>
                                                <td>In Of Stock</td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>Product Title</td>
                                                <td>In Of Stock</td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>Product Title</td>
                                                <td>In Of Stock</td>
                                            <tr>
                                                <td>7</td>
                                                <td>Product Title</td>
                                                <td>In Of Stock</td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
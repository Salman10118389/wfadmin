
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
            $data = $this->modeladmin->ambil_data("web_slider",$optional);
        ?>

        <div class="single-product-tab-area mg-t-15 mg-b-30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <img style="max-width: 680px;" src="<?php echo base_url() ?>wassets/images//<?php echo $data[0]["gambar"] ?>" alt="<?php echo $data[0]["nama"] ?>" title="<?php echo $data[0]["nama"] ?>"/>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="single-product-details res-pro-tb">
                            <div style="background: white;padding: 10px;padding-left: 10px;padding-left: 20px;">
                                <h6>Nama Slider</h6>
                                <h2><?php echo $data[0]["nama"] ?></h2>
                            </div><div style="background: white;padding: 10px;padding-left: 10px;padding-left: 20px;">
                                <h6>Link</h6>
                                <h2><?php echo $data[0]["link"] ?></h2>
                            </div>
                            <!-- <div style="background: white;padding: 10px;padding-left: 10px;padding-left: 20px;">
                                <h6>Nomor Telepone</h6>
                                <h2><?php echo $data[0]["nomor_telepone"] ?></h2>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>


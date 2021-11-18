	<style type="text/css">

    #upload {
      opacity: 0;
    }

    #upload-label {
      position: absolute;
      top: 50%;
      left: 1rem;
      transform: translateY(-50%);
    }

    .image-area {
      border: 2px dashed rgba(255, 255, 255, 0.7);
      padding: 1rem;
      position: relative;
    }

    .image-area::before {
      content: '';
      color: #fff;
      font-weight: bold;
      text-transform: uppercase;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      font-size: 0.8rem;
      z-index: 1;
    }

    .image-area img {
      z-index: 2;
      position: relative;
    }

    .center {
      margin: auto;
      padding: 10px;
      float: none;
    }

    .mt-5{
      margin-top: 5px;
    }

    .text-deskripsi{
      height: 180px !important;
    }

    .m-0{
      margin: 0px !important;
    }
    
    .mb-0{
      margin-bottom: 0px;
    }
    
    .p-7{
      padding: 7px;
    }

    .pb-0{
      padding-bottom: 0px;
    }
</style>

    <div class="image-editor">
        <div class="single-product-tab-area mg-t-15 mg-b-30">
            <div class="container-fluid">
                <form action="<?php echo(base_url())?>admin/tambah-data" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <input type="hidden" name="jenis" id="jenis" value="admin">
                        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 mx-auto" style="height: 400px;background: #f66;">
                              <!-- Upload image input-->
                              <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm btn-success" style="width: 100%">
                                <input id="upload" type="file" onchange="readURL(this);" name="photo" class="form-control border-0">
                                <label id="upload-label" for="upload" class="font-weight-light text-muted" style="width: 100%;text-align: center;">Pilih Photo Profile Dengan Ukuran 780 x 900</label>
                              </div>
                              <div class="image-area mt-4" style="text-align: center;"><img id="imageResult" src="#" alt="" class="img-fluid rounded shadow-sm mx-auto d-block" style="max-width: 100%;height: 320px;"></div>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="single-pro-size">
                                        <h6>Username</h6>
                                        <div class="form-group">
                                            <input type="text" placeholder="Masukan Username" name="username" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="single-pro-size">
                                        <h6>Nama</h6>
                                        <div class="form-group">
                                            <input type="text" placeholder="Masukan Nama" name="nama" id="namaGambar" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="single-pro-size">
                                        <h6>Jabatan</h6>
                                        <div class="form-group">
                                            <select class="form-control" name="jabatan">
                                              <?php  
                                                $optional = [];
                                                $optional['select'] = "";
                                                $where["field"][0] = "untuk";
                                                $where["velue"][0] = 4; 
                                                $optional['where'] = $where;
                                                $optional['search'] = "";
                                                $optional['distinct'] = "";
                                                $optional['join'] = "";
                                                $optional['order_by'] = "";
                                                $optional['limit'] = "";
                                                $optional['offset'] = "";
                                                $data = $this->modeladmin->ambil_data("web_kategori",$optional); 
                                                for($i = 0; $i < count($data); $i++){
                                            ?>
                                                <option value="<?php echo $data[$i]['nama'] ?>"><?php echo $data[$i]['nama'] ?></option>
                                              <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="single-pro-size">
                                        <h6>Aktif</h6>
                                        <div class="rows">
                                          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 form-check">
                                            <input class="form-check-input" type="radio" id="aktif"  name="aktif" value="1" checked>
                                            <label class="form-check-label" for="aktif">
                                              Aktif
                                            </label>
                                          </div>
                                          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 form-check">
                                            <input class="form-check-input" type="radio" id="tidak-aktif" name="aktif" value="0">
                                            <label class="form-check-label" for="tidak-aktif">
                                              Tidak
                                            </label>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="single-pro-size">
                                <h6>Catatan</h6>
                                <textarea class="summernote form-control" rows="100" name="catatan"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <button type="submit" class="btn btn-success col-lg-12 col-md-12 col-sm-12 col-xs-12">Simpan Data</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

   
    <script type="text/javascript">
    $(document).ready( function() {
      function readURL(input) {
          if (input.files && input.files[0]) {
              var reader = new FileReader();

              reader.onload = function (e) {
                  $('#imageResult')
                      .attr('src', e.target.result);
              };
              reader.readAsDataURL(input.files[0]);
          }
      }

      $(function () {
          $('#upload').on('change', function () {
              readURL(input);
          });
      });

      /*  ==========================================
          SHOW UPLOADED IMAGE NAME
      * ========================================== */
      var input = document.getElementById( 'upload' );
      var infoArea = document.getElementById( 'upload-label' );

      input.addEventListener( 'change', showFileName );
      function showFileName( event ) {
        var input = event.srcElement;
        var fileName = input.files[0].name;
        infoArea.textContent = 'File name: ' + fileName;
      }
    });
    </script>


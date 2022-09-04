  <!-- Begin Page Content -->
	<div class="container-fluid">
	  <!-- Page Heading -->
	  <h1 class="h3 mb-4 text-gray-800"> <?= $title;?></h1>
	</div>
	<!-- /.container-fluid -->
	<div class="container-fluid">
    <?php if( $this->session->flashdata('message') ) : ?>
      <div class="text-center" id="flash" role="alert">
        <?= $this->session->flashdata('message');?>
      </div>
    <?php endif; ?>

    <div class="container-fluid">
      <div class="">
        <div class="card shadow mb-4">
          <div class="">
            <div class="card-header py-3">
              <!-- <h6 class="m-0 font-weight-bold text-primary">Tambah Detail Resep Obat</h6> -->
            </div>
            <!-- <form> -->
              <div class="card-body">
              
                <div class="row">
                  <!-- Basic Card Example -->
                  <div class="col-lg-6">
                    <div class="card shadow mb-4">
                      <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Tambah catatan kehamilan</h6>
                      </div>
                      <div class="card-body">
                        <div class="form-group">
                          <label for="tanggal">Tanggal</label>
                          <input type="date" class="form-control" id="tanggal" name="tanggal" value=""> 
                        </div>

                          <input type="text" hidden class="form-control" id="no_resep" name="no_resepp" value="<?= $kode_max?>" readonly=""> 
                        
                          <input type="text" hidden class="form-control" id="id_users" name="id_users" value="<?= $id_users?>" readonly=""> 
                        
                        <div class="form-group">
                          <label for="berat_badan">Berat Badan</label>
                          <input type="text" class="form-control" id="berat_badan" name="berat_badan" value=""> 
                          <!-- <small class="form-text text-danger"> <?= form_error('berat_badan')?></small> -->
                        </div>
                        <div class="form-group">
                          <label for="tensi_darah">Tensi Darah</label>
                          <input type="text" class="form-control" id="tensi_darah" name="tensi_darah" value=""> 
                         <!--  <small class="form-text text-danger"> <?= form_error('tensi_darah')?></small> -->
                        </div>
                        <div class="form-group">
                          <label for="isi_catatan">Isi Catatan Kehamilan</label>
                          <textarea type="text" class="form-control" id="isi_catatan" name="isi_catatan" placeholder="Maukan isi berita "></textarea>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-6">
                    <div class="card shadow mb-4">
                      <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Tambah Detail Resep Obat</h6>
                      </div>
                      <div class="card-body">
                        <div class="col-xl-6 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                              <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                  <div class="col mr-2">
                                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">No.Resep</div>
                                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $kode_max;?></div> 
                                  </div>
                                  <div class="col-auto">
                                    <i class="fas fa-sort-numeric-down fa-2x text-gray-300"></i>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div> 
                          <input type="text" hidden class="form-control" id="kode_resepp" name="kode_resepp" value="<?= $kode_max;?>">
                        <form method="post" id="input_detail_obat">
                          <div class="form-group">
                            <label for="nama_obat">Nama Obat</label>
                            <input type="text" class="form-control" id="nam_obat" name="nam_obat" value="" placeholder=""> 
                            <small class="form-text text-danger"> <?= form_error('nam_obat')?></small>
                          </div>

                          <input type="hidden" class="form-control" id="id_obat" name="id_obat" value="" placeholder="">

                          <div class="form-group">
                            <label for="aturan_minum">Aturan Minum</label>
                            <input type="text" class="form-control" id="aturan_minum" name="aturan_minum" value="" placeholder="Tentukan aturan minum" > 
                            <small class="form-text text-danger"> <?= form_error('aturan_minum')?></small>
                          </div>
                          <div class="form-group">
                            <label for="jumlah_obat">Jumlah Obat <small></small></label>
                            <input type="text" class="form-control" id="jumlah_obat" name="jumlah_obat" value="" placeholder="Tentukan jumlah obat">
                            <small class="form-text text-danger"> <?= form_error('jumlah_obat')?></small>
                          </div>
                          <div class="form-group">
                            <label for="satuan_obat">Satuan Obat</label>
                            <select class="form-control" id="satuan_obat" name="satuan_obat">
                              <option value="">- Pilih -</option>
                              <option value="Butir">Butir</option>
                              <option value="Strip">Strip</option>
                              <option value="Botol">Botol</option>
                              <option value="Tablet">Tablet</option>
                            </select>
                          </div>
                          <input type="hidden" class="form-control" id="harga" name="harga" value="" placeholder="">
                          <div class="float-right">
                            <a href="<?= base_url('Dokter/rekam_medis');?>" class="btn btn-secondary btn-icon-split">
                              <span class="icon text-white-50">
                               <i class="fas fa-arrow-left"></i>
                              </span>
                              <span class="text">Kembali</span>
                            </a>
                            <button type="button" id="tambah_obat" class="btn btn-primary btn-icon-split tambah_obat">
                              <span class="icon text-white-50">
                                <i class="fas fa-paper-plane"></i>
                              </span>
                              <span class="text">Tambahkan Obat</span>
                            </button>
                            <button type="button" id="simpan_catatan" class="btn btn-primary btn-icon-split simpan_catatan">
                              <span class="icon text-white-50">
                                <i class="fas fa-paper-plane"></i>
                              </span>
                              <span class="text">Simpan Data</span>
                            </button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>

                </div>
                
                <div class="card shadow mb-4">
                  <div class="">
                    <div class="card-body">
                       <table class="table table-bordered table-striped dataTable">
                        <thead class="thead-dark text-center">
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">No.Resep</th>
                            <th scope="col">Nama Obat</th>
                            <th scope="col">Aturan Minum</th>
                            <th scope="col">Jumlah Obat</th>
                            <th scope="col">Satuan Obat</th>
                          </tr>
                        </thead>
                        <tbody id="dataDetailResep">
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                
              </div>
          <!--   </form> -->
          </div>             
        </div>
      </div>
    </div>
	</div>
</div>	
<!-- End of Main Content -->

  <script type="text/javascript">
    $(document).ready(function(){
      // autocomplete Id Pasien
      $("#kode_resepp").autocomplete({
        source: "<?= base_url('Dokter/get_KodeResep');?>",
      // end autocomplete Id Pasien
      });
    });
  </script>

  <script type="text/javascript">
    $(document).ready(function(){
      // autocomplete Id Pasien
      $("#nam_obat").autocomplete({
        source: "<?= base_url('Dokter/get_NamaObat');?>",

        select:function(event, ui){
          $('[name="nam_obat"]').val(ui.item.label);
          $('[name="id_obat"]').val(ui.item.id_obat);
          $('[name="harga"]').val(ui.item.harga);
        } 
      // end autocomplete Id Pasien
      });
    });
  </script>

  <script type="text/javascript">
    $(document).ready(function(){
      $(".tambah_obat").click(function(event){
        var kode_resep  = $("[name='kode_resepp']").val();
        var nama_obat   = $("[name='nam_obat']").val();
        var id_obat     = $("[name='id_obat']").val();
        var aturan_minum= $("[name='aturan_minum']").val();
        var jumlah_obat = $("[name='jumlah_obat']").val();
        var satuan_obat = $("[name='satuan_obat']").val();
        var harga       = $("[name='harga']").val();

        $.ajax({
          types:"POST",
          url: "<?php echo base_url();?>"+"Dokter/tambah_detail_resep",
          dataType: 'json',
          data: {kode_resep:kode_resep, nama_obat:nama_obat, id_obat:id_obat, aturan_minum:aturan_minum, jumlah_obat:jumlah_obat, satuan_obat:satuan_obat, harga:harga},
          success: function(hasil){
            console.log(hasil);
            document.getElementById('input_detail_obat').reset();
          }
        });
      });
    });
  </script>

  <script type="text/javascript">
    $(document).ready(function(){
      $(".tambah_obat").click(function(event){
        var kode_resep  = $("[name='kode_resepp']").val();

        $.ajax({
          types:"POST",
          url: "<?php echo base_url();?>"+"Dokter/tampil_detail_resep1",
          dataType: 'json',
          data: {kode_resep:kode_resep},
          success: function(data) {
            console.log(data)
              var html = '';
              for(i=0; i<data.length; i++){
                no=i+1;
                html += '<tr>'+
                          '<td>'+no+'</td>'+                        
                          '<td>'+data[i].kode_resep+'</td>'+
                          '<td>'+data[i].nama_obat+'</td>'+
                          '<td>'+data[i].aturan_minum+'</td>'+
                          '<td>'+data[i].jumlah_obat+'</td>'+
                          '<td>'+data[i].satuan_obat+'</td>'+
                        '</tr>';
              }
              $('#dataDetailResep').html(html);
          },
        });
      });
    });
  </script>

  <script type="text/javascript">
    $(document).ready(function(){
      $(".simpan_catatan").click(function(event){
        var tanggal     = $("[name='tanggal']").val();
        var kode_resep  = $("[name='no_resepp']").val();
        var id_users    = $("[name='id_users']").val();
        var berat_badan = $("[name='berat_badan']").val();
        var tensi_darah = $("[name='tensi_darah']").val();
        var isi_catatan = $("[name='isi_catatan']").val();

        $.ajax({
          types:"POST",
          url: "<?php echo base_url();?>"+"Dokter/simpan_catatan",
          dataType: 'json',
          data: {tanggal:tanggal, kode_resep:kode_resep, id_users:id_users, berat_badan:berat_badan, tensi_darah:tensi_darah, isi_catatan:isi_catatan},
          success: function(hasil){
            console.log(hasil);
            window.location.href = '<?php echo base_url();?>'+'Dokter/rekam_medis';
          }
        });
      });
    });
  </script>
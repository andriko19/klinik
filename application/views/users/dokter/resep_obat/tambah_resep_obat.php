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
              <h6 class="m-0 font-weight-bold text-primary">Tambah Resep Obat</h6>
            </div>
            <div class="card-body">
            
              <div class="row">
                <!-- Basic Card Example -->
                <div class="col-lg-6 mt-3">
                  <div class="card shadow mb-4">
                    <div class="card-body">
                      <form action="" method="post">
                        <div class="form-group">
                          <label for="tanggal">No.Resep</label>
                          <input type="text" class="form-control" id="kode_resep" name="kode_resep" value="<?= set_value('No_resep', $kode);?>" readonly=""> 
                        </div>
                        <div class="form-group">
                          <label for="tanggal">Tanggal</label>
                          <input type="date" class="form-control" id="tanggal" name="tanggal" value=""> 
                          <small class="form-text text-danger"> <?= form_error('tanggal')?></small>
                        </div>
                        <div class="form-group">
                          <label for="id_users">No induk pasien</label>
                          <input type="text" class="form-control" id="id_users" name="id_users" value="" placeholder="Masukan Id Pasien" > 
                          <small class="form-text text-danger"> <?= form_error('id_users')?></small>
                        </div>
                        <div class="form-group">
                          <label for="nama_pasien">Nama Pasien</label>
                          <input type="text" class="form-control" id="nama_users" name="nama_users" value="" readonly=""> 
                          <small class="form-text text-danger"> <?= form_error('nama_pasien')?></small>
                        </div>
                        <div class="form-group">
                          <label for="nama_suami">Nama Suami</label>
                          <input type="text" class="form-control" id="nama_suami" name="nama_suami" value="" readonly=""> 
                          <small class="form-text text-danger"> <?= form_error('nama_suami')?></small>
                        </div>
                        <div class="form-group">
                          <label for="alamat">Alamat</label>
                          <input type="text" class="form-control" id="alamat" name="alamat" value="" readonly=""> 
                          <small class="form-text text-danger"> <?= form_error('alamat')?></small>
                        </div>
                        <div class="float-right">
                          <a href="<?= base_url('dokter/resep_obat');?>" class="btn btn-secondary btn-icon-split">
                            <span class="icon text-white-50">
                              <i class="fas fa-arrow-left"></i>
                            </span>
                            <span class="text">Kembali</span>
                          </a>
                          <button type="submit" name="tambah" class="btn btn-primary btn-icon-split">
                            <span class="icon text-white-50">
                              <i class="fas fa-paper-plane"></i>
                            </span>
                            <span class="text">Simpan Resep Obat</span>
                          </button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
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
      $("#id_users").autocomplete({
        source: "<?= base_url('Dokter/get_IdPasien');?>",

        select:function(event, ui){
          $('[name="id_users"]').val(ui.item.label);
          $('[name="nama_users"]').val(ui.item.nama_users);
          $('[name="nama_suami"]').val(ui.item.nama_suami);
          $('[name="alamat"]').val(ui.item.alamat);
        } 
      // end autocomplete Id Pasien
      });
    });
  </script>
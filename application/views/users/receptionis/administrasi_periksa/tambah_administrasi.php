  <!-- Begin Page Content -->
  <div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"> <?= $title;?> </h1>
  </div>
  <!-- /.container-fluid -->
  <div class="container">

    <div class="container">
        <div class="col-lg-6">
          <!-- Basic Card Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tambah Administrasi Periksa</h6>
            </div>
            <div class="card-body">
              <form action="" method="post">
                <div class="form-group">
                  <label for="tanggal"><b>Tanggal</b></label>
                  <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Isi nama barang" value="<?= set_value('tanggal');?>"><?= form_error('tanggal', '<small class="text-danger ">', '</small>');?>
                </div>
                <div class="form-group">
                  <label for="id_users"><b>Nomor Induk Pasien</b></label>
                  <input type="text" class="form-control" id="id_userss" name="id_userss" placeholder="Maukan id_users pasien" ><?= form_error('id_users', '<small class="text-danger ">', '</small>');?>
                </div>
                <div class="form-group">
                  <label for="nama_users"><b>Nama Pasien</b></label>
                  <input type="text" class="form-control" id="nama_users" name="nama_users" placeholder="" value="" readonly=""><?= form_error('nama_users', '<small class="text-danger ">', '</small>');?>
                </div>
                <div class="form-group">
                  <label for="nama_suami"><b>Nama Suami</b></label>
                  <input type="text" class="form-control" id="nama_suami" name="nama_suami" placeholder="" value="" readonly=""><?= form_error('nama_suami', '<small class="text-danger ">', '</small>');?>
                </div>
                <div class="form-group">
                  <label for="nama_suami"><b>Jenis Periksa</b> <small> (ketik : umum / janjian) *</small></label>
                  <input type="text" class="form-control" id="jenis_periksa" name="jenis_periksa" placeholder="" value=""><?= form_error('jenis_periksa', '<small class="text-danger ">', '</small>');?>
                </div>
                <div class="form-group">
                  <label for="harga"><b>Harga</b></label>
                  <input type="text" class="form-control" id="harga" name="harga" placeholder="" value="" readonly=""><?= form_error('harga', '<small class="text-danger ">', '</small>');?>
                </div>
                <div class="float-right">
                  <a href="<?= base_url('receptionis/administrasi_periksa');?>" class="btn btn-secondary btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-arrow-left"></i>
                    </span>
                    <span class="text">Kembali</span>
                  </a>
                  <button type="submit" name="tambah" class="btn btn-primary btn-icon-split">
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
  </div>
</div>  
<!-- End of Main Content -->

 <script type="text/javascript">
    $(document).ready(function(){
      // autocomplete Id Pasien
      $("#id_userss").autocomplete({
        source: "<?= base_url('Receptionis/get_IdPasien');?>",

        select:function(event, ui){
          $('[name="id_users"]').val(ui.item.label);
          $('[name="nama_users"]').val(ui.item.nama_users);
          $('[name="nama_suami"]').val(ui.item.nama_suami);
        } 
      // end autocomplete Id Pasien
      });
    });
  </script>

  <script type="text/javascript">
    $(document).ready(function(){
      // autocomplete jenis periksa
      $("#jenis_periksa").autocomplete({
        source: "<?= base_url('Receptionis/get_jenis_periksa');?>",

        select:function(event, ui){
          $('[name="jenis_periksa"]').val(ui.item.label);
          $('[name="harga"]').val(ui.item.harga);
        } 
      // end autocomplete jenis periksa
      });
    });
  </script>

  <!-- Begin Page Content -->
	<div class="container-fluid">
	  <!-- Page Heading -->
	  <h1 class="h3 mb-4 text-gray-800"> <?= $title;?> -> <small>Tambah catatan kehamilan </small></h1>
	</div>
	<!-- /.container-fluid -->
	<div class="container">

    <div class="container">
      <div class="col-lg-6">
          <!-- Basic Card Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tambah catatan kehamilan</h6>
            </div>
            <div class="card-body">
              <form action="" method="post">
                <input type="hidden" name="id_catatan_kehamilan" value="">
                <input type="hidden" name="id_users" value="">
                <div class="form-group">
                  <label for="tanggal">Tanggal</label>
                  <input type="date" class="form-control" id="tanggal" name="tanggal" value=""> 
                  <!-- <small class="form-text text-danger"> <?= form_error('tanggal')?></small> -->
                </div>
                <div class="form-group">
                  <label for="id_users">No Induk Pasien</label>
                  <input type="text" class="form-control" id="id_users" name="id_users" value="<?= $id_users?>" readonly=""> 
                </div>
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
                  <input type="text" class="form-control" id="isi_catatan" name="isi_catatan" value=""> 
                  <!-- <small class="form-text text-danger"> <?= form_error('isi_catatan')?></small> -->
                </div>
                <div class="float-right">
                  <button type="submit" name="ubah" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-paper-plane"></i>
                    </span>
                    <span class="text">Tambah Catatan</span>
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

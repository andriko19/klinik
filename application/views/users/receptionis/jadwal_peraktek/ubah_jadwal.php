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
              <h6 class="m-0 font-weight-bold text-primary">Ubah Jadwal Hari Besok</h6>
            </div>
            <div class="card-body">
              <form action="" method="post">
                <input type="hidden" name="id_jadwal" value="<?= $j_Klinik['id_jadwal'];?>">
                <div class="form-group">
                  <label for="tanggal">Tanggal</label>
                  <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="" value="<?= $j_Klinik['tanggal']; ?>">
                  <small class="form-text text-danger"> <?= form_error('tanggal')?></small>
                </div>
                <div class="form-group">
                  <label for="kapasitas">Kapasitas</label>
                  <input type="text" class="form-control" id="kapasitas" name="kapasitas" placeholder="Jumlah kapasitas yang diinginkan" value="<?= $j_Klinik['kapasitas']; ?>"><small class="form-text text-danger"> <?= form_error('kapasitas')?></small>
                </div>
                <div class="float-right">
                  <a href="<?= base_url('receptionis/jadwal_peraktek');?>" class="btn btn-secondary btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-arrow-left"></i>
                    </span>
                    <span class="text">Kembali</span>
                  </a>
                  <button type="submit" name="ubah" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-paper-plane"></i>
                    </span>
                    <span class="text">Ubah Data</span>
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

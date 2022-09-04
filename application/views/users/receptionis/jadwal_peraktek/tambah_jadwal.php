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
              <h6 class="m-0 font-weight-bold text-primary">Tambah Jadwal Hari Besok</h6>
            </div>
            <div class="card-body">
              <form action="" method="post">
                <div class="form-group">
                  <label for="hari"><b>Tanggal</b></label>
                  <input type="date" class="form-control" id="hari" name="tanggal" placeholder="" value="<?= set_value('tanggal');?>"><?= form_error('tanggal', '<small class="text-danger ">', '</small>');?>
                </div>
                <div class="form-group">
                  <label for="hari"><b>Kapasitas</b></label>
                  <input type="text" class="form-control" id="hari" name="kapasitas" placeholder="Jumlah kapasitas yang diinginkan" value="<?= set_value('kapasitas');?>"><?= form_error('kapasitas', '<small class="text-danger ">', '</small>');?>
                </div>
                <div class="float-right">
                  <a href="<?= base_url('receptionis/jadwal_peraktek');?>" class="btn btn-secondary btn-icon-split">
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

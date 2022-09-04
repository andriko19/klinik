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
              <h6 class="m-0 font-weight-bold text-primary">Tambah Harga Periksa</h6>
            </div>
            <div class="card-body">
              <form action="" method="post">
                <div class="form-group">
                  <label for="jenis_periksa"><b>Jenis Periksa</b></label>
                  <input type="text" class="form-control" id="jenis_periksa" name="jenis_periksa" placeholder="Isi nama jenis_periksa" value="<?= set_value('jenis_periksa');?>"><?= form_error('jenis_periksa', '<small class="text-danger ">', '</small>');?>
                </div>
                <div class="form-group">
                  <label for="harga"><b>Harga</b></label>
                  <input type="text" class="form-control" id="harga" name="harga" placeholder="Isi jumlah harga" value="<?= set_value('harga');?>"><?= form_error('harga', '<small class="text-danger ">', '</small>');?>
                </div>
                <div class="float-right">
                  <a href="<?= base_url('pemilik/harga_periksa');?>" class="btn btn-secondary btn-icon-split">
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

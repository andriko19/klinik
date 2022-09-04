	<!-- /.container-fluid -->
	<div class="container-fluid mt-3">

    <div class="container-fluid">
      <div class="col-lg-6">
        <!-- Basic Card Example -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Masukan Batas Periode </h6>
          </div>
          <div class="card-body">
            <form action="<?= base_url('pemilik/cetak_periode_obat');?>" method="post" target="_blank">
              <div class="form-group">
                <label for="tanggal_a"><b>Dari Tanggal</b></label>
                <input type="date" class="form-control" id="tanggal_a" name="tanggal_a" placeholder="Isi nama obat" value="<?= set_value('tanggal_a');?>"><?= form_error('tanggal_a', '<small class="text-danger ">', '</small>');?>
              </div>
              <div class="form-group">
                <label for="tanggal_b"><b>Sampai Tanggal</b></label>
                <input type="date" class="form-control" id="tanggal_b" name="tanggal_b" placeholder="Isi jumlah tanggal_b" value="<?= set_value('tanggal_b');?>"><?= form_error('tanggal_b', '<small class="text-danger ">', '</small>');?>
              </div>
              <div class="float-right">
                <button type="submit" name="periode" id="periode" class="btn btn-secondary btn-icon-split">
                  <span class="icon text-white-50">
                    <i class="fas fa-print"></i>
                  </span>
                  <span class="text">Cetak Periode</span>
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

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
              <h6 class="m-0 font-weight-bold text-primary">Tambah Data SARPRAS</h6>
            </div>
            <div class="card-body">
              <form action="" method="post">
                <div class="form-group">
                  <label for="nama_barang"><b>Nama Barang</b></label>
                  <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Isi nama barang" value="<?= set_value('nama_barang');?>"><?= form_error('nama_barang', '<small class="text-danger ">', '</small>');?>
                </div>
                <div class="form-group">
                  <label for="jumlah"><b>Jumlah</b></label>
                  <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Maukan jumlah barang" value="<?= set_value('jumlah');?>"><?= form_error('jumlah', '<small class="text-danger ">', '</small>');?>
                </div>
                <div class="form-group">
                  <label for="kondisi"><b>Kondisi</b></label>
                  <input type="text" class="form-control" id="kondisi" name="kondisi" placeholder="Masukan kondisi barang" value="<?= set_value('kondisi');?>"><?= form_error('kondisi', '<small class="text-danger ">', '</small>');?>
                </div>
                <div class="float-right">
                  <a href="<?= base_url('receptionis/data_SARPRAS');?>" class="btn btn-secondary btn-icon-split">
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

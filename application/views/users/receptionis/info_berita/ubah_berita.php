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
              <h6 class="m-0 font-weight-bold text-primary">Ubah Info Berita</h6>
            </div>
            <div class="card-body">
              <form action="" method="post">
                <input type="hidden" name="id_berita" value="<?= $j_berita['id_berita'];?>">
                <div class="form-group">
                  <label for="tanggal"><b>Tanggal</b></label>
                  <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="" value="<?= $j_berita['tanggal'];?>"><?= form_error('tanggal', '<small class="text-danger ">', '</small>');?>
                </div>
                <div class="form-group">
                  <label for="isi_berita"><b>Isi Berita</i></b></label>
                  <textarea type="text" class="form-control" id="isi_berita" name="isi_berita" placeholder="Maukan isi berita " value=""><?= form_error('isi_berita', '<small class="text-danger ">', '</small>');?><?= $j_berita['isi_berita'];?></textarea>
                </div>
                <div class="float-right">
                  <a href="<?= base_url('receptionis/info_berita');?>" class="btn btn-secondary btn-icon-split">
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

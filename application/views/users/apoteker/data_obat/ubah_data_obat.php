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
              <h6 class="m-0 font-weight-bold text-primary">Ubah Data Obat</h6>
            </div>
            <div class="card-body">
              <form action="" method="post">
                <input type="hidden" name="id_obat" value="<?= $j_obat['id_obat'];?>">
                <div class="form-group">
                  <label for="nama_obat"><b>Nama Obat</b></label>
                  <input type="text" class="form-control" id="nama_obat" name="nama_obat" placeholder="Isi nama obat" value="<?= $j_obat['nama_obat'];?>"><?= form_error('nama_obat', '<small class="text-danger ">', '</small>');?>
                  </div>
                  <div class="form-group">
                    <label for="stock"><b>Stok</b></label>
                    <input type="text" class="form-control" id="stock" name="stock" placeholder="Isi jumlah stock" value="<?= $j_obat['stock'];?>"><?= form_error('stock', '<small class="text-danger ">', '</small>');?>
                  </div>
                  <div class="form-group">
                  <label for="satuan"><b>Satuan :</b></label>
                  <select class="form-control" id="satuan" name="satuan">
                    <?php $satuan = $this->input->post('satuan') ? $this->input->post('satuan') : $j_obat->satuan ?>
                    <option value="Butir"<?php if ( $j_obat['satuan'] == 'Butir') {echo 'selected';} ?>>Butir</option>
                    <option value="Strip"<?php if ( $j_obat['satuan'] == 'Strip') {echo 'selected';} ?>>Strip</option>
                    <option value="Botol"<?php if ( $j_obat['satuan'] == 'Botol') {echo 'selected';} ?>>Botol</option>
                    <option value="Tablet"<?php if ( $j_obat['satuan'] == 'Tablet') {echo 'selected';} ?>>Tablet</option>
                  </select>
                </div>  
                  <div class="form-group">
                    <label for="harga"><b>Harga</b></label>
                    <input type="text" class="form-control" id="harga" name="harga" placeholder="Isi jumlah harga" value="<?= $j_obat['harga'];?>"><?= form_error('harga', '<small class="text-danger ">', '</small>');?>
                  </div>
                  <div class="form-group">
                    <label for="expired"><b>Expired</b></label>
                    <input type="date" class="form-control" id="expired" name="expired" placeholder="" value="<?= $j_obat['expired'];?>"><?= form_error('expired', '<small class="text-danger ">', '</small>');?>
                  </div>
                  <div class="float-right">
                    <a href="<?= base_url('Apoteker/data_obat');?>" class="btn btn-secondary btn-icon-split">
                      <span class="icon text-white-50">
                        <i class="fas fa-arrow-left"></i>
                      </span>
                      <span class="text">Kembali</span>
                    </a>
                    <button type="submit" name="tambah" class="btn btn-primary btn-icon-split">
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

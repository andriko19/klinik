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
              <h6 class="m-0 font-weight-bold text-primary">Ubah Pasien</h6>
            </div>
            <div class="card-body">
              <form action="" method="post">
                <input type="hidden" name="id_users" value="<?= $u_pasien['id_users'];?>">
                <input type="hidden" name="id_level_user" value="<?= $u_pasien['id_level_user'];?>">
                <div class="form-group">
                  <label for="hari">Nama Pasien</label>
                  <input type="text" class="form-control" id="nama_users" name="nama_users" value="<?= $u_pasien['nama_users'];?>"> 
                  <small class="form-text text-danger"> <?= form_error('nama_users')?></small>
                </div>
                <div class="form-group">
                  <label for="hari">Tanggal Lahir</label>
                  <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?= $u_pasien['tanggal_lahir'];?>"> 
                  <small class="form-text text-danger"> <?= form_error('tanggal_lahir')?></small>
                </div>
                <div class="form-group">
                  <label for="hari">Umur</label>
                  <input type="text" class="form-control" id="umur" name="umur" value="<?= $u_pasien['umur'];?>"> 
                  <small class="form-text text-danger"> <?= form_error('umur')?></small>
                </div>
                <div class="form-group">
                  <label for="hari">Nama Suami</label>
                  <input type="text" class="form-control" id="nama_suami" name="nama_suami" value="<?= $u_pasien['nama_suami'];?>"> 
                  <small class="form-text text-danger"> <?= form_error('nama_suami')?></small>
                </div>
                <div class="form-group">
                  <label for="tanggal">Alamat</label>
                  <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $u_pasien['alamat'];?>">
                  <small class="form-text text-danger"> <?= form_error('alamat')?></small>
                </div>
                <div class="form-group">
                  <label for="kapasitas">Telepon</label>
                  <input type="text" class="form-control" id="telepon" name="telepon" value="<?= $u_pasien['telepon'];?>">
                  <small class="form-text text-danger"> <?= form_error('telepon')?></small>
                </div>
                <input type="hidden" name="username" value="<?= $u_pasien['username'];?>">
                <input type="hidden" name="password" value="<?= $u_pasien['password'];?>">
                <input type="hidden" name="registrasi" value="<?= $u_pasien['tanggal_registrasi'];?>">
                <div class="float-right">
                  <a href="<?= base_url('receptionis/data_pasien');?>" class="btn btn-secondary btn-icon-split">
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

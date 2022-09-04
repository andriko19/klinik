  <!-- Begin Page Content -->
	<div class="container-fluid">
	  <!-- Page Heading -->
	  <h1 class="h3 mb-4 text-gray-800"> <?= $title;?> <small>-> ubah Profil</small> </h1>
	</div>
	<!-- /.container-fluid -->
	<div class="container">

    <div class="container">
        <div class="col-lg-6">
          <!-- Basic Card Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Ubah Profil User</h6>
            </div>
            <div class="card-body">
              <form action="" method="post">
                <input type="hidden" name="id_users" value="<?= $j_profil['id_users'];?>">
                <div class="form-group">
                  <b>Nama Pasien :</b>
                  <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Isi Nama Lengkap" value="<?= $j_profil['nama_users'];?>"><?= form_error('nama', '<small class="text-danger ">', '</small>');?>
                </div>
                <div class="form-group">
                  <b>Tanggal Lahir :</b>
                  <input type="date" class="form-control form-control-user" id="tanggal_lahir" name="tanggal_lahir" placeholder="Tanggal Lahir" value="<?= $j_profil['tanggal_lahir'];?>"> <?= form_error('tanggal_lahir', '<small class="text-danger ">', '</small>');?>
                </div>
                <div class="form-group">
                  <b>Umur Pasien :</b>
                  <input type="text" class="form-control form-control-user" id="umur" name="umur" placeholder="Umur Pasien" value="<?= $j_profil['umur'];?>"> <?= form_error('umur', '<small class="text-danger ">', '</small>');?>
                </div>
                <div class="form-group">
                  <b>Nama Suami :</b>
                  <input type="text" class="form-control form-control-user" id="nama_suami" name="nama_suami" placeholder="Nama Suami Pasien" value="<?= $j_profil['nama_suami'];?>"> <?= form_error('nama_suami', '<small class="text-danger ">', '</small>');?>
                </div>
                <div class="form-group">
                  <b>Alamat Pasien :</b>
                  <input type="text" class="form-control form-control-user" id="alamat" name="alamat" placeholder="Alamat Tempat Tinggal Pasien" value="<?= $j_profil['alamat'];?>"> <?= form_error('alamat', '<small class="text-danger ">', '</small>');?>
                </div>
                <div class="form-group">
                  <b>Nomer Telepon Pasien :</b>
                  <input type="number" class="form-control form-control-user" id="telepon" name="telepon" placeholder="Nomer Telepon Yang Bisa Dihubungi" value="<?= $j_profil['telepon'];?>"> <?= form_error('telepon', '<small class="text-danger ">', '</small>');?>
                </div>
                <div class="float-right">
                  <a href="<?= base_url('Pasien/profil_pasien');?>" class="btn btn-secondary btn-icon-split">
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

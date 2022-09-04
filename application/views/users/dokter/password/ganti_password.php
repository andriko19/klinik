	<!-- Begin Page Content -->
	<div class="container-fluid">
	  <!-- Page Heading -->
	  <h1 class="h3 mb-4 text-gray-800"> <?= $title;?> </h1>
	</div>
	<!-- /.container-fluid -->
	<div class="container">
    <?php if( $this->session->flashdata('message') ) : ?>
      <div class="text-center" id="flash" role="alert">
        <?= $this->session->flashdata('message');?>
      </div>
    <?php endif; ?>

    <div class="row mt-3">
      <div class="col-md-6">
      	<div class="card" style="width: 18rem;">
          <img src="<?= base_url('assets/img/My_profile/profile1.jpg');?>" class="card-img" alt="My Profile">
            <div class="card-body">
              <small class="text-muted"> <?= $users['nama_users']; ?> </small> </br>
              <small class="text-muted"> <?= date('d F Y',strtotime($users['tanggal_lahir'])); ?>  </small> </br>
              <small class="text-muted"> <?= $users['umur']; ?> Tahun </small> </br>
              <small class="text-muted"> <?= $users['nama_suami']; ?>  </small> </br>
              <small class="text-muted"> <?= $users['alamat']; ?>  </small> </br>
              <small class="text-muted"> <?= $users['telepon']; ?>  </small> </br>
              <small class="text-muted"> Terdaftar Sejak :  <?= date('d F Y', $users['tanggal_registrasi']); ?> </small>
            </div>
        </div>
        <a href="<?= base_url('dokter/ubah_profil/'.$users['id_users']);?>" class="btn btn-success btn-icon-split mt-3">
            <span class="icon text-white-50">
              <i class="fas fa-user-edit"></i>
          </span>
            <span class="text">Ubah Profil</span>
        </a>
      </div>

      <div class="col-md-6">
        <div class="card" style="width: 18rem;">
          <ul class="list-group list-group-flush">
            <li class="list-group-item"><b>Input Password Baru!</b></li>
              <form action="" method="post">
                <li class="list-group-item">
                  <div class="form-group">
                  <label for="password_lama">Password Lama :</label>
                  <input type="password" class="form-control" id="password_lama" name="password_lama" placeholder="Masukan password lama anda">
                  <?= form_error('password_lama', '<small class="text-danger ">', '</small>');?> 
                  </div>
                </li>
                <li class="list-group-item">
                  <div class="form-group">
                  <label for="password1">Password Baru :</label>
                  <input type="password" class="form-control" id="password1" name="password1" placeholder="Masukan password baru anda">
                  <?= form_error('password1', '<small class="text-danger ">', '</small>');?> 
                  </div>
                </li>
                <li class="list-group-item">
                  <div class="form-group">
                  <label for="password2">Ulangi Password Baru :</label>
                  <input type="password" class="form-control" id="password2" name="password2" placeholder="Ulangi password baru anda">
                  <?= form_error('password2', '<small class="text-danger ">', '</small>');?> 
                  </div>
                </li>
            </ul>
            <div class="card-body">
               <button type="submit" class="btn btn-success btn-icon-split">
                 <span class="icon text-white-50">
                  <i class="fas fa-user-edit"></i>
                  </span>
                  <span class="text">Yakin diubah!</span>
               </button>
          </div>
        </div>
        <h1 class="h3 mb-2 text-gray-800 mt-3">Perhatian!</h1>
          <p class="mb-4 text-justify">&emsp;Catat dan ingat kambali Password Baru anda, jika anda berniat ingin mengubah Password Lama, supaya anda tetap bisa login kedalam sistem,<strong>Terimaksih</strong>.</p>
      </div>
    </div>
	</div>
</div>	
<!-- End of Main Content -->

<!-- Begin Page Content -->
  <div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"> <?= $title;?> </h1>
    <div class="container">
      <?php if( $this->session->flashdata('message') ) : ?>
        <div class="text-center" id="flash" role="alert">
          <?= $this->session->flashdata('message');?>
        </div>
      <?php endif; ?>
      
      <div class="card mb-3" style="max-width: 540px;">
        <div class="row no-gutters">
          <div class="col-md-5">
            <img src="<?= base_url('assets/img/My_profile/profile1.jpg');?>" class="card-img" alt="My Profile">
          </div>
          <div class="col-md-5">
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
        </div>
      </div>
      <a href="<?= base_url('pasien/ubah_profil/'.$users['id_users']);?>" class="btn btn-success btn-icon-split">
            <span class="icon text-white-50">
              <i class="fas fa-user-edit"></i>
          </span>
            <span class="text">Ubah Profil</span>
        </a>
    </div>
  </div>
</div>
<!-- End of Main Content -->
	<!-- Begin Page Content -->
	<div class="container-fluid">
	  <!-- Page Heading -->
	  <h1 class="h3 mb-4 text-gray-800"> <?= $title;?> </h1>
	</div>
	<!-- /.container-fluid -->
	<div class="container-fluid">

    <?php if( $this->session->flashdata('message') ) : ?>
      <div class="alert alert-success alert-dismissible fade show text-center" id="flash" role="alert">
        Data jadwal peraktek<strong> berhasil </strong> <?= $this->session->flashdata('message');?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php endif; ?>

    <div class="row mt-4">
      <div class="col-lg-6">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Kelola Jadwal Hari Besok</h6>
          </div>
          <div class="card-body">
            <a href="<?= base_url('receptionis/tambah_jadwal');?>" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50">
                  <i class="fas fa-keyboard"></i>
                </span>
                <span class="text">Tambah Jadwal Hari Besok</span>
            </a>

             <div class="box mt-3">
              <div class="box-body table-responsive">
                <table class="table table-bordered table-striped dataTable">
                  <thead class="thead-dark text-center">
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Tanggal</th>
                      <th scope="col">Kapasitas</th>
                      <th scope="col">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=0; foreach ($jadwal as $ja) : ?>
                      <tr>
                        <th class="text-center"><?= ++$no;?>.</th>
                        <td><?= date('d-m-Y',strtotime($ja['tanggal']));?></td>
                        <td><?= $ja['kapasitas'];?></td>
                        <td class="text-center" width="50%">
                          <a href="<?= base_url('receptionis/ubah_jadwal/'.$ja['id_jadwal']);?>" class="btn btn-success btn-icon-split">
                              <span class="icon text-white-50">
                              <i class="fas fa-user-edit"></i>
                            </span>
                              <span class="text">Ubah</span>
                          </a>
                          <a href="<?= base_url('receptionis/hapus_jadwal/'.$ja['id_jadwal']);?>" class="btn btn-danger btn-icon-split" onclick="return confirm('Anda yakin ingin menghapus data?');">
                              <span class="icon text-white-50">
                                <i class="fas fa-trash"></i>
                              </span>
                              <span class="text">Hapus</span>
                          </a>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div> 
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Kelola Pesan Hari</h6>
          </div>
          <div class="card-body">
            <a href="<?= base_url('receptionis/tambah_jadwal_pesan_hari');?>" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50">
                  <i class="fas fa-keyboard"></i>
                </span>
                <span class="text">Tambah Jadwal Pesan Hari</span>
            </a>

             <div class="box mt-3">
              <div class="box-body table-responsive">
                <table class="table table-bordered table-striped dataTable">
                  <thead class="thead-dark text-center">
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Tanggal</th>
                      <th scope="col">Kapasitas</th>
                      <th scope="col">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=0; foreach ($jadwalPesan as $ja) : ?>
                      <tr>
                        <th class="text-center"><?= ++$no;?>.</th>
                        <td><?= date('d-m-Y',strtotime($ja['tanggal']));?></td>
                        <td><?= $ja['kapasitas'];?></td>
                        <td class="text-center" width="50%">
                          <a href="<?= base_url('receptionis/ubah_jadwal_pesan_hari/'.$ja['id_jadwal']);?>" class="btn btn-success btn-icon-split">
                              <span class="icon text-white-50">
                              <i class="fas fa-user-edit"></i>
                            </span>
                              <span class="text">Ubah</span>
                          </a>
                          <a href="<?= base_url('receptionis/hapus_jadwal_pesan_hari/'.$ja['id_jadwal']);?>" class="btn btn-danger btn-icon-split" onclick="return confirm('Anda yakin ingin menghapus data?');">
                              <span class="icon text-white-50">
                                <i class="fas fa-trash"></i>
                              </span>
                              <span class="text">Hapus</span>
                          </a>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div> 
            </div>
          </div>
        </div>
      </div>
    </div>

	</div>
</div>	
<!-- End of Main Content -->
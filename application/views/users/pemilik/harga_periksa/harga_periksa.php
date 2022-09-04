	<!-- Begin Page Content -->
	<div class="container-fluid">
	  <!-- Page Heading -->
	  <h1 class="h3 mb-4 text-gray-800"> <?= $title;?> </h1>
	</div>
	<!-- /.container-fluid -->
	<div class="container-fluid">

    <?php if( $this->session->flashdata('message') ) : ?>
      <div class="alert alert-success alert-dismissible fade show text-center" id="flash" role="alert">
        Data harga periksa<strong> berhasil </strong> <?= $this->session->flashdata('message');?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php endif; ?>

    <a href="<?= base_url('pemilik/tambah_harga');?>" class="btn btn-primary btn-icon-split">
        <span class="icon text-white-50">
          <i class="fas fa-keyboard"></i>
        </span>
        <span class="text">Tambah Harga Periksa</span>
    </a>

    <div class="box mt-3">
      <div class="box-body table-responsive">
        <table class="table table-bordered table-striped dataTable">
          <thead class="thead-dark text-center">
            <tr>
              <th scope="col">No</th>
              <th scope="col">Jenis Periksa</th>
              <th scope="col">Harga</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
          <?php $no=0; foreach ($harga as $har) : ?>
            <tr>
              <th class="text-center"><?= ++$no;?>.</th>
              <td><?= $har['jenis_periksa'];?></td>
              <td><?= $har['harga'];?></td>
              <td class="text-center" width="25%">
                <a href="<?= base_url('pemilik/ubah_harga/'.$har['id_harga_periksa']);?>" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                    <i class="fas fa-user-edit"></i>
                  </span>
                    <span class="text">Ubah</span>
                </a>
                <a href="<?= base_url('pemilik/hapus_harga/'.$har['id_harga_periksa']);?>" class="btn btn-danger btn-icon-split" onclick="return confirm('Anda yakin ingin menghapus data?');">
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
<!-- End of Main Content -->
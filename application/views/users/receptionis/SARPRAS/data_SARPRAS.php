  <!-- Begin Page Content -->
  <div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"> <?= $title;?> </h1>
  </div>
  <!-- /.container-fluid -->
  <div class="container-fluid">

        <?php if( $this->session->flashdata('message') ) : ?>
          <div class="alert alert-success alert-dismissible fade show text-center" id="flash" role="alert">
            Data Sarana Prasana<strong> berhasil </strong> <?= $this->session->flashdata('message');?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php endif; ?>

        <a href="<?= base_url('receptionis/tambah_SARPRAS');?>" class="btn btn-primary btn-icon-split">
            <span class="icon text-white-50">
              <i class="fas fa-keyboard"></i>
            </span>
            <span class="text">Tambah Data SARPRAS</span>
        </a>

        <div class="card shadow mb-4 mt-3">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered  table-striped" id="dataTable" width="100%" cellspacing="0">
                  <thead class="thead-dark text-center">
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Nama Barang</th>
                      <th scope="col">Jumlah</th>
                      <th scope="col">Kondisi</th>
                      <th scope="col">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=0; foreach ($sarpras as $sar) : ?>
                    <tr>
                      <th class="text-center"><?= ++$no;?>.</th>
                      <td><?= $sar['nama_barang'];?></td>
                      <td><?= $sar['jumlah'];?></td>
                      <td><?= $sar['kondisi'];?></td>
                      <td class="text-center" width="20%">
                        <a href="<?= base_url('receptionis/ubah_SARPRAS/'.$sar['id_SARPRAS']);?>" class="btn btn-success btn-icon-split">
                            <span class="icon text-white-50">
                              <i class="fas fa-user-edit"></i>
                          </span>
                            <span class="text">Ubah</span>
                        </a>
                        <a href="<?= base_url('receptionis/hapus_SARPRAS/'.$sar['id_SARPRAS']);?>" class="btn btn-danger btn-icon-split" onclick="return confirm('Anda yakin ingin menghapus data?');">
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
<!-- End of Main Content -->
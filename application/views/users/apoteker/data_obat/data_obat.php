  <!-- Begin Page Content -->
  <div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"> <?= $title;?> </h1>
  </div>
  <!-- /.container-fluid -->
  <div class="container-fluid">

        <?php if( $this->session->flashdata('message') ) : ?>
          <div class="alert alert-success alert-dismissible fade show text-center" id="flash" role="alert">
            Data Obat<strong> berhasil </strong> <?= $this->session->flashdata('message');?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php endif; ?>

        <a href="<?= base_url('Apoteker/tambah_data_obat');?>" class="btn btn-primary btn-icon-split">
            <span class="icon text-white-50">
              <i class="fas fa-keyboard"></i>
            </span>
            <span class="text">Tambah Data Obat</span>
        </a>

        <div class="card shadow mb-4 mt-3">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered  table-striped" id="dataTable" width="100%" cellspacing="0">
                  <thead class="thead-dark text-center">
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Nama Obat</th>
                      <th scope="col">Stok</th>
                      <th scope="col">Satuan</th>
                      <th scope="col">Harga</th>
                      <th scope="col">Expired</th>
                      <th scope="col">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                   <?php $no=0; foreach ($t_obat as $obat) :?>
                      <tr>
                        <th class="text-center"><?= ++$no;?>.</th>
                        <td><?= $obat['nama_obat'];?></td>
                        <td><?= $obat['stock'];?></td>
                        <td><?= $obat['satuan'];?></td>
                        <td> Rp <?= number_format($obat['harga'],0,',','.') ;?></td>
                        <td><?= date('d-m-Y',strtotime($obat['expired']));?></td>
                        <td class="text-center" width="20%">
                          <a href="<?= base_url('Apoteker/ubah_data_obat/'.$obat['id_obat']);?>" class="btn btn-success btn-icon-split">
                              <span class="icon text-white-50">
                                <i class="fas fa-user-edit"></i>
                            </span>
                              <span class="text">Ubah</span>
                          </a>
                          <a href="<?= base_url('Apoteker/hapus_data_obat/'.$obat['id_obat']);?>" class="btn btn-danger btn-icon-split" onclick="return confirm('Anda yakin ingin menghapus data?');">
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
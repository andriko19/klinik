  <!-- Begin Page Content -->
	<div class="container-fluid">
	  <!-- Page Heading -->
	  <h1 class="h3 mb-4 text-gray-800"> <?= $title;?></h1>
	</div>
	<!-- /.container-fluid -->
	<div class="container-fluid">
    <?php if( $this->session->flashdata('message') ) : ?>
      <div class="text-center" id="flash" role="alert">
        <?= $this->session->flashdata('message');?>
      </div>
    <?php endif; ?>

    <div class="container-fluid">
      <div class="">
        <div class="card shadow mb-4">
          <div class="">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tambah Detail Resep Obat</h6>
            </div>
            <div class="card-body">
            
              <div class="row">
                <!-- Basic Card Example -->
                <div class="col-lg-6 mt-3">
                  <div class="card shadow mb-4">
                    <div class="card-body">
                      <form action="" method="post">
                        <div class="form-group">
                          <label for="kode_resep">No.Resep</label>
                          <input type="text" class="form-control" id="kode_resep" name="kode_resep" value="" placeholder="Masukan No resep sesuai No resep disamping ">
                          <small class="form-text text-danger"> <?= form_error('kode_resep')?></small>
                        </div>
                        <div class="form-group">
                          <label for="nama_obat">Nama Obat</label>
                          <input type="text" class="form-control" id="nam_obat" name="nam_obat" value="" placeholder=""> 
                          <small class="form-text text-danger"> <?= form_error('nam_obat')?></small>
                        </div>
                        <input type="hidden" class="form-control" id="id_obat" name="id_obat" value="" placeholder="Masukan nama obat">
                        <div class="form-group">
                          <label for="aturan_minum">Aturan Minum</label>
                          <input type="text" class="form-control" id="aturan_minum" name="aturan_minum" value="" placeholder="Tentukan aturan minum" > 
                          <small class="form-text text-danger"> <?= form_error('aturan_minum')?></small>
                        </div>
                        <div class="form-group">
                          <label for="jumlah_obat">Jumlah Obat <small> > satuan biji</small></label>
                          <input type="text" class="form-control" id="jumlah_obat" name="jumlah_obat" value="" placeholder="Tentukan jumlah obat">
                          <small class="form-text text-danger"> <?= form_error('jumlah_obat')?></small>
                        </div>
                        <input type="hidden" class="form-control" id="harga" name="harga" value="" placeholder="">
                        <div class="float-right">
                          <a href="<?= base_url('dokter/resep_obat');?>" class="btn btn-secondary btn-icon-split">
                            <span class="icon text-white-50">
                             <i class="fas fa-arrow-left"></i>
                            </span>
                            <span class="text">Kembali</span>
                          </a>
                          <button type="submit" name="tambah" class="btn btn-primary btn-icon-split">
                            <span class="icon text-white-50">
                              <i class="fas fa-paper-plane"></i>
                            </span>
                            <span class="text">Tambahkan Obat</span>
                          </button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>

                <div class="col-lg-6 mt-3">
                  <div class="card shadow mb-4">
                    <div class="card-body">
                      <div class="row">
                       <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-6 col-md-6 mb-4">
                          <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                              <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">No.Resep</div>
                                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $kode_max;?></div>
                                </div>
                                <div class="col-auto">
                                  <i class="fas fa-sort-numeric-down fa-2x text-gray-300"></i>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>   
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="card shadow mb-4">
                <div class="">
                  <div class="card-body">
                     <table class="table table-bordered table-striped dataTable">
                      <thead class="thead-dark text-center">
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">No.Resep</th>
                          <th scope="col">Nama Obat</th>
                          <th scope="col">Aturan Minum</th>
                          <th scope="col">Jumlah Obat</th>
                          <th scope="col">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php $no=0; foreach ($DetResep as $resep) : ?>
                        <tr>
                          <th class="text-center"><?= ++$no;?>.</th>
                          <td><?= $resep['kode_resep']?></td>
                          <td><?= $resep['nama_obat']?></td>
                          <td><?= $resep['aturan_minum']?></td>
                          <td><?= $resep['jumlah_obat']?></td>
                          <td class="text-center" width="25%">
                            <a href="<?= base_url('dokter/hapus_detObat/'. $resep['id_detail_resep_obat']);?>" class="btn btn-danger btn-icon-split" onclick="return confirm('Anda yakin ingin menghapus obat?');">
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
	</div>
</div>	
<!-- End of Main Content -->

 <script type="text/javascript">
    $(document).ready(function(){
      // autocomplete Id Pasien
      $("#kode_resep").autocomplete({
        source: "<?= base_url('Dokter/get_KodeResep');?>",
      // end autocomplete Id Pasien
      });
    });
  </script>

  <script type="text/javascript">
    $(document).ready(function(){
      // autocomplete Id Pasien
      $("#nam_obat").autocomplete({
        source: "<?= base_url('Dokter/get_NamaObat');?>",

        select:function(event, ui){
          $('[name="nam_obat"]').val(ui.item.label);
          $('[name="id_obat"]').val(ui.item.id_obat);
          $('[name="harga"]').val(ui.item.harga);
        } 
      // end autocomplete Id Pasien
      });
    });
  </script>

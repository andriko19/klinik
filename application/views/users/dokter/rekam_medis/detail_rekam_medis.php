  <!-- Begin Page Content -->
  <div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"> <?= $title;?> </h1>
  </div>
  <!-- /.container-fluid -->
  <div class="container-fluid">

    <?php if( $this->session->flashdata('message') ) : ?>
      <div class="alert alert-success alert-dismissible fade show text-center" id="flash" role="alert">
        <?= $this->session->flashdata('message');?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php endif; ?>

    <?php if($d_RM == false) { ?>
      <div class="row">
          <div class="col-lg-6">
            <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
              <strong>
                <?= $this->session->flashdata('rm');?>
              </strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          </div>
      </div>
      <div class="container-fluid mt-3">
        <table>
          <tr>
            <th>
              <a href="<?= base_url('dokter/rekam_medis');?>" class="btn btn-info btn-icon-split">
                  <span class="icon text-white-50">
                    <i class="fas fa-arrow-left"></i>
                  </span>
                  <span class="text">Kembali</span>
              </a>
            </th>
            <th>
              <form action="<?= base_url ('Dokter/buat_rekam_medis');?>" method="post">

                <input type="text" hidden name="id" value="<?= $this->uri->segment(3);?>">  
                
                <button type="submit" name="" class="btn btn-primary btn-icon-split">
                  <span class="icon text-white-50">
                    <i class="fas fa-pencil-alt"></i>
                  </span>
                  <span class="text">Buat Rekam Medis</span>
                </button>
              </form>
            </th>
          </tr>
        </table>
      </div>

    <?php } else {  ?>

	    <div class="row">
        <div class="col-lg-6">

          
            <!-- Rekam medis -->
            <div class="card shadow mb-4">

              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Rekam Medis</h6>
              </div>

              <div class="card-body">

                <div class="row">

                  <div class="col-md-4">
                    <small class="text-muted"> Nama Pasien </small> </br>
                    <small class="text-muted"> HPHT </small> </br>
                    <small class="text-muted"> HTP </small> </br>
                    <small class="text-muted"> Hamil Ke- </small> </br>
                    <small class="text-muted"> Jumlah Persalinan </small> </br>
                    <small class="text-muted"> Jumlah Keguguran </small> </br>
                    <small class="text-muted"> Jumlah Anak Hidup </small> </br>
                    <small class="text-muted"> Jumlah Anak Mati </small> </br>
                    <small class="text-muted"> Cara Persalinan Terakhir </small> </br>
                    <small class="text-muted"> Riwayat Penyakit Ibu </small> </br> 
                  </div>

                  <div class="col-md-7">
                    <?php foreach ($d_RM as $rm) :?>
                      <small class="text-muted"> : <?= $rm['nama_users'];?></small> </br>
                      <small class="text-muted"> : <?= date('d-m-Y',strtotime($rm['HPHT']));?></small> </br>
                      <small class="text-muted"> : <?= date('d-m-Y',strtotime($rm['HTP']));?> </small> </br>
                      <small class="text-muted"> : <?= $rm['hamil_ke'];?> </small> </br>
                      <small class="text-muted"> : <?= $rm['jumlah_persalinan'];?> </small> </br>
                      <small class="text-muted"> : <?= $rm['jumlah_keguguran'];?> </small> </br>
                      <small class="text-muted"> : <?= $rm['jumlah_anak_hidup'];?> </small> </br>
                      <small class="text-muted"> : <?= $rm['jumlah_anak_mati'];?> </small> </br>
                      <small class="text-muted"> : <?= $rm['cara_persalinan_terakhir'];?> </small> </br>
                      <small class="text-muted"> : <?= $rm['riwayat_penyakit_ibu'];?> </small> </br>
                  </div>
                </div>
              </div>
            </div>

            <div>
              <table>
                <tr>
                  <th> 
                    <a href="<?= base_url('Dokter/rekam_medis');?>" class="btn btn-info btn-icon-split">
                        <span class="icon text-white-50">
                          <i class="fas fa-arrow-left"></i>
                        </span>
                        <span class="text">Kembali</span>
                    </a>
                  </th>
                  <th>
                    <a href="<?= base_url('Dokter/update_rekam_medis/'.$rm['id_RM']);?>" class="btn  btn-primary btn-icon-split">
                        <span class="icon text-white-50">
                         <i class="fas fa-pencil-alt"></i>
                        </span>
                        <span class="text">Perbaharui Rekam Medis</span>
                    </a>
                    <?php endforeach; ?>
                  </th>
                  <th>
                    <form action="<?= base_url ('Dokter/tambah_catatan');?>" method="post">

                      <input type="text" hidden name="kode_resep" value="<?= $kode;?>">
                      <input type="date" hidden name="tanggal" value="">
                      <input type="text" hidden name="id" value="<?= $this->uri->segment(3);?>">  
                      
                      <button type="submit" name="" class="btn btn-primary btn-icon-split">
                        <span class="icon text-white-50">
                          <i class="fas fa-pencil-alt"></i>
                        </span>
                        <span class="text">Tambah Catatan Kehamilan</span>
                      </button>
                    </form>
                  </th>
                </tr>
              </table>
            </div>

            <!-- catatan kehamilan -->
            <div class="card shadow mb-4 mt-3">

              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Catatan Kehamilan</h6>
              </div>

              <div class="card shadow mb-4">
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered  table-striped" id="dataTable1" width="100%" cellspacing="0">
                      <thead class="thead-dark text-center">
                        <tr>
                          <th>No</th>
                          <th>Tanggal Catatan</th>
                          <th>Berat Badan</th>
                          <th>Tensi Darah</th>
                          <th>Isi Catatan</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no=0; foreach ($j_catatan as $pa) :?>
                            <tr>
                              <th class="text-center"><?= ++$no;?>.</th>
                              <td><?= date('d-m-Y',strtotime($pa['tanggal']));?></td>
                              <td><?= $pa['berat_badan'];?></td>
                              <td><?= $pa['tensi_darah'];?></td>
                              <td><?= $pa['isi_catatan'];?></td>
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

    <?php } ?>

	</div>
</div>
<!-- End of Main Content -->
<script type="text/javascript">
  $(document).ready(function() {
    $('#dataTable1').dataTable( 
    {
    "bSort" : false
    });  
  });
</script>
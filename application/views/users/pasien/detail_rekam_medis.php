    <!-- Begin Page Content -->
    <div class="container-fluid">
      <!-- Page Heading -->
      <h1 class="h3 mb-4 text-gray-800"> <?= $title;?> </h1>
    </div>
    <!-- /.container-fluid -->
    <div class="container-fluid">
      <?php if($det_RM == false) { ?>
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
      <?php } else {  ?>
  	    <div class="row mt-3">
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
                    <small class="text-muted"> JUmlah Keguguran </small> </br>
                    <small class="text-muted"> Jumlah Anak Hidup </small> </br>
                    <small class="text-muted"> Jumlah Anak Mati </small> </br>
                    <small class="text-muted"> Cara Persalinan Terakhir </small> </br>
                    <small class="text-muted"> Riwayat Penyakit Ibu </small> </br> 
                  </div>
                  <div class="col-md-7">
                    <?php foreach ($det_RM as $rm) :?>
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
                    <?php endforeach; ?>
                  </div>
                </div>
              </div>
            </div>
            <!-- catatan kehamilan -->
            <div class="card shadow mb-4 mt-3">

              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Catatan Kehamilan</h6>
              </div>

              <div class="card shadow mb-4">
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered  table-striped" id="dataTable" width="100%" cellspacing="0">
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
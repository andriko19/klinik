    <!-- Begin Page Content -->
    <div class="container-fluid">
      <!-- Page Heading -->
      <h1 class="h3 mb-4 text-gray-800"> <?= $title;?> </h1>
    </div>
    <!-- /.container-fluid -->
    <div class="container-fluid">
     <a href="<?= base_url('Pasien/detail_rekam_medis/'. $users['id_users']);?>" class="btn btn-primary btn-icon-split">
          <span class="icon text-white-50">
            <i class="fas fa-keyboard"></i>
          </span>
          <span class="text">Tampilkan Detail Rekam Medis</span>
      </a>
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
                  <small class="text-muted"> : </small> </br>
                  <small class="text-muted"> : </small> </br>
                  <small class="text-muted"> : </small> </br>
                  <small class="text-muted"> : </small> </br>
                  <small class="text-muted"> : </small> </br>
                  <small class="text-muted"> : </small> </br>
                  <small class="text-muted"> : </small> </br>
                  <small class="text-muted"> : </small> </br>
                  <small class="text-muted"> : </small> </br>
                  <small class="text-muted"> : </small> </br>
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
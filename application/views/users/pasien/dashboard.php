    <!-- Begin Page Content -->
    <div class="container-fluid">
      <!-- Page Heading -->
      <h1 class="h3 mb-4 text-gray-800"> <?= $title;?> </h1>
    </div>
    <!-- /.container-fluid -->
    <div class="container">
    	<!-- Content Row -->
    <div class="row">
      <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <?php if($DetAntrian == false) { ?>
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Anda tidak memiliki nomer antrian</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>
              <?php } else {  ?>
                <?php foreach ($DetAntrian as $det) : ?>
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Anda memiliki nomer antrian</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $det['nomor_antrian'];?></div>
                <?php endforeach;?>
              <?php } ?>
            </div>
            <div class="col-auto">
              <i class="fas fa-sort-numeric-down fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Anda memiliki nomor induk</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $users['id_users']; ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-user-nurse fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
    </div>
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
    </div>
    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
    </div>
    </div>
	  <div class="row">
      <div class="col-lg-6">
        <!-- Basic Card Example -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Papan Informasi</h6>
          </div>
          <div class="card-body">
            <table class="table table-bordered table-striped dataTable">
              <thead class="thead-dark text-center">
                <tr>
                  <th scope="col">Tanggal</th>
                  <th scope="col">Informasi</th>
                </tr>
              </thead>
              <tbody>
                <tr>
              <?php $no=0; foreach ($t_infor as $info) : ?>
                <td><?= date('d-m-Y',strtotime($info['tanggal']));?></td>
                <td><?= $info['isi_berita'];?></td>
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
<!-- End of Main Content -->
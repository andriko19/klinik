<div class="card shadow mb-4 mt-3">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered  table-striped" id="dataTable" width="100%" cellspacing="0">
          <thead class="thead-dark text-center">
            <tr>
              <th scope="col">No</th>
              <th scope="col">Tanggal</th>
              <th scope="col">Kode Resep</th>
              <th scope="col">Nama Pasien</th>
              <th scope="col">Nama Suami</th>
              <th scope="col">Alamat</th>
              <th scope="col">Total Bayar</th>
            </tr>
          </thead>
          <tbody>
            <?php $no=0; foreach ($DetLaporanObt as $per) : ?>
            <tr>
              <th class="text-center"><?= ++$no;?>.</th>
              <td><?= date('d-m-Y',strtotime($per['tanggal']));?></td>
              <td><?= $per['kode_resep'];?></td>
              <td><?= $per['nama_users'];?></td>
              <td><?= $per['nama_suami'];?></td>
              <td><?= $per['alamat'];?></td>
              <td> Rp <?= number_format($per['total_bayar'],0,',','.');?></td> 
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
</div>

<div class="row mt-3" id="TotalUang">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <a href="<?= base_url('pemilik/Cetak_LapObat/'.$tgll);?>" class="btn btn-secondary btn-icon-split" target="_blank">
         <span class="icon text-white-50">
        <i class="fas fa-print"></i>
      </span>
      <span class="text">Cetak Data</span>
      </a>
    </div>
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
    </div>
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
    </div>
    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah uang periksa :</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"> Rp <?= number_format($TotUangObat['total_bayar'],0,',','.') ;?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
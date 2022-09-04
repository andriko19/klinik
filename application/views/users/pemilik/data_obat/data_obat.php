	<!-- Begin Page Content -->
	<div class="container-fluid">
	  <!-- Page Heading -->
	  <h1 class="h3 mb-4 text-gray-800"> <?= $title;?> </h1>
	</div>
	<!-- /.container-fluid -->
	<div class="container-fluid">

        <div class="card shadow mb-4 mt-3">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered  table-striped" id="dataTable" width="100%" cellspacing="0">
                  <thead class="thead-dark text-center">
                    <tr>
                      <th>No</th>
                      <th>Nama Obat</th>
                      <th>Stock</th>
                      <th>Satuan</th>
                      <th>Harga</th>
                      <th>Expired</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=0; foreach ($t_obat as $obat) :?>
                        <tr>
                          <th class="text-center"><?= ++$no;?>.</th>
                          <td><?= $obat['nama_obat']?></td>
                          <td><?= $obat['stock']?></td>
                          <td><?= $obat['satuan'];?></td>
                          <td> Rp <?= number_format($obat['harga'],0,',','.') ?></td>
                          <td><?= date('d-m-Y',strtotime($obat['expired']));?></td>
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
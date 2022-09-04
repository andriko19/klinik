    <!-- Begin Page Content -->
    <div class="container-fluid">
      <!-- Page Heading -->
      <h1 class="h3 mb-4 text-gray-800"> <?= $title;?> </h1>
    </div>
    <!-- /.container-fluid -->
    <div class="container">
    	<div class="row">
    		<div class="col-md-6">
    			<h1 class="h3 mt-3 mb-2 text-gray-800 text"> Antrian Pasien </h1>
    			 <div class="text-xs font-weight-bold text-primary text-uppercase mb-2">Untuk hari ini Tanggal : <?php date_default_timezone_set('Asia/Jakarta'); echo date('d-m-Y'); ?> </div>
    			 <div class="box-body table-responsive">
			        <table class="table table-bordered table-striped dataTable">
			          <thead class="thead-dark text-center">
			           <tr>
					      <th scope="col">No</th>
					      <th scope="col">Nama Pasien</th>
					      <th scope="col">No Telepon</th>
					    </tr>
			          </thead>
			          <tbody>
			         	<?php foreach ($DetAntrian as $det) : ?>
				         	<tr>
						      <th scope="row"> <?= $det['nomor_antrian'];?></th>
						      <td> <?= $det['nama_users'];?></td>
						      <td> <?= $det['telepon'];?></td>
						    </tr> 
						<?php endforeach;?>
			          </tbody>
			        </table>
			     </div> 
			</div>
  		</div>
	</div>
</div>
<!-- End of Main Content -->


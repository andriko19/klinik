    <!-- Begin Page Content -->
    <div class="container-fluid">
      <!-- Page Heading -->
      <h1 class="h3 mb-4 text-gray-800"> <?= $title;?> </h1>
    </div>
    <!-- /.container-fluid -->
    <div class="container-fluid">
    	<?php if( $this->session->flashdata('message') ) : ?>
	      <div class="alert alert-dismissible fade show text-center" id="flash" role="alert">
	        <?= $this->session->flashdata('message');?>
	      </div>
	    <?php endif; ?>
    	<div class="row">
    		<div class="col-md-6">
    			<h1 class="h3 mt-3 mb-2 text-gray-800 text"> Antrian Pasien </h1>
    			<div class=" table-responsive">
	    			<table class="table">
	    				<tr>
	    					<th class="text-sm font-weight-bold text-primary text-uppercase mb-2">
	    						Untuk hari ini Tanggal : <?= date('d-m-Y',strtotime($t_jumAntrian['tanggal']));?>
	    					</th>
	    					<th width="25%">
	    						<a href="<?= base_url('receptionis/hapus_antrian');?>" class="btn btn-danger btn-icon-split " onclick="return confirm('Anda yakin ingin menghapus data?');">
				                    <span class="icon text-white-50">
				                      <i class="fas fa-trash"></i>
				                    </span>
				                    <small class="text">Hapus antrian</small>
				                </a>
	    					</th>
	    				</tr>
	    			</table>
			        <table class="table table-bordered table-striped dataTable">
			          <thead class="thead-dark text-center">
			           <tr>
					      <th scope="col">No</th>
					      <th scope="col">Nama Pasien</th>
					      <th scope="col">No Telepon</th>
					      <th scope="col">Status</th>
					    </tr>
			          </thead>
			          <tbody>
			          	<?php foreach ($DetAntrian as $det) : ?>
				         	<tr>
						      <th scope="row"> <?= $det['nomor_antrian'];?></th>
						      <td> <?= $det['nama_users'];?></td>
						      <td> <?= $det['telepon'];?></td>
						      <td class="text-center" width="25%">
				                <a href="<?= base_url('receptionis/konfirmasi_kehadiran/'.$det['id_antrian']);?>" class="btn btn-danger btn-icon-split" onclick="return confirm('Anda yakin data pasien yang akan diperiksa sudah benar?');">
				                    <span class="icon text-white-50">
				                      <i class="fas fa-trash"></i>
				                    </span>
				                    <span class="text">Antri</span>
				                </a>
				              </td>
						    </tr> 
						<?php endforeach;?>
			          </tbody>
			        </table>
			    </div> 
			</div>

			<div class="col-md-6">
				<h1 class="h3 mt-3 mb-2 text-gray-800 text"> Pasien Pesan Hari </h1>
				<div class="box-body table-responsive">
					<table class="table">
	    				<tr>
	    					<th>
	    						<a href="<?= base_url('receptionis/hapus_pesan_hari');?>" class="btn btn-danger btn-icon-split " onclick="return confirm('Anda yakin ingin menghapus data?');">
				                    <span class="icon text-white-50">
				                      <i class="fas fa-trash"></i>
				                    </span>
				                    <small class="text">Hapus semua daftar pesan hari</small>
				                </a>
	    					</th>
	    				</tr>
	    			</table>
			        <table class="table table-bordered table-striped dataTable">
			          <thead class="thead-dark text-center">
			           <tr>
					      <th scope="col">No</th>
					      <th scope="col">Tanggal</th>
					      <th scope="col">Nama Pasien</th>
					      <th scope="col">No Telepon</th>
					      <th scope="col">Aksi</th>
					    </tr>
			          </thead>
			          <tbody>
			         	<?php foreach ($DetPesan as $det) : ?>
				         	<tr>
						      <th scope="row"> <?= $det['nomor_pesan'];?></th>
						      <td> <?= date('d-m-Y',strtotime($det['tanggal']));?></td>
						      <td> <?= $det['nama_users'];?></td>
						      <td> <?= $det['telepon'];?></td>
						      <td class="text-center" width="25%">
				                <a href="<?= base_url('receptionis/hapus_pesan_hari_byId/'.$det['id_pesan_hari']);?>" class="btn btn-danger btn-icon-split" onclick="return confirm('Anda yakin data pasien pesan hari yang akan dihapus sudah benar?');">
				                    <span class="icon text-white-50">
				                      <i class="fas fa-trash"></i>
				                    </span>
				                    <span class="text">Hapus</span>
				                </a>
				              </td>
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


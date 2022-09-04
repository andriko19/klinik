	<!-- Begin Page Content -->
	<div class="container-fluid">
	  <!-- Page Heading -->
	  <h1 class="h3 mb-4 text-gray-800"> <?= $title;?> </h1>
	</div>
	<!-- /.container-fluid -->
	<div class="container-fluid">
	
		<div class="card mt-3" style="width: 25rem;">
            <div class="card-body">
            	<div class="row">
            		<div class="col-md-4">
		              <small class="text-muted"> No. Resep Obat </small> </br>
		              <small class="text-muted"> Tanggal </small> </br>
		              <small class="text-muted"> Nama Pasein </small> </br>
		              <small class="text-muted"> Nama Suami </small> </br>
		              <small class="text-muted"> Alamat </small> </br>
		          	</div>

		          	<div class="col-md-6">
		              <small class="text-muted"> : <?= $DetResep['kode_resep'];?>  </small> </br>
		              <small class="text-muted"> : <?= date('d-m-Y',strtotime($DetResep['tanggal']));?> </small> </br>
		              <small class="text-muted"> : <?= $DetResep['nama_users'];?> </small> </br>
		              <small class="text-muted"> : <?= $DetResep['nama_suami'];?> </small> </br>
		              <small class="text-muted"> : <?= $DetResep['alamat'];?> </small> </br>
		          	</div>
		        </div>
            </div>
        </div>

		<div class="mt-3">
		  <table class="table table-bordered table-striped mt-3">
			  <thead class="thead-dark text-center">
			    <tr>
			      <th scope="col">No</th>
			      <th scope="col">Nama Obat</th>
			      <th scope="col">Aturan Minum</th>
			      <th scope="col">Jumlah Obat</th>
            <th scope="col">Satuan Obat</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php $no=0; foreach ($DetResepp as $resep) :?>
			    <tr>
                  <th class="text-center"><?= ++$no;?>.</th>
                  <td><?= $resep['nama_obat']; ?></td>
                  <td><?= $resep['aturan_minum'];?></td>
                  <td><?= $resep['jumlah_obat'];?></td>
                  <td><?= $resep['satuan_obat'];?></td>
                </tr>
              <?php endforeach; ?>
			  </tbody>
		  </table>
		</div>
		<a href="<?= base_url('apoteker/resep_obat');?>" class="btn btn-secondary btn-icon-split mt-3">
          <span class="icon text-white-50">
            <i class="fas fa-arrow-left"></i>
          </span>
          <span class="text">Kembali</span>
      </a>
	</div>
</div>	
<!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="kelolaJadwal" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="judulModal">Tambah obat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action="" method="">
		<div class="form-group">
          <label for="status"><b>Nama Obat :</b></label>
          <select class="form-control" id="jenis periksa" name="jenis periksa">
            <option value="">Nama Obat</option>
          </select>
        </div>
        <div class="form-group">
          <b>Aturan Minum :</b>
          <input type="text" class="form-control form-control-user" id="umur" name="umur" placeholder="Tentukan Aturan Minum" >
        </div>
        <div class="form-group">
          <b>Jumlah Obat :</b>
          <input type="text" class="form-control form-control-user" id="nama_suami" name="nama_suami" placeholder="Tentukan Jumlah Obat" >
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Simpan Data</button>
       </form>
      </div>
    </div>
  </div>
</div>
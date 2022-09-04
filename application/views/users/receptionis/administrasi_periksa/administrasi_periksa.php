	<!-- Begin Page Content -->
	<div class="container-fluid">
	  <!-- Page Heading -->
	  <h1 class="h3 mb-4 text-gray-800"> <?= $title;?> </h1>
	</div>
	<!-- /.container-fluid -->
	<div class="container-fluid">

    <?php if( $this->session->flashdata('message') ) : ?>
      <div class="alert alert-success alert-dismissible fade show text-center" id="flash" role="alert">
        Data administrasi periksa<strong> berhasil </strong> <?= $this->session->flashdata('message');?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php endif; ?>

    <a href="<?= base_url('receptionis/tambah_administrasi')?>" class="btn btn-primary btn-icon-split">
        <span class="icon text-white-50">
           <i class="fas fa-keyboard"></i>
        </span>
        <span class="text">Tambah Adminitrasi Periksa</span>
    </a>

    <div class="card shadow mb-4 mt-3">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered  table-striped" id="dataTable" width="100%" cellspacing="0">
              <thead class="thead-dark text-center">
               <tr>
                  <th scope="col">No Kuitansi</th>
                  <th scope="col">Tanggal</th>
                  <th scope="col">Id Pasien</th>
                  <th scope="col">Nama Pasien</th>
                  <th scope="col">Nama Suami</th>
                  <th scope="col">Jenis Periksa</th>
                  <th scope="col">Harga</th>
                  <th scope="col">Aksi</th>
               </tr>
              </thead>
              <tbody>
                <?php foreach ($periksa as $per) : ?>
                <tr>
                  <th class="text-center"><?= $per['id_administrasi_periksa'];?>.</th>
                  <td><?= date('d-m-Y',strtotime($per['tanggal']));?></td>
                  <td><?= $per['id_users'];?></td>
                  <td><?= $per['nama_users'];?></td>
                  <td><?= $per['nama_suami'];?></td>
                  <td><?= $per['jenis_periksa'];?></td>
                  <td> Rp <?= number_format($per['harga'],0,',','.');?></td>
                  <td class="text-center" width="20%">
                    <a href="<?= base_url('receptionis/cetak_periksa/'.$per['id_administrasi_periksa']);?>" class="btn btn-secondary btn-icon-split" target="_blank">
                        <span class="icon text-white-50">
                          <i class="fas fa-print"></i>
                        </span>
                        <span class="text">Cetak</span>
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
<!-- End of Main Content -->
<script type="text/javascript">
  $(document).ready(function() {
    $('#dataTable').dataTable( 
    {
    "bSort" : false
    });  
  });
</script>
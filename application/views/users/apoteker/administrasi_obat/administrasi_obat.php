	<!-- Begin Page Content -->
	<div class="container-fluid">
	  <!-- Page Heading -->
	  <h1 class="h3 mb-4 text-gray-800"> <?= $title;?> </h1>
	</div>
	<!-- /.container-fluid -->
	<div class="container-fluid">

    <?php if( $this->session->flashdata('message') ) : ?>
      <div class="text-center" id="flash" role="alert">
        <?= $this->session->flashdata('message');?>
      </div>
    <?php endif; ?>

    <a href="<?= base_url('apoteker/tambah_administrasi')?>" class="btn btn-primary btn-icon-split">
        <span class="icon text-white-50">
           <i class="fas fa-keyboard"></i>
        </span>
        <span class="text">Tambah Adminitrasi Obat</span>
    </a>

    <div class="card shadow mb-4 mt-3">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered  table-striped" id="dataTable" width="100%" cellspacing="0">
              <thead class="thead-dark text-center">
               <tr>
                  <th scope="col">No Kuitansi</th>
                  <th scope="col">Tanggal</th>
                  <th scope="col">Kode Resep</th>
                  <th scope="col">Nama Pasien</th>
                  <th scope="col">Nama Suami</th>
                  <th scope="col">Alamat</th>
                  <th scope="col">Total Bayar</th>
                  <th scope="col">Aksi</th>
               </tr>
              </thead>
              <tbody>
               <?php foreach ($t_AdObat as $per) : ?>
                <tr>
                  <th class="text-center"><?= $per['id_administrasi_obat'];?>.</th>
                  <td><?= date('d-m-Y',strtotime($per['tanggal']));?></td>
                  <td><?= $per['kode_resep'];?></td>
                  <td><?= $per['nama_users'];?></td>
                  <td><?= $per['nama_suami'];?></td>
                  <td><?= $per['alamat'];?></td>
                  <td> Rp. <?= number_format($per['total_bayar'],0,',','.') ;?></td>
                  <td class="text-center" width="20%">
                    <a href="<?= base_url('apoteker/cetak_admObat/'.$per['kode_resep']);?>" class="btn btn-secondary btn-icon-split" target="_blank">
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
    <!-- Begin Page Content -->
    <div class="container-fluid">
      <!-- Page Heading -->
      <h1 class="h3 mb-4 text-gray-800"> <?= $title;?> </h1>
    </div>
    <!-- /.container-fluid -->
    <div class="container">
      <h1 class="h3 mb-1 text-gray-800">Penting!</h1>
          <p class="mb-4">Nomer urut pesan hari tidak sama dengan nomer urut antrian pasien, nomer urut pesan hari akan melanjutkan nomer urut antrian pasien.</p>
         

      <?php if( $this->session->flashdata('message') ) : ?>
        <div class="text-center" id="flash" role="alert">
          <?= $this->session->flashdata('message');?>
        </div>
      <?php endif; ?>

      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Tanggal yang tersedia untuk pesan hari</h6>
        </div>
        <div class="card-body">

          <table>
            <tr>
              <?php foreach ($t_TglAntrian as $pa) :?>
                <th>
                  <input type="text" hidden class="form-control" id="tanggal" name="tanggal" value="<?= $pa['tanggal'];?>" readonly="">
                  <a href="<?= base_url('Pasien/proses_pesan_hari/'.$pa['tanggal']);?>" class="btn btn-outline-primary pesan_hari"> <?= date('d-m-Y',strtotime($pa['tanggal']));?> </a>
                 
                </th>
              <?php endforeach; ?>
            </tr>
          </table>

        </div>
      </div>
    	<!-- Content Row -->

	    <div class="row">
	        <div class="col-lg-6">
	          <!-- Basic Card Example -->
	          <div class="card shadow mb-4">
	            <div class="card-header py-3">
	              <h6 class="m-0 font-weight-bold text-primary">Informasi pesan hari</h6>
	            </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-3">
                    <small class="text-muted"> No. Pesan Hari </small> </br>
                    <small class="text-muted"> Tanggal Dipesan </small> </br>
                    <small class="text-muted"> Nama Pasien </small> </br>
                    <small class="text-muted"> Nama Suami </small> </br>
                    <small class="text-muted"> Alamat </small> </br>
                  </div>

                 <?php foreach ($DetPesan as $det) : ?>
                    <div class="col-md-7">
                        <small class="text-muted"> : <?= $det['nomor_pesan'];?> </small> </br>
                        <small class="text-muted"> : <?= date('d-m-Y',strtotime($det['tanggal']));?> </small> </br>
                        <small class="text-muted"> : <?= $det['nama_users'];?> </small> </br>
                        <small class="text-muted"> : <?= $det['nama_suami'];?> </small> </br>
                        <small class="text-muted"> : <?= $det['alamat'];?> </small> </br>
                    </div>
                        <a href="<?= base_url('pasien/cetak_noPesan/'.$det['id_pesan_hari']);?>" class="btn btn-secondary btn-icon-split mt-3" target="_blank">
                            <span class="icon text-white-50">
                              <i class="fas fa-print"></i>
                            </span>
                            <span class="text">Cetak Nomor Pesan Hari</span>
                        </a>
                  <?php endforeach;?>
                </div>
              </div>
	          </div>
	        </div>
	    </div>
	</div>
</div>
<!-- End of Main Content -->

<!-- <script type="text/javascript">
  $(document).ready(function(){

    $(".pesan_hari").click(function(e){

      var id_users  = $("[name='id_users']").val();
      // var tanggal   = $("[name='tanggal']").val();

      $.ajax({
        types:"GET",
        url: "<?php echo base_url();?>"+"Pasien/proses_pesan_hari",
        dataType: 'json',
        data: {id_users:id_users},
        success: function(hasil){
         console.log(hasil);

        }
      });
    });
  });
</script> -->
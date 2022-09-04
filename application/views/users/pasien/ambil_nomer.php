      <!-- Begin Page Content -->
    <div class="container-fluid">
      <!-- Page Heading -->
      <h1 class="h3 mb-4 text-gray-800"> <?= $title;?> </h1>
    </div>
    <!-- /.container-fluid -->
    <div class="container">
      <?php if( $this->session->flashdata('message') ) : ?>
        <div class="text-center" id="flash" role="alert">
          <?= $this->session->flashdata('message');?>
        </div>
      <?php endif; ?>
    	<!-- Content Row -->
      <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-primary shadow h-100 py-2 border-bottom-primary">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah antrian yang tersedia</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $t_jumAntrian['kapasitas'];?></div>
                  <input type="text" hidden class="form-control" id="id_jadwal" name="id_jadwal" value="<?= $t_jumAntrian['id_jadwal'];?>" readonly="">
                  <input type="text" hidden class="form-control" id="id_users" name="id_users" value="<?= $users['id_users'];?>" readonly="">
                </div>
                <div class="col-auto">
                  <i class="fas fa-sort-numeric-down fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
       
        
            <?php if ($t_jumAntrian['kapasitas'] <= 0) : ?>
              <div class="col-xl-3 col-md-6 mb-4 mt-3 text-center">
                <a href="" class="btn btn-success btn-icon-split disabled">
                    <span class="icon text-white-50">
                     <i class="fas fa-list-ol"></i>
                    </span>
                    <span class="text">Ambil Nomor Antrian</span>
                </a>
              <div class="alert-danger mt-3"><strong>Mohon maaf</strong> nomor antrian sudah penuh! </div>
              </div>
              <?php else : ?>
              <div class="col-xl-3 col-md-6 mb-4 mt-3 text-center">
                <a href="<?= base_url('Pasien/proses_ambil_nomor/'.$users['id_users']);?>" class="btn btn-success btn-icon-split ambil_nomor" onclick="" >
                    <span class="icon text-white-50">
                     <i class="fas fa-list-ol"></i>
                    </span>
                    <span class="text">Ambil Nomor Antrian</span>
                </a>
              </div>
            <?php endif; ?>
          
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
	              <h6 class="m-0 font-weight-bold text-primary">Informasi Nomor Antrian</h6>
	            </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-3">
                    <small class="text-muted"> No. Antrian </small> </br>
                    <small class="text-muted"> Nama Pasien </small> </br>
                    <small class="text-muted"> Nama Suami </small> </br>
                    <small class="text-muted"> Alamat </small> </br>
                  </div>

                  <?php foreach ($DetAntrian as $det) : ?>
                    <div class="col-md-7">
                        <small class="text-muted"> : <?= $det['nomor_antrian'];?> </small> </br>
                        <small class="text-muted"> : <?= $det['nama_users'];?> </small> </br>
                        <small class="text-muted"> : <?= $det['nama_suami'];?> </small> </br>
                        <small class="text-muted"> : <?= $det['alamat'];?> </small> </br>
                    </div>
                        <a href="<?= base_url('pasien/cetak_noAntrian/'.$det['id_antrian']);?>" class="btn btn-secondary btn-icon-split mt-3" target="_blank">
                            <span class="icon text-white-50">
                              <i class="fas fa-print"></i>
                            </span>
                            <span class="text">Cetak Nomor Antrian</span>
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

<script type="text/javascript">
  $(document).ready(function(){

    $(".ambil_nomor").click(function(e){

      var id_jadwal  = $("[name='id_jadwal']").val();
      var id_users   = $("[name='id_users']").val();

      $.ajax({
        types:"GET",
        url: "<?php echo base_url();?>"+"Pasien/kurangi_nomor",
        dataType: 'json',
        data: {id_jadwal:id_jadwal, id_users:id_users},
        success: function(hasil){
         console.log(hasil);

        }
      });
    });
  });
</script>
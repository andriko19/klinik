  <!-- Begin Page Content -->
	<div class="container-fluid">
	  <!-- Page Heading -->
	  <h1 class="h3 mb-4 text-gray-800"> <?= $title;?></h1>
	</div>
	<!-- /.container-fluid -->
	<div class="container-fluid">
    <?php if( $this->session->flashdata('message') ) : ?>
      <div class="text-center" id="flash" role="alert">
        <?= $this->session->flashdata('message');?>
      </div>
    <?php endif; ?>

    <div class="container-fluid">
      <div class="">
        <div class="card shadow mb-4">
          <div class="">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tambah Administrasi Obat</h6>
            </div>
            <div class="card-body">
            
              <div class="row">
                <!-- Basic Card Example -->
                <div class="col-lg-6 ">
                  <div class="card shadow mb-4">
                    <div class="card-body">
          <form action="" method="post" id="form" >
                        <div class="form-group">
                          <label for="tanggal">Tanggal</label>
                          <input type="date" class="form-control" id="tanggal" name="tanggal" value="" placeholder="" autofocus=""> 
                          <small class="form-text text-danger"> <?= form_error('tanggal')?></small>
                        </div>
                        <div class="form-group">
                          <label for="kode_resep">No.Resep</label>
                          <input type="text" class="form-control" id="kod_resep" name="kod_resep" placeholder="Masukan No resep. . .">
                          <small class="form-text text-danger"> <?= form_error('kod_resep')?></small>
                        </div>
                        <div class="form-group">
                          <label for="id_users">No Induk Pasien</label>
                          <input type="text" class="form-control" id="id_users" name="id_users" value="" readonly=""> 
                          <small class="form-text text-danger"> <?= form_error('id_users')?></small>
                        </div>
                        <!-- <div class="form-group">
                          <label for="nama_suami">Nama Suami</label>
                          <input type="text" class="form-control" id="nama_suami" name="nama_suami" value="" readonly="">
                          <small class="form-text text-danger"> <?= form_error('nama_suami')?></small>
                        </div>
                        <div class="form-group">
                          <label for="alamat">Alamat</label>
                          <input type="text" class="form-control" id="alamat" name="alamat" value="" readonly=""> 
                          <small class="form-text text-danger"> <?= form_error('alamat')?></small>
                        </div> -->
                        <div class="float-right">
                          <button  class="btn btn-primary btn-icon-split"  name="add" id="add" value="Add" />
                            <a>
                              <span class="icon text-white-50">
                               <i class="fas fa-prescription-bottle-alt"></i>
                              </span>
                              <span class="text">Tampilkan Obat</span>
                            </a>
                          </button>
                        </div>
                      
                    </div>
                  </div>
                </div>
            
                <div class="col-lg-6">
                  <div class="card shadow mb-4">
                    <div class="card-body">
                      <div class="row">
                       <!-- Earnings (Monthly) Card Example -->
                        <div class="row mt-3">
                          <!-- Border Left Utilities -->
                          <div class="col-lg-6">
                          </div>
                          <!-- Border Bottom Utilities -->
                          <div class="col-lg-12">
                            <div class="card mb-4 py-2 border-bottom-primary">
                              
                                <div class="card mb-2 py-2 container-fluid" style="width: 25rem;">
                                  <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                       <div class="form-group">
                                          <label for="total_bayar"><b>Total Bayar :</b></label>
                                          <input type="text" class="form-control" id="total_bayar" name="total_bayar" value="" readonly=""> 
                                          <small class="form-text text-danger"> <?= form_error('total_bayar')?></small>
                                        </div>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                      <div class="form-group">
                                          <label for="jumlah_uang"><b>Jumlah Uang :</b></label>
                                          <input type="text" class="form-control" id="jumlah_uang" name="jumlah_uang" value=""> 
                                          <small class="form-text text-danger"> <?= form_error('jumlah_uang')?></small>
                                        </div>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                      <div class="form-group">
                                          <label for="kembalian"><b>Kembalian :</b></label>
                                          <input type="text" class="form-control" id="kembalian" name="kembalian" value=""> 
                                          <small class="form-text text-danger"> <?= form_error('kembalian')?></small>
                                        </div>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                      <a href="<?= base_url('apoteker/administrasi_obat');?>" class="btn btn-secondary btn-icon-split">
                                          <span class="icon text-white-50">
                                            <i class="fas fa-arrow-left"></i>
                                          </span>
                                          <span class="text">Kembali</span>
                                      </a>
                                     <button type="submit" name="tambah" class="btn btn-primary btn-icon-split">
                                          <span class="icon text-white-50">
                                           <i class="fas fa-save"></i>
                                          </span>
                                          <span class="text">Simpan</span>
                                      </button>
                                    </li>
                                  </ul>
                                </div>
          </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="card shadow mb-4">
                <div class="">
                  <div class="card-body wadah">
                     <table class="table table-bordered table-striped dataTable" id="dynamic">
                      <thead class="thead-dark text-center">
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">No.Resep</th>
                          <th scope="col">Nama Obat</th>
                          <th scope="col">Jumlah Obat</th>
                          <th scope="col">Harga Satuan</th>
                          <th scope="col">Total Harga</th>
                        </tr>
                      </thead id="table_data">
                      <tbody id="dataresep">
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

            </div>
          </div>             
        </div>
      </div>
    </div>
	</div>
</div>	
<!-- End of Main Content -->


<script type="text/javascript">
  $('#add').on('click', function(){
    event.preventDefault();
      var kod = $("input[name='kod_resep']").val();
           $.ajax({
              types:"POST",
              url: "<?php echo base_url(); ?>" + "apoteker/tambah_administrasi1" ,
              data:  { kod_resep : kod},
              dataType: "json",
              success: function(data) {
              console.log(data)
               var html = '';
                    var i;
                    var no;
                    var total_harga;
                    var total_bayar = 0;
                    var kembalian= 0;
                    for(i=0; i<data.length; i++){
                      no=i+1;
                      total_harga= data[i].jumlah_obat*data[i].harga_satuan;
                      total_bayar += total_harga;
                        html += '<tr>'+
                                '<td>'+no+'</td>'+                        
                                '<td>'+data[i].kode_resep+'</td>'+
                                '<td>'+data[i].nama_obat+'</td>'+
                                '<td>'+data[i].jumlah_obat+'</td>'+
                                '<td>'+data[i].harga_satuan+'</td>'+
                                '<td>'+total_harga+'</td>'+
                                '</tr>';
                    }

                    $("#total_bayar").val(total_bayar);
                    $('#dataresep').html(html);
              },
         error: function(jqXHR, textStatus, errorThrown) {
           alert('Error get data from ajax');
         }
       });
      });


  $('#jumlah_uang').on('keyup', function(){
      var jumlah_uang = $("input[name='jumlah_uang']").val();

      var total_bayar = $("input[name='total_bayar']").val();
      var kembalian  = 0;
      kembalian= jumlah_uang -   total_bayar;
          $("#kembalian").val(kembalian);
      });
  
  

  $(document).ready(function(){
      // autocomplete kode resep
      $("#kod_resep").autocomplete({
        source: "<?= base_url('Apoteker/get_KodeResep');?>",

        select:function(event, ui){
          $('[name="kod_resep"]').val(ui.item.label);
          $('[name="id_users"]').val(ui.item.id_users);
          // $('[name="nama_suami"]').val(ui.item.nama_suami);
          // $('[name="alamat"]').val(ui.item.alamat);
        } 
      // end autocomplete kode resep
      });
    });
</script>

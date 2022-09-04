  <!-- Begin Page Content -->
  <div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"> <?= $title;?> </h1>
  </div>
  <!-- /.container-fluid -->
  <div class="container-fluid">

    <form action="" id="FormLaporanObt">
      <label>  Masukan Tanggal : 
      <input type="date" class="form-control" id="tanggall" name="tanggall" placeholder="" value=""> </label> 
      <button type="submit" name="tambah" class="btn btn-primary btn-icon-split">
        <span class="icon text-white-50">
            <i class="fas fa-paper-plane"></i>
          </span>
          <span class="text">Tampilkan Data</span>
      </button>
    </form>
    <button type="submit" name="periode" id="periode" class="btn btn-primary btn-icon-split">
      <span class="icon text-white-50">
        <i class="fas fa-print"></i>
      </span>
      <span class="text">Cetak Periode</span>
    </button> 

    <div class="mt-3" id="DetLaporanObt">
          
    </div>
  </div>
</div>
<!-- End of Main Content -->
<script type="text/javascript">
  $(document).ready(function() {
    $("#FormLaporanObt").submit(function(e){
      e.preventDefault();
      var tgll = $("#tanggall").val();
      console.log(tgll);
      var url = "<?= site_url('Pemilik/DetLaporanObt/')?>" + tgll
      $("#DetLaporanObt").load(url);
    })  
  });
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $("#periode").click(function(e){
      e.preventDefault();
      var url = "<?= site_url('Pemilik/Periode_Obat')?>"
      $("#DetLaporanObt").load(url);
    })  
  });
</script>
  <!-- Begin Page Content -->
	<div class="container-fluid">
	  <!-- Page Heading -->
	  <h1 class="h3 mb-4 text-gray-800"> <?= $title;?> -> <small>Buat rekam medis Baru</small></h1>
	</div>
	<!-- /.container-fluid -->
	<div class="container">

    <div class="container">
        <div class="col-lg-6">
          <!-- Basic Card Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Buat rekam medis Baru</h6>
            </div>
            <div class="card-body">
              <form action="" method="post">
                <div class="form-group">
                  <label for="id_users">Id Pasien</label>
                  <input type="text" class="form-control" id="id_users" name="id_users" value="<?= $id_users;?>" readonly=""> 
                  <!-- <small class="form-text text-danger"> <?= form_error('id_users')?></small> -->
                </div>
                <div class="form-group">
                  <label for="hpht">HPHT</label>
                  <input type="date" class="form-control" id="hpht" name="hpht" value="<?= set_value('hpht');?>"> 
                  <!-- <small class="form-text text-danger"> <?= form_error('hpht')?></small> -->
                </div>
                <div class="form-group">
                  <label for="htp">HTP</label>
                  <input type="date" class="form-control" id="htp" name="htp" value="<?= set_value('htp');?>"> 
                  <!-- <small class="form-text text-danger"> <?= form_error('htp')?></small> -->
                </div>
                <div class="form-group">
                  <label for="hamil_ke">Hamil Ke-</label>
                  <input type="text" class="form-control" id="hamil_ke" name="hamil_ke" value="<?= set_value('hamil_ke');?>"> 
                 <!--  <small class="form-text text-danger"> <?= form_error('hamil_ke')?></small> -->
                </div>
                <div class="form-group">
                  <label for="jumlah_persalinan">Jumlah Persalinan</label>
                  <input type="text" class="form-control" id="jumlah_persalinan" name="jumlah_persalinan" value="<?= set_value('jumlah_persalinan');?>"> 
                 <!--  <small class="form-text text-danger"> <?= form_error('jumlah_persalinan')?></small> -->
                </div>
                <div class="form-group">
                  <label for="jumlah_keguguran">Jumlah Keguguran</label>
                  <input type="text" class="form-control" id="jumlah_keguguran" name="jumlah_keguguran" value="<?= set_value('jumlah_keguguran');?>">
                  <!-- <small class="form-text text-danger"> <?= form_error('jumlah_keguguran')?></small> -->
                </div>
                <div class="form-group">
                  <label for="jumlah_anak_hidup">Jumlah Anak Hidup</label>
                  <input type="text" class="form-control" id="jumlah_anak_hidup" name="jumlah_anak_hidup" value="<?= set_value('jumlah_anak_hidup');?>">
                  <!-- <small class="form-text text-danger"> <?= form_error('jumlah_anak_hidup')?></small> -->
                </div>
                 <div class="form-group">
                  <label for="jumlah_anak_mati">Jumlah Anak Mati</label>
                  <input type="text" class="form-control" id="jumlah_anak_mati" name="jumlah_anak_mati" value="<?= set_value('jumlah_anak_mati');?>">
                  <!-- <small class="form-text text-danger"> <?= form_error('jumlah_anak_mati')?></small> -->
                </div>
                 <div class="form-group">
                  <label for="cara_persalinan_terakhir">Cara Persalinan Terakhir</label>
                  <input type="text" class="form-control" id="cara_persalinan_terakhir" name="cara_persalinan_terakhir" value="<?= set_value('cara_persalinan_terakhir');?>">
                  <!-- <small class="form-text text-danger"> <?= form_error('cara_persalinan_terakhir')?></small> -->
                </div>
                 <div class="form-group">
                  <label for="riwayat_penyakit_ibu">Riwayat Penyakit Ibu</label>
                  <input type="text" class="form-control" id="riwayat_penyakit_ibu" name="riwayat_penyakit_ibu" value="<?= set_value('riwayat_penyakit_ibu');?>">
                  <!-- <small class="form-text text-danger"> <?= form_error('riwayat_penyakit_ibu')?></small> -->
                </div>
                <div class="float-right">
                  <button type="submit" name="ubah" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-paper-plane"></i>
                    </span>
                    <span class="text">Simpan Rekam Medis</span>
                  </button>
                </div>
              </form>
            </div>
          </div>
      </div>
    </div>
	</div>
</div>	
<!-- End of Main Content -->

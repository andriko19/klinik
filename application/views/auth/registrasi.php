

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-lg-7">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg">
                <div class="p-5">
                  <div class="text-center">
                    <h2 class="h4 text-gray-900 mb-4"> <b>Klinik Kandungan dr.Iman, Sp.OG </b></h2>
                    <h1 class="h4 text-gray-900 mb-4">Registrasi Pasien Baru</h1>
                  </div>
                  <form class="" method="post" action="<?= base_url ('Auth/registrasi');?>">
                    <div class="form-group">
                      <b>Nama Pasien :</b>
                      <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Isi Nama Lengkap" value="<?= set_value('nama');?>"><?= form_error('nama', '<small class="text-danger ">', '</small>');?>
                    </div>
                    <div class="form-group">
                      <b>Tanggal Lahir :</b>
                      <input type="date" class="form-control form-control-user" id="tanggal_lahir" name="tanggal_lahir" placeholder="Tanggal Lahir" value="<?= set_value('tanggal_lahir');?>"> <?= form_error('tanggal_lahir', '<small class="text-danger ">', '</small>');?>
                    </div>
                    <div class="form-group">
                      <b>Umur Pasien :</b>
                      <input type="text" class="form-control form-control-user" id="umur" name="umur" placeholder="Umur Pasien" value="<?= set_value('umur');?>"> <?= form_error('umur', '<small class="text-danger ">', '</small>');?>
                    </div>
                    <div class="form-group">
                      <b>Nama Suami :</b>
                      <input type="text" class="form-control form-control-user" id="nama_suami" name="nama_suami" placeholder="Nama Suami Pasien" value="<?= set_value('nama_suami');?>"> <?= form_error('nama_suami', '<small class="text-danger ">', '</small>');?>
                    </div>
                    <div class="form-group">
                      <b>Alamat Pasien :</b>
                      <input type="text" class="form-control form-control-user" id="alamat" name="alamat" placeholder="Alamat Tempat Tinggal Pasien" value="<?= set_value('alamat');?>"> <?= form_error('alamat', '<small class="text-danger ">', '</small>');?>
                    </div>
                    <div class="form-group">
                      <b>Nomer Telepon Pasien :</b>
                      <input type="number" class="form-control form-control-user" id="telepon" name="telepon" placeholder="Nomer Telepon Yang Bisa Dihubungi" value="<?= set_value('telepon');?>"> <?= form_error('telepon', '<small class="text-danger ">', '</small>');?>
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Username" value="<?= set_value('username');?>"> <?= form_error('username', '<small class="text-danger ">', '</small>');?>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password"> <?= form_error('password1', '<small class="text-danger ">', '</small>');?>
                      </div>
                      <div class="col-sm-6">
                        <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Ulangi Password">
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      Registrasi
                    </button>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="<?= base_url('auth');?>">Kemabai ke menu Login!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

 
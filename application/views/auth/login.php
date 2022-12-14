

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
                     <div class="row">
                          <div class="col-md-12 center login-header">
                              <h2><img src="<?php echo base_url();?>assets/img/My_profile/klinik1.png" style="width:30%"></h2>            
                          </div>
                          <br>
                          <!--/span-->
                      </div><!--/row-->
                    <h2 class="h4 text-gray-900 mb-4"> <b>Klinik Kandungan dr.Iman, Sp.OG </b></h2>
                    
                     <div class="text-center" id="flash" role="alert">
                       <?= $this->session->flashdata('message');?>
                     </div>
                    
                    <h1 class="h4 text-gray-900 mb-4">Silahkan Login</h1>
                  </div>
                  <form class="" method="post" action="<?= base_url ('Auth');?>">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Username" value="<?= set_value('username');?>"> <?= form_error('username', '<small class="text-danger ">', '</small>');?>
                    </div>
                    <div class="form-group">
                      <input type="Password" class="form-control form-control-user" id="password" name="password" placeholder="Password"> <?= form_error('password', '<small class="text-danger ">', '</small>');?>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      Login
                    </button>
                   </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="<?= base_url('auth/registrasi');?>">Registrasi Pasien Baru!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

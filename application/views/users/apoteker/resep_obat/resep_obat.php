  <!-- Begin Page Content -->
  <div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"> <?= $title;?> </h1>
  </div>
  <!-- /.container-fluid -->
  <div class="container-fluid">

    <div class="card shadow mb-4 mt-3">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered  table-striped" id="dataTable" width="100%" cellspacing="0">
              <thead class="thead-dark text-center">
               <tr>
                  <th scope="col">No.Resep</th>
                  <th scope="col">Tanggal</th>
                  <th scope="col">Id Pasien</th>
                  <th scope="col">Nama Pasien</th>
                  <th scope="col">Nama Suami</th>
                  <th scope="col">Alamat</th>
                  <th scope="col">Aksi</th>
               </tr>
              </thead>
              <tbody>
                <?php foreach ($t_resep as $resep) :?>
                <tr>
                  <th><?= $resep['kode_resep'];?></th>
                  <td><?= date('d-m-Y',strtotime($resep['tanggal'])); ?></td>
                  <td><?= $resep['id_users'];?></td>
                  <td><?= $resep['nama_users'];?></td>
                  <td><?= $resep['nama_suami'];?></td>
                  <td><?= $resep['alamat'];?></td>
                  <td class="text-center" width="20%">
                    <a href="<?= base_url('apoteker/tampil_detail_resep/'. $resep['kode_resep']);?>" class="btn btn-primary btn-icon-split">
                        <span class="icon text-white-50">
                          <i class="fas fa-prescription-bottle-alt"></i>
                        </span>
                        <span class="text">Detail Resep Obat</span>
                    </a>
                  </td>
                </tr>
              <?php endforeach; ?>
              </tbody>
            </table>

            <!-- <table>
              <thead class="thead-dark text-center">
               <tr>
                  <th scope="col">No.Resep</th>
                  <th scope="col">Tanggal</th>
                  <th scope="col">Id Pasien</th>
                  <th scope="col">Nama Pasien</th>
                  <th scope="col">Nama Suami</th>
                  <th scope="col">Alamat</th>
                  <th scope="col">Aksi</th>
               </tr>
              </thead>
              <tbody>
                <?php foreach ($t_resep as $resep) :?>
                <tr>
                  <th><?= $resep['kode_resep'];?></th>
                  <td><?= date('d-m-Y',strtotime($resep['tanggal'])); ?></td>
                  <td><?= $resep['id_users'];?></td>
                  <td><?= $resep['nama_users'];?></td>
                  <td><?= $resep['nama_suami'];?></td>
                  <td><?= $resep['alamat'];?></td>
                  <td class="text-center" width="20%">
                    <a href="<?= base_url('apoteker/tampil_detail_resep/'. $resep['kode_resep']);?>" class="btn btn-primary btn-icon-split">
                        <span class="icon text-white-50">
                          <i class="fas fa-prescription-bottle-alt"></i>
                        </span>
                        <span class="text">Detail Resep Obat</span>
                    </a>
                  </td>
                </tr>
              <?php endforeach; ?>
              </tbody>
            </table> -->
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
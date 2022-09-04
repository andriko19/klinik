<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cetak PDF</title>
	<script src="<?= base_url('assets/');?>vendor/jquery/jquery.min.js"></script>
  	<script src="<?= base_url('assets/');?>vendor/jquery/jquery-ui.js"></script>
  	<script src="<?= base_url('assets/');?>vendor/jquery/jquery-ui.min.js"></script>

	<style type="text/css" media="print">
		body{
			font-family: Courier New;
			font-size: 12px;
		}
		h1{
			text-align: center;
			font-size: 18px;
		}
		h3{
			text-align: center;
			font-size: 12px;
		}
		p{
			text-align: center;
			font-size: 10px;
		}
		.td{
			text-align: right;
		}

	</style>
</head>
<body>
	<div>
		<div>
			<h1>Klinik Kandungan dr.Iman,Sp.OG</h1>
			<p>Jl. Kendung No.61, Kelurahan Sememi, Kecamatan Benowo, Kota Surabaya.</p>
			<hr>
			<h3>Laporan Keuangan Periksa</h3>
		</div>
		<div>
			<table border="" width="10%" height="50">
				<tr>
					<td><small> Tanggal </small></td>
					<td><small> :&ensp;<?= date('d-m-Y',strtotime($tgl1));?></small></td>
					<td><small> Sampai</small></td>
					<td><small> <?= date('d-m-Y',strtotime($tgl2));?></small></td>
				</tr>
				<tr>
				</tr>
			</table>
		</div>
		<br>
		<div>
			<table border="1" width="100%">
				<thead>
		            <tr>
		              <th scope="col">No</th>
		              <th scope="col">Tanggal</th>
		              <th scope="col">Kode Resep</th>
		              <th scope="col">Nama Pasien</th>
		              <th scope="col">Nama Suami</th>
		              <th scope="col">Alamat</th>
		              <th scope="col">Harga</th>
		            </tr>
		          </thead>
		          <tbody>
		            <?php $no=0; foreach ($periode as $per) : ?>
			            <tr>
			              <th class="text-center"><?= ++$no;?>.</th>
			              <td><?= date('d-m-Y',strtotime($per['tanggal']));?></td>
			              <td><?= $per['kode_resep'];?></td>
			              <td><?= $per['nama_users'];?></td>
			              <td><?= $per['nama_suami'];?></td>
			              <td><?= $per['alamat'];?></td>
			              <td> Rp <?= number_format($per['total_bayar'],0,',','.');?></td> 
			            </tr>
		            <?php endforeach; ?>
		          </tbody>
			</table>
		</div> 
	</div>
</body>

</html>
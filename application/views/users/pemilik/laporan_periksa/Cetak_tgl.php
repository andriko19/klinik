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
					<td><small> :&ensp;<?= date('d-m-Y',strtotime($tgl));?></small></td>
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
		              <th>No</th>
		              <th>Tanggal</th>
		              <th>Id Pasien</th>
		              <th>Nama Pasien</th>
		              <th>Jenis Periksa</th>
		              <th>Harga</th>
		            </tr>
		          </thead>
		          <tbody>
		            <?php $no=0; foreach ($DetLaporan as $per) : ?>
			            <tr>
			              <th><?= ++$no;?>.</th>
			              <td><?= date('d-m-Y',strtotime($per['tanggal']));?></td>
			              <td><?= $per['id_users'];?></td>
			              <td><?= $per['nama_users'];?></td>
			              <td><?= $per['jenis_periksa'];?></td>
			              <td> Rp <?= number_format($per['harga'],0,',','.');?></td> 
			            </tr>
		            <?php endforeach; ?>
		          </tbody>
			</table>
		</div> 
	</div>
</body>

</html>
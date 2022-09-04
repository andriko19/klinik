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
			<table>
				<tr>
					<td>
					<img src="<?= base_url('assets/img/My_profile/klinik1.png');?>" class="card-img" alt="My Profile" style="height: 90px;">
					</td>
					<td>
						<h1>Klinik Kandungan dr.Iman,Sp.OG</h1>
						<p>Jl. Kendung No.61, Kelurahan Sememi, Kecamatan Benowo, Kota Surabaya.</p>
					</td>
				</tr>
			</table>
			<hr>
			<h3>Kwitansi Pembayaran Obat</h3>
		</div>
		<div>
			<table border="" width="100%" height="50">
				<tr>
					<td><small> No.Kwintansi </small></td>
					<td><small> :&ensp;<?= $cetak['id_administrasi_obat'];?> 	</small></td>
					<td><small> Kode Resep </small></td>
					<td><small> :&ensp;<?= $cetak['kode_resep'];?> </small></td>
				</tr>
				<tr>
					<td><small> Tanggal </small></td>
					<td><small> :&ensp;<?= date('d-m-Y',strtotime($cetak['tanggal']));?> </small></td>
					<td><small> Nama Pasien </small></td>
					<td><small> :&ensp;<?= $cetak['nama_users'];?> </small></td>
				</tr>
			</table>
		</div>
		<br>
		<div>
			<table border="1" width="100%">
				<thead>
					<tr bgcolor="#dfe6e9">
						<th>No.</th>
						<th>Nama Obat</th>
						<th>Aturan Minum</th>
						<th>Jumlah</th>
						<th>Harga Satuan</th>
						<th>Harga</th>
					</tr>
				</thead>
				<tbody>
					<?php $no=0; foreach ($detObat as $cet) : ?>
						<tr>
							<?php
								$i=0;
								$jumlah_obat[$i] = $cet['jumlah_obat'];
								$harga_satuan[$i]= $cet['harga_satuan'];
								$total_harga[$i] = $jumlah_obat[$i]*$harga_satuan[$i];
							?>
							<th><?= ++$no;?>.</th>
							<td><?= $cet['nama_obat'];?></td>
							<td><?= $cet['aturan_minum'];?> Sehari</td>
							<td><?= $cet['jumlah_obat'];?></td>
							<td> Rp <?= number_format($cet['harga_satuan'],0,',','.') ;?></td>
							<td> Rp <?= number_format($total_harga[$i],0,',','.') ;?></td>
						</tr>
					<?php endforeach;?>
					<tr>
						<td colspan="4	"></td>
						<td class="td"> Total Bayar </td>
						<td> Rp <?= number_format($cetak['total_bayar'],0,',','.') ;?></td>
					</tr>
				</tbody>
			</table>
		</div> 
		<br><br>
		<p>Terimakasih atas kunjungan dan kepercayaan anda kepada kami</p>
		<p>kami melayani konsultasi dan pemeriksaan kesehatan kandungan</p>
		<p>Kunjungi website resmi kami di : <u> http://localhost/klinik </u></p>
	</div>
</body>

</html>
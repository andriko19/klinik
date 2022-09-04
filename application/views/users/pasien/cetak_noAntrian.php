<?php var_dump($cetak_no);?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cetak No Antrian</title>
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
			<h3>Nomor Antrian Pasien</h3>
		</div>
		<table>
			
			<tr>
				<td>Tanggal</td>
				<td>:&ensp;<?= date('d-m-Y',strtotime($cetak_no['tanggal']));?></td>
			</tr>
			<tr>
				<td>No.Antrian</td>
				<td>:&ensp;<?= $cetak_no['nomor_antrian'];?></td>
			</tr>
			<tr>
				<td>Nama Pasien</td>
				<td>:&ensp;<?= $cetak_no['nama_users'];?></td>
			</tr>
			<tr>
				<td>Nama Suami</td>
				<td>:&ensp;<?= $cetak_no['nama_suami'];?></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td>:&ensp;<?= $cetak_no['alamat'];?></td>
			</tr>
		</table> 
		<br><br>
		<p>Simpan nomor antrian ini sebagai bukti bahwa anda sudah terdaftar</p>
		<p>kami melayani konsultasi dan pemeriksaan kesehatan kandungan</p>
		<p>Kunjungi website resmi kami di : <u> http://localhost/klinik </u></p>
	</div>
</body>

</html>
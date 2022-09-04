<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cetak PDF</title>
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
			<h3>Kwitansi Pembayaran Periksa</h3>
		</div>
		<table>
			
			<tr>
				<td>No.Kwintansi</td>
				<td>:&ensp;<?= $cetak['id_administrasi_periksa'];?></td>
			</tr>
			<tr>
				<td>Tanggal</td>
				<td>:&ensp;<?= date('d-m-Y',strtotime($cetak['tanggal']));?></td>
			</tr>
			<tr>
				<td>Id_Pasien</td>
				<td>:&ensp;<?= $cetak['id_users'];?></td>
			</tr>
			<tr>
				<td>Nama_Pasien</td>
				<td>:&ensp;<?= $cetak['nama_users'];?></td>
			</tr>
			<tr>
				<td>Nama_Suami</td>
				<td>:&ensp;<?= $cetak['nama_suami'];?></td>
			</tr>
			<tr>
				<td>Jenis_Periksa</td>
				<td>:&ensp;<?= $cetak['jenis_periksa'];?></td>
			</tr>
			<tr>
				<td>Harga</td>
				<td>:&ensp;Rp <?=  number_format($cetak['harga'],0,',','.');?>,.</td>
			</tr>
			<tr>
				<td></td>
				<td>------------------(*)</td>
			</tr>
			<tr>
				<td>Total_Bayar</td>
				<td>:&ensp;Rp <?=  number_format($cetak['harga'],0,',','.');?>,.</td>
			</tr>
		</table> 
		<br><br>
		<p>Terimakasih atas kunjungan dan kepercayaan anda kepada kami</p>
		<p>kami melayani konsultasi dan pemeriksaan kesehatan kandungan</p>
		<p>Kunjungi website resmi kami di : <u> http://localhost/klinik </u></p>
	</div>
</body>

</html>
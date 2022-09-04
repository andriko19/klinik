<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pasien extends CI_Model{

	public function tampilJumAntrian(){

		$this->db->select('*');
		$this->db->from('tb_jadwal_klinik');
		$this->db->order_by('id_jadwal','desc');
		$get_jadwal = $this->db->get();
		return $get_jadwal->row_array();
	}

	public function tampilTglAntrian(){

		return $this->db->get('tb_jadwal_pesan_hari')->result_array();
	}

	public function tampilInformasi(){

		return $this->db->get('tb_info_berita')->result_array();
	}

	public function getId(){

		return $this->db->get('tb_users')->result_array();
	}

	public function cek(){

	 	return $this->db->count_all_results('tb_antrian');
	}

	public function cekPesan($tanggal){

		$this->db->from('tb_pesan_hari'); 
		$this->db->where('tanggal', $tanggal); 
		return $this->db->count_all_results();
	}

	public function TampilTotNo($tanggal){

		$this->db->select('kapasitas');
		$this->db->from('tb_jadwal_pesan_hari');
		$this->db->where('tanggal',$tanggal);
		$get_jadwal = $this->db->get();
		return $get_jadwal->row_array();
	}

	public function getJumlahNomor($id_jadwal){

		$this->db->select('kapasitas');
		$this->db->from('tb_jadwal_klinik');
		$this->db->where('id_jadwal', $id_jadwal);
		$get_jumlah_nomor = $this->db->get();
		return $get_jumlah_nomor->row();
	}

	public function kurangiNomor($id_jadwal, $no){

		$data = [
			'kapasitas'     => $no
		];

		$this->db->where('id_jadwal', $id_jadwal);
		$this->db->update('tb_jadwal_klinik',$data);		
	}

	public function cekAntrianTerakhir($tgl){

		$this->db->select_max('nomor_antrian', 'antrian_terakhir');
		$this->db->from('tb_antrian');
		$this->db->where('tanggal', $tgl);
		$this->db->order_by(`nomor_antrian`,'asc');
		$get_antrian_terakhir = $this->db->get();
		return $get_antrian_terakhir->row();
	}

	public function cekDaftarAntri($id_users){

		$this->db->select('id_users');
		$this->db->from('tb_antrian');
		$this->db->where('id_users', $id_users);
		$antri = $this->db->get();
		return $antri->num_rows();
	}

	public function cekDaftarAntri1($id_users){

		$this->db->select('id_users');
		$this->db->from('tb_antrian');
		$this->db->where('id_users', $id_users);
		$antri = $this->db->get();
		return $antri->row_array();
	}

	public function simpanAntrian($no, $id_users, $tgl){

		$data = [
			'nomor_antrian'=> +$no,
			'id_users'     => $id_users,
			'tanggal'      => $tgl
		];
	
		$this->db->insert('tb_antrian',$data);
	}

	public function tampilDetAntri($id_users){

		$queryDetAntri = "SELECT *
	                        FROM `tb_users` JOIN `tb_antrian` 
	                          ON `tb_users`.`id_users` = `tb_antrian`.`id_users`
	                       WHERE `tb_antrian`.`id_users` = $id_users
	                    ORDER BY `tb_antrian`.`nomor_antrian` ASC
	                  ";
      	return $this->db->query($queryDetAntri)->result_array();
	}

	public function ambilNoAntrian($id_antrian){

		$queryAntri = "SELECT *
                        FROM `tb_users` JOIN `tb_antrian` 
                          ON `tb_users`.`id_users` = `tb_antrian`.`id_users`
                       WHERE `tb_antrian`.`id_antrian` = $id_antrian
                  ";
      	return $this->db->query($queryAntri)->row_array();
	}

	public function cekPesanTerakhir($tgl){

		$this->db->select_max('nomor_pesan', 'no_terakhir');
		$this->db->from('tb_pesan_hari');
		$this->db->where('tanggal', $tgl);
		$this->db->order_by(`nomor_antrian`,'asc');
		$get_pesan_terakhir = $this->db->get();
		return $get_pesan_terakhir->row();
	}

	public function simpanPesanHari($no, $id_users, $tanggal){

		$data = [
			'nomor_pesan'  => +$no,
			'id_users'     => $id_users,
			'tanggal'      => $tanggal
		];
	
		$this->db->insert('tb_pesan_hari',$data);
	}

	public function cekDaftarPesan($id_users){

		$this->db->select('id_users');
		$this->db->from('tb_pesan_hari');
		$this->db->where('id_users', $id_users);
		$antri = $this->db->get();
		return $antri->num_rows();
	}

	public function tampilDetPesan($id_users){

		$queryDetPesan = "SELECT *
	                        FROM `tb_users` JOIN `tb_pesan_hari` 
	                          ON `tb_users`.`id_users` = `tb_pesan_hari`.`id_users`
	                       WHERE `tb_pesan_hari`.`id_users` = $id_users
	                    ORDER BY `tb_pesan_hari`.`nomor_pesan` ASC
	                  ";
      	return $this->db->query($queryDetPesan)->result_array();
	}

	public function ambilNoPesan($id_pesan_hari){

		$queryPesan = "SELECT *
                        FROM `tb_users` JOIN `tb_pesan_hari` 
                          ON `tb_users`.`id_users` = `tb_pesan_hari`.`id_users`
                       WHERE `tb_pesan_hari`.`id_pesan_hari` = $id_pesan_hari
                  ";
      	return $this->db->query($queryPesan)->row_array();
	}

	public function detailRM($id_users){

		 $this->db->select('*');
		 $this->db->from('tb_rekam_medis','tb_users','tb_catatan_kehamilan');
		 $this->db->join('tb_users','tb_users.id_users = tb_rekam_medis.id_users','left');
		 $this->db->join('tb_catatan_kehamilan', 'tb_catatan_kehamilan.id_users=tb_users.id_users','left');
		 $this->db->where('tb_users.id_users',$id_users);
		 $this->db->order_by(`id_users`,'asc');
		 $query = $this->db->get();
		 return ($query->num_rows() > 0) ? $query->result_array() : false;
	}

}
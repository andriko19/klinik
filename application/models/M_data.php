<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_data extends CI_Model{

	public function hapusDAfAntrian(){

		$this->db->truncate('tb_antrian');
	}

	public function hapusKehadiran($id_antrian){

		$this->db->delete('tb_antrian', ['id_antrian' => $id_antrian]);
	}

	public function hapusDAfPesan(){

		$this->db->truncate('tb_pesan_hari');
	}

	public function hapusDafPesanById($id_pesan_hari){

		$this->db->delete('tb_pesan_hari', ['id_pesan_hari' => $id_pesan_hari]);
	}

	public function inputUsers(){

		$data = [
			"id_level_user"     => 5,
			"nama_users"        => htmlspecialchars($this->input->post('nama', true)),
			"tanggal_lahir"     => htmlspecialchars($this->input->post('tanggal_lahir', true)),
			"umur"              => htmlspecialchars($this->input->post('umur', true)),
			"nama_suami"        => htmlspecialchars($this->input->post('nama_suami', true)),
			"alamat"            => htmlspecialchars($this->input->post('alamat', true)),
			"telepon"           => htmlspecialchars($this->input->post('telepon', true)),
			"username"          => htmlspecialchars($this->input->post('username', true)),
			"password"          => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
			"tanggal_registrasi"=> time()
		];
	
		$this->db->insert('tb_users',$data);
	}

	public function cekLogin($username){

		return $this->db->get_where('tb_users', ['username' => $username])->row_array();
	}

	public function cekUsername(){

		return $this->db->get_where('tb_users', ['username' => $this->session->userdata('username')])->row_array();
	}

	public function tampilDetAntri($id_level_user){

		$queryDetAntri = "SELECT *
	                        FROM `tb_users` JOIN `tb_antrian` 
	                          ON `tb_users`.`id_users` = `tb_antrian`.`id_users`
	                       WHERE `tb_users`.`id_level_user` = $id_level_user
	                    ORDER BY `tb_users`.`id_level_user` ASC
	                  ";
      	return $this->db->query($queryDetAntri)->result_array();
	}

	public function tampilDetPesan($id_level_user){

		$queryDetPesan = "SELECT *
	                        FROM `tb_users` JOIN `tb_pesan_hari` 
	                          ON `tb_users`.`id_users` = `tb_pesan_hari`.`id_users`
	                       WHERE `tb_users`.`id_level_user` = $id_level_user
	                    ORDER BY `tb_pesan_hari`.`tanggal` ASC
	                  ";
      	return $this->db->query($queryDetPesan)->result_array();
	}

	public function getJadwalById($id_jadwal){

		return $this->db->get_where('tb_jadwal_klinik', ['id_jadwal' => $id_jadwal])->row_array();
	}

	public function tampilJadwal($status='Hari ini'){

		return $this->db->get_where('tb_jadwal_klinik', ['status' => $status])->result_array();

		// return $this->db->get('tb_jadwal_klinik')->result_array();
	}

	public function tambahJadwal(){

		$data = [
			'tanggal'     => htmlspecialchars($this->input->post('tanggal', true)),
			'kapasitas'   => htmlspecialchars($this->input->post('kapasitas', true)),
			// 'status'      => htmlspecialchars($this->input->post('status', true))
			'status'      => 'Hari ini'
		];
	
		$this->db->insert('tb_jadwal_klinik',$data);
	}

	public function ubahJadwal(){

		$data = [
			'tanggal'     => htmlspecialchars($this->input->post('tanggal', true)),
			'kapasitas'   => htmlspecialchars($this->input->post('kapasitas', true)),
			// 'status'      => htmlspecialchars($this->input->post('status', true))
			'status'      => 'Hari ini'
		];
	
		$this->db->where('id_jadwal', $this->input->post('id_jadwal'));
		$this->db->update('tb_jadwal_klinik',$data);
	}

	public function hapusJadwal($id_jadwal){

		$this->db->delete('tb_jadwal_klinik', ['id_jadwal' => $id_jadwal]);
	}

	public function getJadwalPesanById($id_jadwal){

		return $this->db->get_where('tb_jadwal_klinik', ['id_jadwal' => $id_jadwal])->row_array();
	}

	public function tampilJadwalPesanHari($statuss='Pesan hari'){

		return $this->db->get_where('tb_jadwal_klinik', ['status' => $statuss])->result_array();

		// return $this->db->get('tb_jadwal_klinik')->result_array();
	}

	public function tambahJadwalPesanHari(){

		$data = [
			'tanggal'     => htmlspecialchars($this->input->post('tanggal', true)),
			'kapasitas'   => htmlspecialchars($this->input->post('kapasitas', true)),
			// 'status'      => htmlspecialchars($this->input->post('status', true))
			'status'      => 'Pesan hari'
		];
	
		$this->db->insert('tb_jadwal_klinik',$data);
	}

	public function ubahJadwalPesanHari(){

		$data = [
			'tanggal'     => htmlspecialchars($this->input->post('tanggal', true)),
			'kapasitas'   => htmlspecialchars($this->input->post('kapasitas', true)),
			// 'status'      => htmlspecialchars($this->input->post('status', true))
			'status'      => 'Pesan hari'
		];
	
		$this->db->where('id_jadwal', $this->input->post('id_jadwal'));
		$this->db->update('tb_jadwal_klinik',$data);
	}

	public function hapusJadwalPesanHari($id_jadwal){

		$this->db->delete('tb_jadwal_klinik', ['id_jadwal' => $id_jadwal]);
	}

	public function getPasienById($id_users){

		return $this->db->get_where('tb_users', ['id_users' => $id_users])->row_array();
	}

	public function tampilPasien($id_level_user, $limit, $start){

		return $this->db->get_where('tb_users', ['id_level_user' => $id_level_user], $limit, $start)->result_array();
	}

	public function jumlahDataPasien(){

		return $this->db->get_where('tb_users', ['id_level_user' => 5])->num_rows();
	}

	public function ubahPasien(){

		$data = [
			"nama_users"        => htmlspecialchars($this->input->post('nama_users', true)),
			"tanggal_lahir"     => htmlspecialchars($this->input->post('tanggal_lahir', true)),
			"umur"              => htmlspecialchars($this->input->post('umur', true)),
			"nama_suami"        => htmlspecialchars($this->input->post('nama_suami', true)),
			"alamat"            => htmlspecialchars($this->input->post('alamat', true)),
			"telepon"           => htmlspecialchars($this->input->post('telepon', true))
		];
	
		$this->db->where('id_users', $this->input->post('id_users'));
		$this->db->update('tb_users',$data);
	}

	public function hapusPasien($id_users){

		$this->db->delete('tb_users', ['id_users' => $id_users]);
	}

	public function detailRM($id_users){

		 $this->db->select('*');
		 $this->db->from('tb_rekam_medis','tb_users');
		 $this->db->join('tb_users','tb_users.id_users = tb_rekam_medis.id_users','left');
		 $this->db->where('tb_users.id_users',$id_users);
		 // $this->db->order_by(`id_users`,'asc');
		 $query = $this->db->get();
		 return ($query->num_rows() > 0) ? $query->result_array() : false;
	}

	public function getPeriksaById($id_administrasi_periksa){

		return $this->db->get_where('tb_administrasi_periksa', ['id_administrasi_periksa' => $id_administrasi_periksa])->row_array();
	}

	public function ambilIdPasien($title){

		$this->db->like('id_users', $title, 'both');
		$this->db->order_by('id_users', 'asc');
		$this->db->limit(10);
		return $this->db->get('tb_users')->result();
	}

	public function ambilJenisPesiksa($title){

		$this->db->like('jenis_periksa', $title, 'both');
		$this->db->order_by('jenis_periksa', 'asc');
		$this->db->limit(10);
		return $this->db->get('tb_harga_periksa')->result();
	}

	public function tambahPeriksa(){

		$data = [
			'tanggal'      => htmlspecialchars($this->input->post('tanggal', true)),
			'id_users'     => htmlspecialchars($this->input->post('id_userss', true)),
			'nama_users'   => htmlspecialchars($this->input->post('nama_users', true)),
			'nama_suami'   => htmlspecialchars($this->input->post('nama_suami', true)),
			'jenis_periksa'=> htmlspecialchars($this->input->post('jenis_periksa', true)),
			'harga'        => htmlspecialchars($this->input->post('harga', true)),
		];
	
		$this->db->insert('tb_administrasi_periksa',$data);
	}

	public function tampilPeriksa(){

		$this->db->select('*');
	    $this->db->from('tb_administrasi_periksa');
	    $this->db->order_by('id_administrasi_periksa', 'DESC');
	    $query = $this->db->get();
	    return $query->result_array();

		// return $this->db->get('tb_administrasi_periksa')->result_array();
	}

	public function tampilHargaPeriksa(){

		return $this->db->get('tb_harga_periksa')->result_array();
	}

	public function cetakPeriksa($id_administrasi_periksa){

		return $this->db->get_where('tb_administrasi_periksa', ['id_administrasi_periksa' => $id_administrasi_periksa])->row_array();
	}

	public function getSARPRASById($id_SARPRAS){

		return $this->db->get_where('tb_sarpras', ['id_SARPRAS' => $id_SARPRAS])->row_array();
	}

	public function tampilSARPRAS(){

		return $this->db->get('tb_sarpras')->result_array();
	}

	public function tambahSARPRAS(){

		$data = [
			'nama_barang' => htmlspecialchars($this->input->post('nama_barang', true)),
			'jumlah'      => htmlspecialchars($this->input->post('jumlah', true)),
			'kondisi'     => htmlspecialchars($this->input->post('kondisi', true)),
		];
	
		$this->db->insert('tb_sarpras',$data);
	}

	public function ubahSARPRAS(){

		$data = [
			'nama_barang' => htmlspecialchars($this->input->post('nama_barang', true)),
			'jumlah'      => htmlspecialchars($this->input->post('jumlah', true)),
			'kondisi'     => htmlspecialchars($this->input->post('kondisi', true)),
		];
	
		$this->db->where('id_SARPRAS', $this->input->post('id_SARPRAS'));
		$this->db->update('tb_sarpras',$data);
	}

	public function hapusSARPRAS($id_SARPRAS){

		$this->db->delete('tb_sarpras', ['id_SARPRAS' => $id_SARPRAS]);
	}

	public function getBeritaById($id_berita){

		return $this->db->get_where('tb_info_berita', ['id_berita' => $id_berita])->row_array();
	}

	public function tampilBerita(){

		return $this->db->get('tb_info_berita')->result_array();
	}

	public function tambahBerita(){

		$data = [
			'tanggal' 	=> htmlspecialchars($this->input->post('tanggal', true)),
			'isi_berita'=> htmlspecialchars($this->input->post('isi_berita', true)),
		];
	
		$this->db->insert('tb_info_berita',$data);
	}

	public function ubahBerita(){

		$data = [
			'tanggal' 	=> htmlspecialchars($this->input->post('tanggal', true)),
			'isi_berita'=> htmlspecialchars($this->input->post('isi_berita', true)),
		];
	
		$this->db->where('id_berita', $this->input->post('id_berita'));
		$this->db->update('tb_info_berita',$data);
	}

	public function hapusBerita($id_berita){

		$this->db->delete('tb_info_berita', ['id_berita' => $id_berita]);
	}

	public function getUsersById($id_users){

		return $this->db->get_where('tb_users', ['id_users' => $id_users])->row_array();
	}

	public function ubahUsers(){

		$data = [
			"nama_users"        => htmlspecialchars($this->input->post('nama', true)),
			"tanggal_lahir"     => htmlspecialchars($this->input->post('tanggal_lahir', true)),
			"umur"              => htmlspecialchars($this->input->post('umur', true)),
			"nama_suami"        => htmlspecialchars($this->input->post('nama_suami', true)),
			"alamat"            => htmlspecialchars($this->input->post('alamat', true)),
			"telepon"           => htmlspecialchars($this->input->post('telepon', true)),
		];
		
		$this->db->where('id_users', $this->input->post('id_users'));
		$this->db->update('tb_users',$data);
	}

}
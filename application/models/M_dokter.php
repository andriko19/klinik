<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dokter extends CI_Model{

	public function tampilObat(){

		return $this->db->get('tb_obat')->result_array();
	}

	public function buatRekamMedis(){

		$data = [
			'id_users'					   => htmlspecialchars($this->input->post('id_users', true)),
			'HPHT'                         => htmlspecialchars($this->input->post('hpht', true)),
			'HTP'                          => htmlspecialchars($this->input->post('htp', true)),
			'hamil_ke'                     => htmlspecialchars($this->input->post('hamil_ke', true)),
			'jumlah_persalinan'            => htmlspecialchars($this->input->post('jumlah_persalinan', true)),
			'jumlah_keguguran'             => htmlspecialchars($this->input->post('jumlah_keguguran', true)),
			'jumlah_anak_hidup'            => htmlspecialchars($this->input->post('jumlah_anak_hidup', true)),
			'jumlah_anak_mati'             => htmlspecialchars($this->input->post('jumlah_anak_mati', true)),
			'cara_persalinan_terakhir'     => htmlspecialchars($this->input->post('cara_persalinan_terakhir', true)),
			'riwayat_penyakit_ibu'         => htmlspecialchars($this->input->post('riwayat_penyakit_ibu', true)),
		];

		$this->db->insert('tb_rekam_medis',$data);
	}

	public function buatCatatan(){

		$data = [
			'id_users'					   => htmlspecialchars($this->input->post('id_users', true)),
			'berat_badan'                  => htmlspecialchars($this->input->post('berat_badan', true)),
			'tensi_darah'                  => htmlspecialchars($this->input->post('tensi_darah', true)),
			'isi_catatan'                  => htmlspecialchars($this->input->post('isi_catatan', true)),
			'tanggal'                      => htmlspecialchars($this->input->post('tanggal', true)),
		];

		$this->db->insert('tb_catatan_kehamilan',$data);
	}

	public function getRMById($id_RM){

		return $this->db->get_where('tb_rekam_medis', ['id_RM' => $id_RM])->row_array();
	}

	public function ubahRekamMedis(){

		$data = [
			'HPHT'                         => htmlspecialchars($this->input->post('hpht', true)),
			'HTP'                          => htmlspecialchars($this->input->post('htp', true)),
			'hamil_ke'                     => htmlspecialchars($this->input->post('hamil_ke', true)),
			'jumlah_persalinan'            => htmlspecialchars($this->input->post('jumlah_persalinan', true)),
			'jumlah_keguguran'             => htmlspecialchars($this->input->post('jumlah_keguguran', true)),
			'jumlah_anak_hidup'            => htmlspecialchars($this->input->post('jumlah_anak_hidup', true)),
			'jumlah_anak_mati'             => htmlspecialchars($this->input->post('jumlah_anak_mati', true)),
			'cara_persalinan_terakhir'     => htmlspecialchars($this->input->post('cara_persalinan_terakhir', true)),
			'riwayat_penyakit_ibu'         => htmlspecialchars($this->input->post('riwayat_penyakit_ibu', true)),
		];
	
		$this->db->where('id_RM', $this->input->post('id_RM'));
		$this->db->update('tb_rekam_medis',$data);
	}

	public function getCatatanById($id_users){

		$this->db->select('*');
	    $this->db->from('tb_catatan_kehamilan');
	    $this->db->where('id_users', $id_users);
	    $this->db->order_by('id_catatan_kehamilan', 'DESC');
	    $query = $this->db->get();
	    return $query->result_array();
	}

	public function TambahCatatan($data){

		$this->db->insert('tb_catatan_kehamilan', $data);
	}

	public function tampilResep($id_level_user){

		$queryTamResep = "SELECT *
	                        FROM `tb_users` JOIN `tb_resep` 
	                          ON `tb_users`.`id_users` = `tb_resep`.`id_users`
	                       WHERE `tb_users`.`id_level_user` = $id_level_user
	                    ORDER BY `tb_resep`.`kode_resep` DESC
	                  ";
      	return $this->db->query($queryTamResep)->result_array();
	}

	public function getKode(){

		$kode = "R";
		$query = "SELECT max(kode_resep) as kode_auto FROM tb_resep";
		$data = $this->db->query($query)->row_array();
		$max_kode = $data['kode_auto'];
		$max_kode1= substr($max_kode, 8, 4);
		$kodecount= (int)$max_kode1+1;
		$thn = date("Y");
		$kode_auto= $kode. $thn. "-". sprintf('%04s', $kodecount);
		return $kode_auto;
	}

	public function buatResep($data){

		$this->db->insert('tb_resep',$data);
	}

	public function getKodeMax(){

		$query = "SELECT max(kode_resep) as kode_auto FROM tb_resep";
		$data = $this->db->query($query)->row_array();
		$max_kode = $data['kode_auto'];
		return $max_kode;
	}

	public function ambilKodeResep($title){

		$this->db->like('kode_resep', $title, 'both');
		$this->db->order_by('kode_resep', 'desc');
		$this->db->limit(10);
		return $this->db->get('tb_resep')->result();
	}

	public function ambilNamaObat($title){

		$this->db->like('nama_obat', $title, 'both');
		$this->db->order_by('id_obat', 'asc');
		$this->db->limit(10);
		return $this->db->get('tb_obat')->result();
	}

	public function buatDetailResep($data){

		$this->db->insert('tb_detail_resep_obat', $data);
	}

	public function getDetResep($kode){

		return $this->db->get_where('tb_detail_resep_obat', ['kode_resep' => $kode])->result_array();
	}

	public function hapusDetObat($id_detail_resep_obat){

		$this->db->delete('tb_detail_resep_obat', ['id_detail_resep_obat' => $id_detail_resep_obat]);
	}

	public function tampilDetResep($kode_resep){

		$queryDetResep = "SELECT *
	                        FROM `tb_users` JOIN `tb_resep` 
	                          ON `tb_users`.`id_users` = `tb_resep`.`id_users`
	                       WHERE `tb_resep`.`kode_resep` = '$kode_resep'
	                    -- ORDER BY `tb_resep`.`kode_resep` DESC
	                  ";
      	return $this->db->query($queryDetResep)->row_array();
	}

	public function tampilDetResepp($kode_resep){

		return $this->db->get_where('tb_detail_resep_obat', ['kode_resep' => $kode_resep])->result_array();
	}
	
}
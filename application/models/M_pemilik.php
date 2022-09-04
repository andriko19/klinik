<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pemilik extends CI_Model{

	function tampilJun($bulan = "06"){

		// $bulan1 = date("m",strtotime($bulan)); 
      	$this->db->select('*');
      	$this->db->from('tb_administrasi_periksa');
     	$this->db->where('month(tanggal)',$bulan);
     	// $this->db->where('year(tanggal_transaksi)',$vtanggal);
      	$query = $this->db->get();
      	return $query->num_rows();
	}

	function tampilJul($bulan = "07"){

		// $bulan1 = date("m",strtotime($bulan)); 
      	$this->db->select('*');
      	$this->db->from('tb_administrasi_periksa');
     	$this->db->where('month(tanggal)',$bulan);
     	// $this->db->where('year(tanggal_transaksi)',$vtanggal);
      	$query = $this->db->get();
      	return $query->num_rows();
	}

	function tampilAgus($bulan = "08"){

		// $bulan1 = date("m",strtotime($bulan)); 
      	$this->db->select('*');
      	$this->db->from('tb_administrasi_periksa');
     	$this->db->where('month(tanggal)',$bulan);
     	// $this->db->where('year(tanggal_transaksi)',$vtanggal);
      	$query = $this->db->get();
      	return $query->num_rows();
	}

	function tampilSep($bulan = "09"){

		// $bulan1 = date("m",strtotime($bulan)); 
      	$this->db->select('*');
      	$this->db->from('tb_administrasi_periksa');
     	$this->db->where('month(tanggal)',$bulan);
     	// $this->db->where('year(tanggal_transaksi)',$vtanggal);
      	$query = $this->db->get();
      	return $query->num_rows();
	}

	function tampilOkt($bulan = "10"){

		// $bulan1 = date("m",strtotime($bulan)); 
      	$this->db->select('*');
      	$this->db->from('tb_administrasi_periksa');
     	$this->db->where('month(tanggal)',$bulan);
     	// $this->db->where('year(tanggal_transaksi)',$vtanggal);
      	$query = $this->db->get();
      	return $query->num_rows();
	}

	function tampilNov($bulan = "11"){

		// $bulan1 = date("m",strtotime($bulan)); 
      	$this->db->select('*');
      	$this->db->from('tb_administrasi_periksa');
     	$this->db->where('month(tanggal)',$bulan);
     	// $this->db->where('year(tanggal_transaksi)',$vtanggal);
      	$query = $this->db->get();
      	return $query->num_rows();
	}

	function tampilDes($bulan = "12"){

		// $bulan1 = date("m",strtotime($bulan)); 
      	$this->db->select('*');
      	$this->db->from('tb_administrasi_periksa');
     	$this->db->where('month(tanggal)',$bulan);
     	// $this->db->where('year(tanggal_transaksi)',$vtanggal);
      	$query = $this->db->get();
      	return $query->num_rows();
	}


	public function getHargaById($id_harga_periksa){

		return $this->db->get_where('tb_harga_periksa', ['id_harga_periksa' => $id_harga_periksa])->row_array();
	}

	public function tampilHarga(){

		return $this->db->get('tb_harga_periksa')->result_array();
	}

	public function tambahHarga(){

		$data = [
			'jenis_periksa' => htmlspecialchars($this->input->post('jenis_periksa', true)),
			'harga'     	=> htmlspecialchars($this->input->post('harga', true)),
		];
	
		$this->db->insert('tb_harga_periksa',$data);
	}

	public function ubahHarga(){

		$data = [
			'jenis_periksa' => htmlspecialchars($this->input->post('jenis_periksa', true)),
			'harga'     	=> htmlspecialchars($this->input->post('harga', true)),
		];
	
		$this->db->where('id_harga_periksa', $this->input->post('id_harga_periksa'));
		$this->db->update('tb_harga_periksa',$data);
	}

	public function hapusHarga($id_harga_periksa){

		$this->db->delete('tb_harga_periksa', ['id_harga_periksa' => $id_harga_periksa]);
	}

	public function tampilObat(){

		return $this->db->get('tb_obat')->result_array();
	}

	public function DetLaporan($tgl){

		return $this->db->get_where('tb_administrasi_periksa', ['tanggal' => $tgl])->result_array();
	}

	public function TotalUang($tgl){

		$this->db->from('tb_administrasi_periksa');
		$this->db->select_sum('harga');
		$this->db->where('tanggal =', $tgl); 
		$query = $this->db->get();
		return $query->row_array();	
	}
	public function Periode($tgl1, $tgl2){

		$this->db->from('tb_administrasi_periksa');
		$this->db->where('tanggal >=', $tgl1);
		$this->db->where('tanggal <=', $tgl2);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function DetLaporann(){

		return $this->db->get('tb_administrasi_periksa')->result_array();
	}

	public function TotalUangObat($tgll){

		$this->db->from('tb_administrasi_obat');
		$this->db->select_sum('total_bayar');
		$this->db->where('tanggal =', $tgll); 
		$query = $this->db->get();
		return $query->row_array();	
	}

	public function DetLaporanObt($tgll){

		return $this->db->get_where('tb_administrasi_obat', ['tanggal' => $tgll])->result_array();
	}

	public function PeriodeObat($tgl1, $tgl2){

		$this->db->from('tb_administrasi_obat');
		$this->db->where('tanggal >=', $tgl1);
		$this->db->where('tanggal <=', $tgl2);
		$query = $this->db->get();
		return $query->result_array();
	}


	public function tampilAdmObat(){

		return $this->db->get('tb_administrasi_obat')->result_array();
	}

}
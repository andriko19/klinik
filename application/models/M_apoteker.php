<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_apoteker extends CI_Model{

	public function getObatById($id_obat){

		return $this->db->get_where('tb_obat', ['id_obat' => $id_obat])->row_array();
	}

	public function tampilObat(){

		return $this->db->get('tb_obat')->result_array();
	}

	public function tambahDataObat(){

		$data = [
			'nama_obat' => htmlspecialchars($this->input->post('nama_obat', true)),
			'stock'     => htmlspecialchars($this->input->post('stock', true)),
			'satuan'    => htmlspecialchars($this->input->post('satuan', true)),
			'harga'     => htmlspecialchars($this->input->post('harga', true)),
			'expired'   => htmlspecialchars($this->input->post('expired', true)),
		];
	
		$this->db->insert('tb_obat',$data);
	}

	public function ubahDataObat(){

		$data = [
			'nama_obat' => htmlspecialchars($this->input->post('nama_obat', true)),
			'stock'     => htmlspecialchars($this->input->post('stock', true)),
			'satuan'    => htmlspecialchars($this->input->post('satuan', true)),
			'harga'     => htmlspecialchars($this->input->post('harga', true)),
			'expired'   => htmlspecialchars($this->input->post('expired', true)),
		];
	
		$this->db->where('id_obat', $this->input->post('id_obat'));
		$this->db->update('tb_obat',$data);
	}

	public function hapusDataObat($id_obat){

		$this->db->delete('tb_obat', ['id_obat' => $id_obat]);
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

	public function ambilKodeResep($title){

		$this->db->like('kode_resep', $title, 'both');
		$this->db->order_by('kode_resep', 'desc');
		$this->db->limit(10);
		return $this->db->get('tb_resep')->result();
	}

	public function getKodeMax(){

		$query = "SELECT max(kode_resep) as kode_auto FROM tb_resep";
		$data = $this->db->query($query)->row_array();
		$max_kode = $data['kode_auto'];
		return $max_kode;
	}
	
	public function detailResep($kode){

		return $this->db->get_where('tb_detail_resep_obat', ['kode_resep' => $kode])->result_array();
	}

	public function buatAdministrasiObat(){

		$data = [
			'tanggal'		   => htmlspecialchars($this->input->post('tanggal', true)),
			'kode_resep'       => htmlspecialchars($this->input->post('kod_resep', true)),
			'nama_users'       => htmlspecialchars($this->input->post('nama_users', true)),
			'nama_suami'       => htmlspecialchars($this->input->post('nama_suami', true)),
			'alamat'           => htmlspecialchars($this->input->post('alamat', true)),
			'total_bayar'  	   => htmlspecialchars($this->input->post('total_bayar', true)),
		];

		$this->db->insert('tb_administrasi_obat',$data);
	}

	public function tampilAdmObat(){

		$this->db->select('*');
	    $this->db->from('tb_administrasi_obat');
	    $this->db->order_by('id_administrasi_obat', 'DESC');
	    $query = $this->db->get();
	    return $query->result_array();
	}

	public function cetakAdmObat($kode_resep){

		return $this->db->get_where('tb_administrasi_obat', ['kode_resep' => $kode_resep])->row_array();		
	}
	public function DetObat($kode_resep){

		return $this->db->get_where('tb_detail_resep_obat', ['kode_resep' => $kode_resep])->result_array();		
	}
}
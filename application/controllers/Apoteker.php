<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apoteker extends CI_Controller 
{
	public function __construct()
	{
		parent:: __construct();
		cek_login();
		$this->load->model(['m_data','m_apoteker','m_dokter']);
		$this->load->library('form_validation');
		$this->load->library('pagination');
	}

	public function index($id_level_user = 5)
	{
		$data['title']     = 'Dashboard';
		$data['users']     = $this->m_data->cekUsername();
		$data['DetAntrian']= $this->m_data->tampilDetAntri($id_level_user);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('users/apoteker/dashboard', $data);
		$this->load->view('templates/footer');
	}

	public function data_obat()
	{
		$data['title'] = 'Data Obat';
		$data['users'] = $this->m_data->cekUsername();
		$data['t_obat'] = $this->m_apoteker->tampilObat();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('users/apoteker/data_obat/data_obat', $data);
		$this->load->view('templates/footer');
	}

	public function tambah_data_obat()
	{
		$this->form_validation->set_rules('nama_obat', 'Nama Obat', 'trim|required');
		$this->form_validation->set_rules('stock', 'Stok', 'trim|required|numeric');
		$this->form_validation->set_rules('satuan', 'Satuan', 'trim|required');
		$this->form_validation->set_rules('harga', 'Harga', 'trim|required|numeric');
		$this->form_validation->set_rules('expired', 'Expired', 'trim|required');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Data Obat';
			$data['users'] = $this->m_data->cekUsername();
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('users/apoteker/data_obat/tambah_data_obat', $data);
			$this->load->view('templates/footer');	
		} else {
			$this->m_apoteker->tambahDataObat();
			$this->session->set_flashdata('message', 'Ditambahkan');
			redirect('apoteker/data_obat');
		}
	}

	public function ubah_data_obat($id_obat)
	{
		$this->form_validation->set_rules('nama_obat', 'Nama Obat', 'trim|required');
		$this->form_validation->set_rules('stock', 'Stok', 'trim|required|numeric');
		$this->form_validation->set_rules('satuan', 'Satuan', 'trim|required');
		$this->form_validation->set_rules('harga', 'Harga', 'trim|required|numeric');
		$this->form_validation->set_rules('expired', 'Expired', 'trim|required');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Data Obat';
			$data['users'] = $this->m_data->cekUsername();
			$data['j_obat']= $this->m_apoteker->getObatById($id_obat);
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('users/Apoteker/data_obat/ubah_data_obat', $data);
			$this->load->view('templates/footer');	
		} else {
			$this->m_apoteker->ubahDataObat();
			$this->session->set_flashdata('message', 'Diubah');
			redirect('Apoteker/data_obat');
		}
	}

	public function hapus_data_obat($id_obat)
	{
		$this->m_apoteker->hapusDataObat($id_obat);
		$this->session->set_flashdata('message', 'Dihapus');
		redirect('Apoteker/data_obat');
	}

	public function resep_obat($id_level_user = 5)
	{
		$data['title'] 		= 'Resep Obat';
		$data['users'] 		= $this->m_data->cekUsername();
		$data['t_resep'] 	= $this->m_apoteker->tampilResep($id_level_user);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('users/apoteker/resep_obat/resep_obat', $data);
		$this->load->view('templates/footer');
	}

	public function tampil_detail_resep($kode_resep)
	{
		$data['title'] 		= 'Resep Obat';
		$data['users'] 		= $this->m_data->cekUsername();
		$data['DetResep'] 	= $this->m_apoteker->tampilDetResep($kode_resep);
		$data['DetResepp'] 	= $this->m_apoteker->tampilDetResepp($kode_resep);			
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('users/apoteker/resep_obat/tampil_detail_resep', $data);
		$this->load->view('templates/footer');
	}

	public function administrasi_obat()
	{
		$data['title'] = 'Administrasi Obat';
		$data['users'] = $this->m_data->cekUsername();
		$data['t_AdObat']	= $this->m_apoteker->tampilAdmObat();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('users/apoteker/administrasi_obat/administrasi_obat', $data);
		$this->load->view('templates/footer');
	}

	public function tambah_administrasi()
	{

		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required|trim');
		$this->form_validation->set_rules('kod_resep', 'Kode Resep', 'required|trim');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Administrasi Obat';
			$data['users'] = $this->m_data->cekUsername();
			$data['kode_max']	= $this->m_apoteker->getKodeMax();
			
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('users/apoteker/administrasi_obat/tambah_administrasi', $data);
			$this->load->view('templates/footer');
		} else {
			$this->m_apoteker->buatAdministrasiObat();
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Administrasi obat <strong>berhasil</strong> ditambahkan! </div>');
			redirect('apoteker/administrasi_obat');
		}
	}

	public function tambah_administrasi1()
	{

		$kode = $this->input->get('kod_resep');
		$data = $this->m_apoteker->detailResep($kode);
		echo json_encode($data);
	}

	function get_KodeResep()
	{
		if (isset($_GET['term'])) {
			$result = $this->m_apoteker->ambilKodeResep($_GET['term']);
			if (count($result) > 0) {
				foreach ($result as $row) 
				$result_array[] =array(
                    'label'     => $row->kode_resep,
                    'id_users'	=> $row->id_users,
                    // 'nama_suami'=> $row->nama_suami,
                    // 'alamat'	=> $row->alamat,
                );
				echo json_encode($result_array);
			}
		}
	}

	public function cetak_admObat($kode_resep)
	{

		$data['cetak'] 	 = $this->m_apoteker->cetakAdmObat($kode_resep);
		$data['detObat'] = $this->m_apoteker->DetObat($kode_resep);

		$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A5-L']);
		$data = $this->load->view('users/apoteker/administrasi_obat/cetak_administrasi_obat', $data, TRUE);
		$mpdf->WriteHTML($data);
		$mpdf->Output('cetak_administrasi_obat/'.$id_administrasi_obat.'.pdf','I');
	}

	public function ganti_password()
	{
		$data['title'] = 'Ganti Password';
		$data['users'] = $this->m_data->cekUsername();
		
		$this->form_validation->set_rules('password_lama', 'Password Lama', 'required|trim');
		$this->form_validation->set_rules('password1', 'Password Baru', 'required|trim|min_length[3]|matches[password2]', 
			[ 
				'matches' => 'Password Tidak Sama!',
				'min_length' => 'Password Harus Diatas 3 Karakter!'
			] );
		$this->form_validation->set_rules('password2', 'Ulagi Password Baru', 'required|trim|min_length[3]|matches[password1]');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('users/apoteker/password/ganti_password', $data);
			$this->load->view('templates/footer');
		} else {
			$password_lama = $this->input->post('password_lama');
			$password_baru = $this->input->post('password1');
			if (!password_verify($password_lama, $data['users']['password'])) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password lama <strong>Tidak</strong> sesuai didatabase! </div>');
				redirect('apoteker/ganti_password');
			} else {
				if ($password_lama == $password_baru) {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password baru <strong>Tidak boleh sama</strong> dengan password lama! </div>');
					redirect('apoteker/ganti_password');
				} else {
					// password sudah ok
					$password_hash = password_hash($password_baru, PASSWORD_DEFAULT);

					$this->db->set('password', $password_hash);
					$this->db->where('username', $this->session->userdata('username'));	
					$this->db->update('tb_users');

					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password <strong>Berhasil</strong> Ubah! </div>');
					redirect('apoteker/ganti_password');
				}
			}
		}
	}

	public function ubah_profil($id_users)
	{

		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required|trim');
		$this->form_validation->set_rules('umur', 'Umur', 'required|numeric|trim');
		$this->form_validation->set_rules('nama_suami', 'Nama Suami', 'required|trim');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
		$this->form_validation->set_rules('telepon', 'Telepon', 'required|numeric|trim');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Ganti Password';
			$data['users'] = $this->m_data->cekUsername();
			$data['j_profil']= $this->m_data->getUsersById($id_users);
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('users/apoteker/password/ubah_profil', $data);
			$this->load->view('templates/footer');
		} else {
			$this->m_data->ubahUsers();
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Profil <strong>berhasil</strong> diubah! </div>');
			redirect('apoteker/ganti_password');
		}
	}

}
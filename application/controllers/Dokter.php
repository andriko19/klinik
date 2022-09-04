<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokter extends CI_Controller 
{
	public function __construct()
	{
		parent:: __construct();
		cek_login();
		$this->load->model(['m_data','m_dokter']);
		$this->load->library('form_validation');
		$this->load->library('pagination');
	}

	public function index($id_level_user = 5)
	{
		$data['title'] = 'Dashboard';
		$data['users'] = $this->m_data->cekUsername();
		$data['DetAntrian']= $this->m_data->tampilDetAntri($id_level_user);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('users/dokter/Dashboard', $data);
		$this->load->view('templates/footer');
	}

	public function rekam_medis($id_level_user = 5)
	{	
		$config['base_url']		= base_url('dokter/rekam_medis/');
		$config['per_page']		= $this->m_data->jumlahDataPasien();

		$data['mulai']      = $this->uri->segment(3);
		$data['pasien']     = $this->m_data->tampilPasien($id_level_user, $config['per_page'], $data['mulai']);
		$data['title']      = 'Rekam Medis';
		$data['users']      = $this->m_data->cekUsername();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('users/dokter/rekam_medis/rekam_medis', $data);
		$this->load->view('templates/footer');
	}

	public function detail_rekam_medis($id_users)
	{
		$data['j_catatan']  = $this->m_dokter->getCatatanById($id_users);
		$data['d_RM']	= $this->m_data->detailRM($id_users);
		$this->session->set_flashdata('rm', 'Data rekam medis belum dibuat');
		$data['title']  = 'Rekam Medis';
		$data['users']  = $this->m_data->cekUsername();
		$data['kode']	= $this->m_dokter->getKode();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('users/dokter/rekam_medis/detail_rekam_medis', $data);
		$this->load->view('templates/footer');
	}

	public function buat_rekam_medis()
	{
		$data['id_users']	= $this->input->post('id');

		$this->form_validation->set_rules('id_users', 'Id Pasien', 'trim|required|numeric');
		$this->form_validation->set_rules('hpht', 'HPHT', 'trim|required');
		$this->form_validation->set_rules('htp', 'HTP', 'trim|required');
		$this->form_validation->set_rules('hamil_ke', 'Hamil Ke-', 'trim|required|numeric');
		$this->form_validation->set_rules('jumlah_persalinan', 'Jumlah Persalinan', 'trim|required|numeric');
		$this->form_validation->set_rules('jumlah_keguguran', 'Jumlah Keguguran', 'trim|required|numeric');
		$this->form_validation->set_rules('jumlah_anak_hidup', 'Jumlah Anak Hidup', 'trim|required|numeric');
		$this->form_validation->set_rules('jumlah_anak_mati', 'Jumlah Anak Mati', 'trim|required|numeric');
		$this->form_validation->set_rules('cara_persalinan_terakhir', 'Cara Persalinan Terakhir', 'trim|required');
		$this->form_validation->set_rules('riwayat_penyakit_ibu', 'Riwayat Penyakit Ibu', 'trim|required');

		if ($this->form_validation->run() == false) {
			$data['title']  = 'Rekam Medis';
			$data['users']  = $this->m_data->cekUsername();
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('users/dokter/rekam_medis/buat_rekam_medis', $data);
			$this->load->view('templates/footer');
		} else {
			$this->m_dokter->buatRekamMedis();
			$this->session->set_flashdata('message', 'Data Rekam Medis Baru <b>Berhasil</b> Dibuat');
			redirect('dokter/rekam_medis');
		}
	}

	public function update_rekam_medis($id_RM)
	{
		$this->form_validation->set_rules('hpht', 'HPHT', 'trim|required');
		$this->form_validation->set_rules('htp', 'HTP', 'trim|required');
		$this->form_validation->set_rules('hamil_ke', 'Hamil Ke-', 'trim|required|numeric');
		$this->form_validation->set_rules('jumlah_persalinan', 'Jumlah Persalinan', 'trim|required|numeric');
		$this->form_validation->set_rules('jumlah_keguguran', 'Jumlah Keguguran', 'trim|required|numeric');
		$this->form_validation->set_rules('jumlah_anak_hidup', 'Jumlah Anak Hidup', 'trim|required|numeric');
		$this->form_validation->set_rules('jumlah_anak_mati', 'Jumlah Anak Mati', 'trim|required|numeric');
		$this->form_validation->set_rules('cara_persalinan_terakhir', 'Cara Persalinan Terakhir', 'trim|required');
		$this->form_validation->set_rules('riwayat_penyakit_ibu', 'Riwayat Penyakit Ibu', 'trim|required');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Rekam Medis';
			$data['users'] = $this->m_data->cekUsername();
			$data['j_RM']  = $this->m_dokter->getRMById($id_RM);
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('users/dokter/rekam_medis/ubah_rekam_medis', $data);
			$this->load->view('templates/footer');
		} else {
			$this->m_dokter->ubahRekamMedis();
			$this->session->set_flashdata('message', 'Data Rekam Medis <b>Berhasil</b> Diperbaharui');
			redirect('dokter/rekam_medis');
		}
	}

	public function tambah_catatan()
	{	
		$tgl = date('Y-m-d');

		$data = [
			'kode_resep'         => htmlspecialchars($this->input->post('kode_resep', true)),
			'tanggal'            => $tgl,
			'id_users'           => htmlspecialchars($this->input->post('id', true)),
		];
		$this->m_dokter->buatResep($data);

		$data['id_users']	= $this->input->post('id');

		$this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required');
		$this->form_validation->set_rules('no_resep', 'No_resep', 'trim|required');
		$this->form_validation->set_rules('id_users', 'No Induk Pasien', 'trim|required|numeric');
		$this->form_validation->set_rules('berat_badan', 'Berat Badan', 'trim|required|numeric');
		$this->form_validation->set_rules('tensi_darah', 'Tensi Darah', 'trim|required');
		$this->form_validation->set_rules('isi_catatan', 'Isi Catatan Kehamilan', 'trim|required');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Rekam Medis';
			$data['users'] = $this->m_data->cekUsername();
			$data['kode']		= $this->m_dokter->getKode();
			$data['kode_max']	= $this->m_dokter->getKodeMax();
			$kode_max			= $data['kode'];
			$data['DetResep']	= $this->m_dokter->getDetResep($kode_max);

			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('users/dokter/rekam_medis/tambah_catatan_kehamilan', $data);
			$this->load->view('templates/footer');
		} else {
			$this->m_dokter->TambahCatatan();
			$this->session->set_flashdata('message', 'Data Catatan Kehamilan <b>Berhasil</b> Ditambahkan');
			redirect('dokter/rekam_medis');
		}
	}

	public function simpan_catatan()
	{
		$data=array(
			'id_users'    => $this->input->get('id_users'),
			'berat_badan' => $this->input->get('berat_badan'),
			'tensi_darah' => $this->input->get('tensi_darah'),
			'isi_catatan' => $this->input->get('isi_catatan'),
			'tanggal'     => $this->input->get('tanggal'),
			'kode_resep'  => $this->input->get('kode_resep'),
		);
		
		$result = $this->m_dokter->TambahCatatan($data);

		echo json_encode($result);
	}

	public function data_obat()
	{
		$data['title']	= 'Data Obat';
		$data['users'] 	= $this->m_data->cekUsername();
		$data['t_obat'] = $this->m_dokter->tampilObat();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('users/dokter/data_obat', $data);
		$this->load->view('templates/footer');
	}

	public function resep_obat($id_level_user = 5)
	{
		$data['title'] 		= 'Resep Obat';
		$data['users'] 		= $this->m_data->cekUsername();
		$data['t_resep'] 	= $this->m_dokter->tampilResep($id_level_user);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('users/dokter/resep_obat/resep_obat', $data);
		$this->load->view('templates/footer');
	}

	function get_IdPasien()
	{
		if (isset($_GET['term'])) {
			$result = $this->m_data->ambilIdPasien($_GET['term']);
			if (count($result) > 0) {
				foreach ($result as $row) 
				$result_array[] =array(
                    'label'     => $row->id_users,
                    'nama_users'=> $row->nama_users,
                    'nama_suami'=> $row->nama_suami,
                    'alamat'	=> $row->alamat,
             );
				echo json_encode($result_array);
			}
		}
	}

	public function tambah_detail_resep()
	{
		$data=array(
			'kode_resep'        => $this->input->get('kode_resep'),
			'nama_obat'			=> $this->input->get('nama_obat'),
			'id_obat'			=> $this->input->get('id_obat'),
			'aturan_minum'      => $this->input->get('aturan_minum'),
			'jumlah_obat'       => $this->input->get('jumlah_obat'),
			'satuan_obat'       => $this->input->get('satuan_obat'),
			'harga_satuan'		=> $this->input->get('harga'),
		);
		
		$result = $this->m_dokter->buatDetailResep($data);

		echo json_encode($result);
	}

	public function tambah_detail_resep1()
	{
		$this->form_validation->set_rules('kode_resep', 'No Resep', 'required|trim');
		$this->form_validation->set_rules('nam_obat', 'Nama Obat', 'required|trim');
		$this->form_validation->set_rules('aturan_minum', 'Aturan Minum', 'required|trim');
		$this->form_validation->set_rules('jumlah_obat', 'Jumlah Obat', 'required|trim');

		if ($this->form_validation->run() == false) {
			$data['title'] 		= 'Resep Obat';
			$data['users'] 		= $this->m_data->cekUsername();
			$data['kode_max']	= $this->m_dokter->getKodeMax();
			$kode_max			= $data['kode_max'];
			$data['DetResep']	= $this->m_dokter->getDetResep($kode_max);

			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('users/dokter/resep_obat/tambah_detail_resep', $data);
			$this->load->view('templates/footer');
		} else {
			$this->m_dokter->buatDetailResep();
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Obat <strong>berhasil</strong> ditambahkan! </div>');
			redirect('dokter/tambah_detail_resep');
		}
	}

	function get_KodeResep()
	{
		if (isset($_GET['term'])) {
			$result = $this->m_dokter->ambilKodeResep($_GET['term']);
			if (count($result) > 0) {
				foreach ($result as $row)
				$result_array[] = $row->kode_resep;
				echo json_encode($result_array);
			}
		}
	}

	function get_NamaObat()
	{
		if (isset($_GET['term'])) {
			$result = $this->m_dokter->ambilNamaObat($_GET['term']);
			if (count($result) > 0) {
				foreach ($result as $row) 
				$result_array[] = array(
                    'label'     => $row->nama_obat,
                    'id_obat'	=> $row->id_obat,
                    'harga'		=> $row->harga,
             );
				echo json_encode($result_array);
			}
		}
	}

	public function hapus_detObat($id_detail_resep_obat)
	{
		$this->m_dokter->hapusDetObat($id_detail_resep_obat);
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><strong>Berhasil</strong> 
				hapus detail obat! </div>');
		redirect('dokter/tambah_detail_resep');
	}

	public function tampil_detail_resep1()
	{
		$kode_resep         = $this->input->get('kode_resep');

		$result = $this->m_dokter->tampilDetResepp($kode_resep);

		echo json_encode($result);
	}

	public function tampil_detail_resep($kode_resep)
	{
		$data['title'] 		= 'Resep Obat';
		$data['users'] 		= $this->m_data->cekUsername();
		$data['DetResep'] 	= $this->m_dokter->tampilDetResep($kode_resep);
		$data['DetResepp'] 	= $this->m_dokter->tampilDetResepp($kode_resep);			
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('users/dokter/resep_obat/tampil_detail_resep', $data);
		$this->load->view('templates/footer');
	}

	public function cetak_resep($kode_resep)
	{	
		$data['cetak'] = $this->m_dokter->cetakResep($kode_resep);

		$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A5-L']);
		$data = $this->load->view('users/dokter/resep_obat/cetak_resep', $data, TRUE);
		$mpdf->WriteHTML($data);
		$mpdf->Output('cetak_resep/'.$kode_resep.'.pdf','I');
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
			$this->load->view('users/dokter/password/ganti_password', $data);
			$this->load->view('templates/footer');
		} else {
			$password_lama = $this->input->post('password_lama');
			$password_baru = $this->input->post('password1');
			if (!password_verify($password_lama, $data['users']['password'])) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password lama <strong>Tidak</strong> 
				sesuai didatabase! </div>');
				redirect('dokter/ganti_password');
			} else {
				if ($password_lama == $password_baru) {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password baru <strong>Tidak boleh sama</strong> dengan password lama! </div>');
					redirect('dokter/ganti_password');
				} else {
					// password sudah ok
					$password_hash = password_hash($password_baru, PASSWORD_DEFAULT);

					$this->db->set('password', $password_hash);
					$this->db->where('username', $this->session->userdata('username'));	
					$this->db->update('tb_users');

					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password <strong>Berhasil</strong> Ubah! </div>');
					redirect('dokter/ganti_password');
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
			$this->load->view('users/dokter/password/ubah_profil', $data);
			$this->load->view('templates/footer');
		} else {
			$this->m_data->ubahUsers();
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Profil <strong>berhasil</strong> diubah! </div>');
			redirect('dokter/ganti_password');
		}
	}

}
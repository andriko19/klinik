<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien extends CI_Controller 
{
	public function __construct()
	{
		parent:: __construct();
		cek_login();
		$this->load->model(['m_data','m_pasien','m_dokter']);
		$this->load->library('form_validation');
		$this->load->library('pagination');
	}

	public function index()
	{
		$data['title']      = 'Dashboard';
		$data['users']      = $this->m_data->cekUsername();
		$id_users		    = $data['users']['id_users'];
		$data['DetAntrian'] = $this->m_pasien->tampilDetAntri($id_users);
		$data['t_infor']    = $this->m_pasien->tampilInformasi();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('users/pasien/dashboard', $data);
		$this->load->view('templates/footer');
	}

	public function ambil_nomer()
	{	
		$data['title']        = 'Ambil Nomer Antrian';
		$data['users']        = $this->m_data->cekUsername();
		$data['t_jumAntrian'] = $this->m_pasien->tampilJumAntrian();
		$id_users		      = $data['users']['id_users'];
		$data['DetAntrian']   = $this->m_pasien->tampilDetAntri($id_users);
		$data['tes']          = $this->m_pasien->cek();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('users/pasien/ambil_nomer', $data);
		$this->load->view('templates/footer');
	}

	public function proses_ambil_nomor($id_users)
	{
		
		$tgl = date('Y-m-d');	

		$get_antrian_terakhir = $this->m_pasien->cekAntrianTerakhir($tgl);
		$antrian_terakhir = $get_antrian_terakhir->antrian_terakhir;
		$no = $antrian_terakhir + 1;

		$cek_antri = $this->m_pasien->cekDaftarAntri($id_users);
		
		if ($cek_antri > 0) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> anda <strong> sudah </strong>memiliki nomor antrian! </div>');
			redirect('Pasien/ambil_nomer');
		}else{
			$this->m_pasien->simpanAntrian($no, $id_users, $tgl);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><strong>Berhasil</strong> mengambil nomor antrian! </div>');
			redirect('Pasien/ambil_nomer');
		}
	}

	public function kurangi_nomor()
	{
		$id_jadwal     = $this->input->get('id_jadwal');
		$id_users      = $this->input->get('id_users');
		$nomor = 1;
		
		$cek_antri = $this->m_pasien->cekDaftarAntri($id_users);
		
		if ($cek_antri > 0) {
		}else{
			$get_jumlah_nomor = $this->m_pasien->getJumlahNomor($id_jadwal);
			$jumlah_nomor = $get_jumlah_nomor->kapasitas;
			$nom = $jumlah_nomor - $nomor;

			$this->m_pasien->kurangiNomor($id_jadwal, $nom);
		}
	}

	public function cetak_noAntrian($id_antrian)
	{
		$data['cetak_no'] = $this->m_pasien->ambilNoAntrian($id_antrian);

		$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A5-L']);
		$data = $this->load->view('users/pasien/cetak_noAntrian', $data, TRUE);
		$mpdf->WriteHTML($data);
		$mpdf->Output('Cetak_Antrian/'.$id_antrian.'.pdf','I');
	}

	public function pesan_hari()
	{
		$data['title']        = 'Pesan Hari';
		$data['users']        = $this->m_data->cekUsername();
		$data['t_TglAntrian'] = $this->m_pasien->tampilTglAntrian();
		$id_users		      = $data['users']['id_users'];
		$data['DetPesan']     = $this->m_pasien->tampilDetPesan($id_users);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('users/pasien/pesan_hari', $data);
		$this->load->view('templates/footer');
	}

	public function proses_pesan_hari($tanggal)
	{
		$data['users']  = $this->m_data->cekUsername();
		$id_users		= $data['users']['id_users'];
		$TotPesan	  	= $this->m_pasien->cekPesan($tanggal);
		$data['TotNo']  = $this->m_pasien->TampilTotNo($tanggal);
		$TampilTotNo	= $data['TotNo']['kapasitas'];
		$nomor 			= 1;

		$get_pesan_terakhir = $this->m_pasien->cekPesanTerakhir($tanggal);
		$pesan_terakhir = $get_pesan_terakhir->no_terakhir;
		$no = $pesan_terakhir + $nomor;

		$cek_pesan = $this->m_pasien->cekDaftarPesan($id_users);
		
		if ($cek_pesan > 0) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> anda <strong> sudah </strong> memesan hari! </div>');
			redirect('Pasien/pesan_hari');
		}else{
			if ($TampilTotNo == $TotPesan) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> jumlah nomor <strong>sudah habis</strong> silahkan pilih tanggal lain! </div>' );
				redirect('Pasien/pesan_hari');
			} else {
				$this->m_pasien->simpanPesanHari($no, $id_users, $tanggal);
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><strong>Berhasil</strong> memesan hari! </div>');
				redirect('Pasien/pesan_hari');
			}
		}
	}

	public function cetak_noPesan($id_pesan_hari)
	{
		$data['cetak_no'] = $this->m_pasien->ambilNoPesan($id_pesan_hari);

		$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A5-L']);
		$data = $this->load->view('users/pasien/cetak_noPesan', $data, TRUE);
		$mpdf->WriteHTML($data);
		$mpdf->Output('Cetak_Pesan_Hari/'.$id_pesan_hari.'.pdf','I');
	}

	public function rekam_medis()
	{	
		$data['title'] = 'Rekam Medis';
		$data['users'] = $this->m_data->cekUsername();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('users/pasien/rekam_medis', $data);
		$this->load->view('templates/footer');
	}

	public function detail_rekam_medis($id_users)
	{	
		$data['j_catatan']  = $this->m_dokter->getCatatanById($id_users);
		$data['det_RM']  = $this->m_data->detailRM($id_users);
		$this->session->set_flashdata('rm', 'Data rekam medis belum dibuat');
		$data['title']   = 'Rekam Medis';
		$data['users']   = $this->m_data->cekUsername();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('users/pasien/detail_rekam_medis', $data);
		$this->load->view('templates/footer');
	}

	public function profil_pasien()
	{
		$data['title'] = 'Profil Pasien';
		$data['users'] = $this->m_data->cekUsername();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('users/pasien/my_profil', $data);
		$this->load->view('templates/footer');
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
			$data['title']   = 'Profil Pasien';
			$data['users']   = $this->m_data->cekUsername();
			$data['j_profil']= $this->m_data->getUsersById($id_users);
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('users/pasien/ubah_profil', $data);
			$this->load->view('templates/footer');
		} else {
			$this->m_data->ubahUsers();
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Profil <strong>berhasil</strong> diubah! </div>');
			redirect('pasien/profil_pasien');
		}
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
			$this->load->view('users/pasien/ganti_password', $data);
			$this->load->view('templates/footer');
		} else {
			$password_lama = $this->input->post('password_lama');
			$password_baru = $this->input->post('password1');
			if (!password_verify($password_lama, $data['users']['password'])) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password lama <strong>Tidak</strong> 
				sesuai didatabase! </div>');
				redirect('pasien/ganti_password');
			} else {
				if ($password_lama == $password_baru) {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password baru <strong>Tidak boleh sama</strong> dengan password lama! </div>');
					redirect('pasien/ganti_password');
				} else {
					// password sudah ok
					$password_hash = password_hash($password_baru, PASSWORD_DEFAULT);

					$this->db->set('password', $password_hash);
					$this->db->where('username', $this->session->userdata('username'));	
					$this->db->update('tb_users');

					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password <strong>Berhasil</strong> Ubah! </div>');
					redirect('pasien/ganti_password');
				}
			}
		}
	}

	public function tentang_klinik()
	{
		$data['title'] = 'Tentang Kami';
		$data['users'] = $this->m_data->cekUsername();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('users/pasien/tentang_klinik', $data);
		$this->load->view('templates/footer');
	}
}
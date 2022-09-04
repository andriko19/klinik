<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Receptionis extends CI_Controller 
{
	public function __construct()
	{
		parent:: __construct();
		cek_login();
		$this->load->model(['m_data','m_pasien','m_dokter']);
		$this->load->library('form_validation');
		$this->load->library('pagination');
	}

	public function index($id_level_user = 5)
	{
		$data['title']        = 'Dashboard';
		$data['users']        = $this->m_data->cekUsername();
		$data['t_jumAntrian'] = $this->m_pasien->tampilJumAntrian();
		$data['DetAntrian']   = $this->m_data->tampilDetAntri($id_level_user);
		$data['DetPesan']     = $this->m_data->tampilDetPesan($id_level_user);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('users/receptionis/dashboard', $data);
		$this->load->view('templates/footer');
	}

	public function hapus_antrian()
	{
		$this->m_data->hapusDafAntrian();
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><strong>Berhasil</strong> 
				hapus daftar antrian! </div>');
		redirect('receptionis');
	}

	public function hapus_pesan_hari()
	{
		$this->m_data->hapusDafPesan();
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><strong>Berhasil</strong> 
				hapus daftar pesan hari! </div>');
		redirect('receptionis');
	}

	public function hapus_pesan_hari_byId($id_pesan_hari)
	{
		$this->m_data->hapusDafPesanById($id_pesan_hari);
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><strong>Berhasil</strong> 
				hapus pasien pesan hari! </div>');
		redirect('receptionis');
	}

	public function konfirmasi_kehadiran($id_antrian)
	{
		$this->m_data->hapusKehadiran($id_antrian);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><strong>Pasien</strong> 
				sudah diperiksa! </div>');
		redirect('receptionis');
	}

	public function jadwal_peraktek()
	{
		$data['title']  = 'Jadwal Peraktek';
		$data['users']  = $this->m_data->cekUsername();
		$data['jadwal'] = $this->m_data->tampilJadwal();
		$data['jadwalPesan'] = $this->m_data->tampilJadwalPesanHari();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('users/receptionis/jadwal_peraktek/jadwal_peraktek', $data);
		$this->load->view('templates/footer');
	}

	public function tambah_jadwal()
	{
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required');
		$this->form_validation->set_rules('kapasitas', 'Kapasitas', 'trim|required|numeric');
		// $this->form_validation->set_rules('status', 'Status', 'trim|required');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Jadwal Peraktek';
			$data['users'] = $this->m_data->cekUsername();
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('users/receptionis/jadwal_peraktek/tambah_jadwal', $data);
			$this->load->view('templates/footer');	
		} else {
			$this->m_data->tambahJadwal();
			$this->session->set_flashdata('message', 'Ditambahkan');
			redirect('receptionis/jadwal_peraktek');
		}
	}

	public function ubah_jadwal($id_jadwal)
	{
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required');
		$this->form_validation->set_rules('kapasitas', 'Kapasitas', 'trim|required|numeric');
		// $this->form_validation->set_rules('status', 'Status', 'trim|required');

		if ($this->form_validation->run() == false) {
			$data['title']   = 'Jadwal Peraktek';
			$data['users']   = $this->m_data->cekUsername();
			$data['j_Klinik']= $this->m_data->getJadwalById($id_jadwal);
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('users/receptionis/jadwal_peraktek/ubah_jadwal', $data);
			$this->load->view('templates/footer');	
		} else {
			$this->m_data->ubahJadwal();
			$this->session->set_flashdata('message', 'Diubah');
			redirect('receptionis/jadwal_peraktek');
		}
	}

	public function hapus_jadwal($id_jadwal)
	{
		$this->m_data->hapusJadwal($id_jadwal);
		$this->session->set_flashdata('message', 'Dihapus');
		redirect('receptionis/jadwal_peraktek');
	}

	public function tambah_jadwal_pesan_hari()
	{
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required');
		$this->form_validation->set_rules('kapasitas', 'Kapasitas', 'trim|required|numeric');
		// $this->form_validation->set_rules('status', 'Status', 'trim|required');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Jadwal Peraktek';
			$data['users'] = $this->m_data->cekUsername();
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('users/receptionis/jadwal_peraktek/tambah_jadwal_pesan_hari', $data);
			$this->load->view('templates/footer');	
		} else {
			$this->m_data->tambahJadwalPesanHari();
			$this->session->set_flashdata('message', 'Ditambahkan');
			redirect('receptionis/jadwal_peraktek');
		}
	}

	public function ubah_jadwal_pesan_hari($id_jadwal)
	{
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required');
		$this->form_validation->set_rules('kapasitas', 'Kapasitas', 'trim|required|numeric');
		// $this->form_validation->set_rules('status', 'Status', 'trim|required');

		if ($this->form_validation->run() == false) {
			$data['title']   = 'Jadwal Peraktek';
			$data['users']   = $this->m_data->cekUsername();
			$data['j_Klinik']= $this->m_data->getJadwalPesanById($id_jadwal);
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('users/receptionis/jadwal_peraktek/ubah_jadwal_pesan_hari', $data);
			$this->load->view('templates/footer');	
		} else {
			$this->m_data->ubahJadwalPesanHari();
			$this->session->set_flashdata('message', 'Diubah');
			redirect('receptionis/jadwal_peraktek');
		}
	}

	public function hapus_jadwal_pesan_hari($id_jadwal)
	{
		$this->m_data->hapusJadwalPesanHari($id_jadwal);
		$this->session->set_flashdata('message', 'Dihapus');
		redirect('receptionis/jadwal_peraktek');
	}

	public function data_pasien($id_level_user = 5)
	{

		// konfigurasi pagination pasien
		$config['base_url']		= base_url('Receptionis/data_pasien/');
		$config['per_page']		= $this->m_data->jumlahDataPasien();

		$data['mulai']      = $this->uri->segment(3);
		$data['pasien']     = $this->m_data->tampilPasien($id_level_user, $config['per_page'], $data['mulai']);
		$data['title']      = 'Data Pasien';
		$data['users']      = $this->m_data->cekUsername();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('users/receptionis/data_pasien/data_pasien', $data);
		$this->load->view('templates/footer');
	}

	public function ubah_pasien($id_users)
	{
		$this->form_validation->set_rules('nama_users', 'Nama', 'required|trim');
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required|trim');
		$this->form_validation->set_rules('umur', 'Umur', 'required|numeric|trim');
		$this->form_validation->set_rules('nama_suami', 'Nama Suami', 'required|trim');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
		$this->form_validation->set_rules('telepon', 'Telepon', 'required|numeric|trim');
		
		if ($this->form_validation->run() == false) {
			$data['title']   = 'Data Pasien';
			$data['users']   = $this->m_data->cekUsername();
			$data['u_pasien']= $this->m_data->getPasienById($id_users);
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('users/receptionis/data_pasien/ubah_pasien', $data);
			$this->load->view('templates/footer');
		} else {
			$this->m_data->ubahPasien();
			$this->session->set_flashdata('message', 'Diubah');
			redirect('receptionis/data_pasien');
		}	
	}

	public function hapus_pasien($id_users)
	{
		$this->m_data->hapusPasien($id_users);
		$this->session->set_flashdata('message', 'Dihapus');
		redirect('receptionis/data_pasien');
	}

	public function rekam_medis($id_level_user = 5)
	{
		$config['base_url']	= base_url('Receptionis/rekam_medis/');
		$config['per_page']	= $this->m_data->jumlahDataPasien();

		$data['mulai']      = $this->uri->segment(3);
		$data['pasien']     = $this->m_data->tampilPasien($id_level_user, $config['per_page'], $data['mulai']);

		$data['title'] 		= 'Data Rekam Medis';
		$data['users'] 		= $this->m_data->cekUsername();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('users/receptionis/data_rekam_medis/rekam_medis', $data);
		$this->load->view('templates/footer');
	}

	public function detail_rekam_medis($id_users)
	{
		$data['j_catatan']  = $this->m_dokter->getCatatanById($id_users);
		$data['d_RM']	= $this->m_data->detailRM($id_users);
		$this->session->set_flashdata('rm', 'Data rekam medis belum dibuat');
		$data['title']  = 'Data Rekam Medis';
		$data['users']  = $this->m_data->cekUsername();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('users/receptionis/data_rekam_medis/detail_rekam_medis', $data, $id_users);
		$this->load->view('templates/footer');
	}

	public function administrasi_periksa()
	{
		$data['title']   = 'Administrasi Periksa';
		$data['users']   = $this->m_data->cekUsername();
		$data['periksa'] = $this->m_data->tampilPeriksa();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('users/receptionis/administrasi_periksa/administrasi_periksa', $data);
		$this->load->view('templates/footer');
	}

	public function tambah_administrasi()
	{
		$data['title']              = 'Administrasi Periksa';
		$data['users']              = $this->m_data->cekUsername();
		
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required|trim');
		$this->form_validation->set_rules('id_userss', 'No induk pasien', 'required|trim');
		$this->form_validation->set_rules('jenis_periksa', 'Jenis Periksa', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('users/receptionis/administrasi_periksa/tambah_administrasi', $data);
			$this->load->view('templates/footer');
		} else {
			$this->m_data->tambahPeriksa();
			$this->session->set_flashdata('message', 'Ditambahkan');
			redirect('receptionis/administrasi_periksa');
		}
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
             );
				echo json_encode($result_array);
			}
		}
	}

	function get_jenis_periksa()
	{
		if (isset($_GET['term'])) {
			$result = $this->m_data->ambilJenisPesiksa($_GET['term']);
			if (count($result) > 0) {
				foreach ($result as $row) 
				$result_array[] =array(
                    'label'   => $row->jenis_periksa,
                    'harga'   => $row->harga,
             );
				echo json_encode($result_array);
			}
		}
	}

	public function cetak_periksa($id_administrasi_periksa)
	{	
		$data['cetak'] = $this->m_data->cetakPeriksa($id_administrasi_periksa);

		$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A5-L']);
		$data = $this->load->view('users/receptionis/administrasi_periksa/cetak_periksa', $data, TRUE);
		$mpdf->WriteHTML($data);
		$mpdf->Output('Cetak_nota/'.$id_administrasi_periksa.'.pdf','I');
	}

	public function data_sarpras()
	{
		$data['title'] = 'Data SARPRAS';
		$data['users'] = $this->m_data->cekUsername();
		$data['sarpras'] = $this->m_data->tampilSARPRAS();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('users/receptionis/SARPRAS/data_SARPRAS', $data);
		$this->load->view('templates/footer');
	}

	public function tambah_SARPRAS()
	{
		$this->form_validation->set_rules('nama_barang', 'Nama Barang', 'trim|required');
		$this->form_validation->set_rules('jumlah', 'Jumlah', 'trim|required|numeric');
		$this->form_validation->set_rules('kondisi', 'Kondisi', 'trim|required');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Data SARPRAS';
			$data['users'] = $this->m_data->cekUsername();
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('users/receptionis/SARPRAS/tambah_SARPRAS', $data);
			$this->load->view('templates/footer');	
		} else {
			$this->m_data->tambahSARPRAS();
			$this->session->set_flashdata('message', 'Ditambahkan');
			redirect('receptionis/data_SARPRAS');
		}
	}

	public function ubah_SARPRAS($id_SARPRAS)
	{
		$this->form_validation->set_rules('nama_barang', 'Nama Barang', 'trim|required');
		$this->form_validation->set_rules('jumlah', 'Jumlah', 'trim|required|numeric');
		$this->form_validation->set_rules('kondisi', 'Kondisi', 'trim|required');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Data SARPRAS';
			$data['users'] = $this->m_data->cekUsername();
			$data['j_SARPRAS']= $this->m_data->getSARPRASById($id_SARPRAS);
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('users/receptionis/SARPRAS/ubah_SARPRAS', $data);
			$this->load->view('templates/footer');	
		} else {
			$this->m_data->ubahSARPRAS();
			$this->session->set_flashdata('message', 'Diubah');
			redirect('receptionis/data_SARPRAS');
		}
	}

	public function hapus_SARPRAS($id_SARPRAS)
	{
		$this->m_data->hapusSARPRAS($id_SARPRAS);
		$this->session->set_flashdata('message', 'Dihapus');
		redirect('receptionis/data_sarpras');
	}	

	public function info_berita()
	{
		$data['title'] = 'Info Berita';
		$data['users'] = $this->m_data->cekUsername();
		$data['berita'] = $this->m_data->tampilBerita();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('users/receptionis/info_berita/info_berita', $data);
		$this->load->view('templates/footer');
	}

	public function tambah_berita()
	{
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required');
		$this->form_validation->set_rules('isi_berita', 'Isi Berita', 'trim|required');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Info Berita';
			$data['users'] = $this->m_data->cekUsername();
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('users/receptionis/info_berita/tambah_berita', $data);
			$this->load->view('templates/footer');	
		} else {
			$this->m_data->tambahBerita();
			$this->session->set_flashdata('message', 'Ditambahkan');
			redirect('receptionis/info_berita');
		}
	}

	public function ubah_berita($id_berita)
	{
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required');
		$this->form_validation->set_rules('isi_berita', 'Isi Berita', 'trim|required');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Info Berita';
			$data['users'] = $this->m_data->cekUsername();
			$data['j_berita']= $this->m_data->getBeritaById($id_berita);
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('users/receptionis/info_berita/ubah_berita', $data);
			$this->load->view('templates/footer');	
		} else {
			$this->m_data->ubahBerita();
			$this->session->set_flashdata('message', 'Diubah');
			redirect('receptionis/info_berita');
		}
	}

	public function hapus_berita($id_berita)
	{
		$this->m_data->hapusBerita($id_berita);
		$this->session->set_flashdata('message', 'Dihapus');
		redirect('receptionis/info_berita');
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
			$this->load->view('users/receptionis/password/ganti_password', $data);
			$this->load->view('templates/footer');
		} else {
			$password_lama = $this->input->post('password_lama');
			$password_baru = $this->input->post('password1');
			if (!password_verify($password_lama, $data['users']['password'])) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password lama <strong>Tidak</strong> 
				sesuai didatabase! </div>');
				redirect('receptionis/ganti_password');
			} else {
				if ($password_lama == $password_baru) {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password baru <strong>Tidak boleh sama</strong> dengan password lama! </div>');
					redirect('receptionis/ganti_password');
				} else {
					// password sudah ok
					$password_hash = password_hash($password_baru, PASSWORD_DEFAULT);

					$this->db->set('password', $password_hash);
					$this->db->where('username', $this->session->userdata('username'));	
					$this->db->update('tb_users');

					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password <strong>Berhasil</strong> Ubah! </div>');
					redirect('receptionis/ganti_password');
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
			$this->load->view('users/receptionis/password/ubah_profil', $data);
			$this->load->view('templates/footer');
		} else {
			$this->m_data->ubahUsers();
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Profil <strong>berhasil</strong> diubah! </div>');
			redirect('receptionis/ganti_password');
		}
	}

}
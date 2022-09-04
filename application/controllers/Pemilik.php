 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemilik extends CI_Controller 
{
	public function __construct()
	{
		parent:: __construct();
		cek_login();
		$this->load->model(['m_data','m_pemilik','m_pasien']);
		$this->load->library('form_validation');
		$this->load->library('pagination');
	}

	public function index($id_level_user = 5)
	{
		$data['title'] = 'Dashboard';
		$data['users'] = $this->m_data->cekUsername();
		$data['DetAntrian']= $this->m_data->tampilDetAntri($id_level_user);
		$data['tes']          = $this->m_pasien->cek();
		$data['bulan6'] = $this->m_pemilik->tampilJun();
		$data['bulan7'] = $this->m_pemilik->tampilJul();
		$data['bulan8'] = $this->m_pemilik->tampilAgus();
		$data['bulan9'] = $this->m_pemilik->tampilSep();
		$data['bulan10'] = $this->m_pemilik->tampilOkt();
		$data['bulan11'] = $this->m_pemilik->tampilNov();
		$data['bulan12'] = $this->m_pemilik->tampilDes();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('users/pemilik/dashboard', $data);
		$this->load->view('templates/footer');
	}

	public function harga_periksa()
	{
		$data['title'] = 'Harga Periksa';
		$data['users'] = $this->m_data->cekUsername();
		$data['harga'] = $this->m_pemilik->tampilHarga();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('users/pemilik/harga_periksa/harga_periksa', $data);
		$this->load->view('templates/footer');
	}

	public function tambah_harga()
	{
		$this->form_validation->set_rules('jenis_periksa', 'Jenis Periksa', 'trim|required');
		$this->form_validation->set_rules('harga', 'Harga', 'trim|required|numeric');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Harga Periksa';
			$data['users'] = $this->m_data->cekUsername();
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('users/pemilik/harga_periksa/tambah_harga', $data);
			$this->load->view('templates/footer');	
		} else {
			$this->m_pemilik->tambahHarga();
			$this->session->set_flashdata('message', 'Ditambahkan');
			redirect('pemilik/harga_periksa');
		}
	}

	public function ubah_harga($id_harga_periksa)
	{
		$this->form_validation->set_rules('jenis_periksa', 'Jenis Periksa', 'trim|required');
		$this->form_validation->set_rules('harga', 'Harga', 'trim|required|numeric');

		if ($this->form_validation->run() == false) {
			$data['title']  = 'Harga Periksa';
			$data['users']  = $this->m_data->cekUsername();
			$data['j_harga']= $this->m_pemilik->getHargaById($id_harga_periksa);
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('users/pemilik/harga_periksa/ubah_harga', $data);
			$this->load->view('templates/footer');	
		} else {
			$this->m_pemilik->ubahHarga();
			$this->session->set_flashdata('message', 'Diubah');
			redirect('pemilik/harga_periksa');
		}
	}

	public function hapus_harga($id_harga_periksa)
	{
		$this->m_pemilik->hapusHarga($id_harga_periksa);
		$this->session->set_flashdata('message', 'Dihapus');
		redirect('pemilik/harga_periksa');
	}

	public function data_obat()
	{
		$data['title'] = 'Data Obat';
		$data['users'] = $this->m_data->cekUsername();
		$data['t_obat'] = $this->m_pemilik->tampilObat();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('users/pemilik/data_obat/data_obat', $data);
		$this->load->view('templates/footer');
	}

	// public function tambah_data_obat()
	// {
	// 	$this->form_validation->set_rules('nama_obat', 'Nama Obat', 'trim|required');
	// 	$this->form_validation->set_rules('stock', 'Stok', 'trim|required|numeric');
	// 	$this->form_validation->set_rules('satuan', 'Satuan', 'trim|required');
	// 	$this->form_validation->set_rules('harga', 'Harga', 'trim|required|numeric');
	// 	$this->form_validation->set_rules('expired', 'Expired', 'trim|required');

	// 	if ($this->form_validation->run() == false) {
	// 		$data['title'] = 'Data Obat';
	// 		$data['users'] = $this->m_data->cekUsername();
	// 		$this->load->view('templates/header', $data);
	// 		$this->load->view('templates/sidebar', $data);
	// 		$this->load->view('templates/topbar', $data);
	// 		$this->load->view('users/pemilik/data_obat/tambah_data_obat', $data);
	// 		$this->load->view('templates/footer');	
	// 	} else {
	// 		$this->m_pemilik->tambahDataObat();
	// 		$this->session->set_flashdata('message', 'Ditambahkan');
	// 		redirect('pemilik/data_obat');
	// 	}
	// }

	// public function ubah_data_obat($id_obat)
	// {
	// 	$this->form_validation->set_rules('nama_obat', 'Nama Obat', 'trim|required');
	// 	$this->form_validation->set_rules('stock', 'Stok', 'trim|required|numeric');
	// 	$this->form_validation->set_rules('satuan', 'Satuan', 'trim|required');
	// 	$this->form_validation->set_rules('harga', 'Harga', 'trim|required|numeric');
	// 	$this->form_validation->set_rules('expired', 'Expired', 'trim|required');

	// 	if ($this->form_validation->run() == false) {
	// 		$data['title'] = 'Data Obat';
	// 		$data['users'] = $this->m_data->cekUsername();
	// 		$data['j_obat']= $this->m_pemilik->getObatById($id_obat);
	// 		$this->load->view('templates/header', $data);
	// 		$this->load->view('templates/sidebar', $data);
	// 		$this->load->view('templates/topbar', $data);
	// 		$this->load->view('users/pemilik/data_obat/ubah_data_obat', $data);
	// 		$this->load->view('templates/footer');	
	// 	} else {
	// 		$this->m_pemilik->ubahDataObat();
	// 		$this->session->set_flashdata('message', 'Diubah');
	// 		redirect('pemilik/data_obat');
	// 	}
	// }

	// public function hapus_data_obat($id_obat)
	// {
	// 	$this->m_pemilik->hapusDataObat($id_obat);
	// 	$this->session->set_flashdata('message', 'Dihapus');
	// 	redirect('pemilik/data_obat');
	// }

	public function laporan_periksa()
	{
		$data['title'] = 'Laporan Periksa';
		$data['users'] = $this->m_data->cekUsername();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('users/pemilik/laporan_periksa/tampil_laporan', $data);
		$this->load->view('templates/footer');
	}

	public function DetLaporan($tgl)
	{
		$data['DetLaporan'] = $this->m_pemilik->DetLaporan($tgl);
		$data['TotUang']	= $this->m_pemilik->TotalUang($tgl);
		$data['tgl'] = $tgl;
		$this->load->view('users/pemilik/laporan_periksa/Det_laporan', $data);
	}

	public function Cetak_LapPeriksa($tgl)
	{
		$data['DetLaporan'] = $this->m_pemilik->DetLaporan($tgl);
		$data['tgl'] = $tgl;
		$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);
		$data = $this->load->view('users/pemilik/laporan_periksa/Cetak_tgl', $data, TRUE);
		$mpdf->WriteHTML($data);
		$mpdf->Output('cetak_laporan_periksa/'.$tgl.'.pdf','I');
	}

	public function Periode()
	{
		$this->load->view('users/pemilik/laporan_periksa/Cetak_periode');
	}

	public function Cetak_Periode()
	{
		$tgl1 = $this->input->post('tanggal_a');
		$tgl2 = $this->input->post('tanggal_b');

		$data['tgl1'] = $tgl1;
		$data['tgl2'] = $tgl2;
		$data['periode'] = $this->m_pemilik->Periode($tgl1, $tgl2);
		$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);
		$data = $this->load->view('users/pemilik/laporan_periksa/Cetak_detPeriode', $data, TRUE);
		$mpdf->WriteHTML($data);
		$mpdf->Output('laporan_periksa_pada_periode/'.$tgl.'.pdf','I');
	}

	public function laporan_obat()
	{
		$data['title'] = 'Laporan Obat';
		$data['users'] = $this->m_data->cekUsername();
		$data['obat']  = $this->m_pemilik->tampilAdmObat();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('users/pemilik/laporan_obat/laporan_obat', $data);
		$this->load->view('templates/footer');
	}

	public function DetLaporanObt($tgll)
	{
		$data['DetLaporanObt'] = $this->m_pemilik->DetLaporanObt($tgll);
		$data['TotUangObat']   = $this->m_pemilik->TotalUangObat($tgll);
		$data['tgll'] = $tgll;
		$this->load->view('users/pemilik/laporan_obat/Det_laporan_Obt', $data);
	}

	public function Cetak_LapObat($tgll)
	{
		$data['DetLaporanObt'] = $this->m_pemilik->DetLaporanObt($tgll);
		$data['tgll'] = $tgll;
		$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);
		$data = $this->load->view('users/pemilik/laporan_obat/Cetak_tgll', $data, TRUE);
		$mpdf->WriteHTML($data);
		$mpdf->Output('cetak_laporan_periksa/'.$tgl.'.pdf','I');
	}


	public function Periode_Obat()
	{
		$this->load->view('users/pemilik/laporan_obat/Cetak_periode_obat');
	}

	public function Cetak_periode_obat()
	{
		$tgl1 = $this->input->post('tanggal_a');
		$tgl2 = $this->input->post('tanggal_b');

		$data['tgl1'] = $tgl1;
		$data['tgl2'] = $tgl2;
		$data['periode'] = $this->m_pemilik->PeriodeObat($tgl1, $tgl2);
		$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);
		$data = $this->load->view('users/pemilik/laporan_obat/Cetak_detPeriode_obat', $data, TRUE);
		$mpdf->WriteHTML($data);
		$mpdf->Output('laporan_obat_pada_periode/'.$tgl1. 'sampai' .$tgl2.'.pdf','I');
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
			$this->load->view('users/pemilik/password/ganti_password', $data);
			$this->load->view('templates/footer');
		} else {
			$password_lama = $this->input->post('password_lama');
			$password_baru = $this->input->post('password1');
			if (!password_verify($password_lama, $data['users']['password'])) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password lama <strong>Tidak</strong> 
				sesuai didatabase! </div>');
				redirect('pemilik/ganti_password');
			} else {
				if ($password_lama == $password_baru) {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password baru <strong>Tidak boleh sama</strong> dengan password lama! </div>');
					redirect('pemilik/ganti_password');
				} else {
					// password sudah ok
					$password_hash = password_hash($password_baru, PASSWORD_DEFAULT);

					$this->db->set('password', $password_hash);
					$this->db->where('username', $this->session->userdata('username'));	
					$this->db->update('tb_users');

					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password <strong>Berhasil</strong> Ubah! </div>');
					redirect('pemilik/ganti_password');
				}
			}
		}
	}

	public function ubah_profil($id_users){

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
			$this->load->view('users/pemilik/password/ubah_profil', $data);
			$this->load->view('templates/footer');
		} else {
			$this->m_data->ubahUsers();
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Profil <strong>berhasil</strong> diubah! </div>');
			redirect('pemilik/ganti_password');
		}
	}

	public function password_diganti()
	{
		echo "password sudah di ganti";
		// $data['title'] = 'Ganti Password';
		// $data['users'] = $this->m_data->cekUsername();
		// $this->load->view('templates/header', $data);
		// $this->load->view('templates/sidebar', $data);
		// $this->load->view('templates/topbar', $data);
		// $this->load->view('users/pemilik/ganti_password', $data);
		// $this->load->view('templates/footer');
	}

}
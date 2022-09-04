<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('m_data');
	}

	public function index ()
	{
		cek_logout();
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Login';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/login');
			$this->load->view('templates/auth_footer');	
		} else {
			// jika validasinya sukses
			$this->_login();
		}	

	}

	private function _login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$user = $this->m_data->cekLogin($username);
		
		if ($user) {
			//User Sudah Terdaftar
			//Cek Passsword
			if (password_verify($password, $user['password'])) {
				$data = [
					'username' 		=> $user['username'],
					'id_level_user' => $user['id_level_user']
				];
				$this->session->set_userdata($data);

					   if ($user['id_level_user'] == 1 ) {
					redirect('Receptionis');
				} else if ($user['id_level_user'] == 2 ) {
					redirect('Apoteker');
				} else if ($user['id_level_user'] == 3 ) {
					redirect('Dokter');
				} else if ($user['id_level_user'] == 4 ) {
					redirect('Pemilik');
				} else if ($user['id_level_user'] == 5 ) {
					redirect('Pasien');
				}

			}else{
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
				Password Tidak Sesuai!</div>');
				redirect('Auth');	
			}
		}else{
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
			User Belum Terdaftar!</div>');
			redirect('Auth');	
		}
	}

	public function registrasi ()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required|trim');
		$this->form_validation->set_rules('umur', 'Umur', 'required|numeric|trim');
		$this->form_validation->set_rules('nama_suami', 'Nama Suami', 'required|trim');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
		$this->form_validation->set_rules('telepon', 'Telepon', 'required|numeric|trim');
		$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[tb_users.username]',
			[
				'is_unique' => 'Username Sudah Pernah Terdaftar!'
			] );
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', 
			[ 
				'matches' => 'Password Tidak Sama!',
				'min_length' => 'Password Harus Diatas 3 Karakter!'
			] );
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[3]|matches[password1]');
		
		if ($this->form_validation->run() == false) {
			$data['title'] = 'Registrasi';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/registrasi');
			$this->load->view('templates/auth_footer');	
		} else {
			$this->m_data->inputUsers();
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
			Data Pasien Baru Berhasil Ditambahkan!</div>');
			redirect('Auth');
		}	
	}

	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('id_level_user');

		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
			User Berhasil Logut!</div>');
			redirect('Auth');
	}

	public function block()
	{
		$this->load->view('auth/block');
	}

	public function tes ()
	{
		echo date_default_timezone_get().'</br>' ;
		echo date('d-m-Y H:i:s').'</br>';
		date_default_timezone_set('Asia/Jakarta').'</br>';
		echo date('d-m-Y H:i:s').'</br>';
		echo date('d-m-Y H:i:s').'</br>';
		echo date('d F Y').'</br>';
		echo date('Y-m-d');
	}

}
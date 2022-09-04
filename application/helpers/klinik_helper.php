<?php

function cek_login()
{
	$ci = get_instance();
	if (!$ci->session->userdata('username')) {
		redirect('auth');
	} else {
		$id_level_user = $ci->session->userdata('id_level_user');
		$menu = $ci->uri->segment(1);

		$queryMenu = $ci->db->get_where('tb_user_menu', ['menu' => $menu])->row_array();
		$id_menu = $queryMenu['id_menu'];

		$userAccess = $ci->db->get_where('tb_user_access_menu', [
			'id_level_user' => $id_level_user,
			'id_menu'		=> $id_menu
		]);

		if ($userAccess->num_rows() < 1) {
			redirect('auth/block');
		}
	}
}

function cek_logout()
{
	$ci = get_instance();
	$user = $ci->session->userdata('id_level_user');

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
}
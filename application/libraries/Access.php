<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Access
{
	public $user;

	function __construct()
	{
		$this->CI = &get_instance();
		$this->CI->load->model('user_model');
		$this->user_model = &$this->CI->user_model;
	}


	/**
	 * proses login
	 * 0 = username tak ada
	 * 1 = sukses
	 * 2 = password salah
	 * @param unknown_type $username
	 * @param unknown_type $password
	 * @return boolean
	 */
	// function login($username, $password)
	// {
	// 	$result = $this->user_model->get_login_info($username);
	// 	if ($result) {
	// 		$password = md5($password);
	// 		if ($password === $result->password) {
	// 			$this->CI->session->set_userdata('id_user', $result->id_user);
	// 			$this->CI->session->set_userdata('username', $result->username);
	// 			return 1;
	// 		} else {
	// 			return 2;
	// 		}
	// 	}
	// 	return 0;
	// }

	/**
	 * cek apakah sudah login
	 * @return boolean
	 */
	// function is_login()
	// {
	// 	return (($this->CI->session->userdata('user')) ? TRUE : FALSE);
	// }

	/*
	 * Cek akses kode_menu
	 */
	function cek_akses($kode_menu)
	{
		$id_user = $this->CI->session->userdata('id_user');
		if ($this->user_model->cek_akses($id_user) > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	/**
	 * cek akses crud
	 * tipe : 0 = add
	 * tipe : 1 = edit
	 */
	function cek_akses_crud($kode_menu, $tipe)
	{
		$level = $this->CI->session->userdata('user_level');

		if ($this->user_model->cek_akses_crud($kode_menu, $level, $tipe) > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}


	function get_id()
	{
		return $this->CI->session->userdata('id_user');
	}

	function get_username()
	{
		return $this->CI->session->userdata('username');
	}

	function get_level()
	{
		return $this->CI->session->userdata('user_level');
	}


	/**
	 * logout
	 */
	function logout()
	{
		$this->CI->session->unset_userdata('id_user');
		$this->CI->session->unset_userdata('username');
	}
}

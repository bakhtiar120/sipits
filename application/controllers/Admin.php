<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->db = $this->load->database('default', true);
		$this->load->model(array('admin_model', 'kp_model', 'user_model'));
		if ($this->user_model->isNotLogin()) redirect(site_url('login'));
	}

	public function index()
	{
		$data['data'] = $this->kp_model->get_kp_all();
		$this->template->display_admin('dashboard', 'Dashboard', $data);
	}

	public function detail($id = 0)
	{
		$data = $this->kp_model->get_kp_by_id($id);
		$this->template->display_admin('detail', 'Detail', $data[0]);
	}
}

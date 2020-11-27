<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Template
{
	protected $_ci;

	function __construct()
	{
		$this->_ci = &get_instance();
		$this->_ci->load->library('access');
		$this->_ci->load->model('user_model');
	}

	function display_admin($file_name, $title, $data = null)
	{
		$data['kode_menu'] = $this->_ci->uri->segment(1);
		$data['sidemenu'] = $this->_ci->user_model->get_menu($data['kode_menu'], $this->_ci->access->get_id());;
		$data['title'] = $title;
		// echo "<pre>";
		// print_r($data['sidemenu']);
		// echo "</pre>";
		$this->_ci->load->view('admin/' . $file_name, $data);
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('default', true);
        $this->load->model(array('admin_model', 'kp_model'));
    }

	public function index()
	{

		$data['data'] = $this->kp_model->get_kp_all();

		//print_r($data);



		$this->load->view('admin/dashboard', $data);
	}

	public function detail($id = 0)
	{
		//print_r($id);
		$data = $this->kp_model->get_kp_by_id($id);
		
		//print_r($data[0]);
		$this->load->view('admin/detail', $data[0]);

	}


}

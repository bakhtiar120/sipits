<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('default', true);
        $this->load->model(array('kp_model','pap_model'));
    }


	public function index()
	{
		//redirect('landing_page');
		echo "asdsad";
	}

	public function daftar_pap()
	{
		//redirect('landing_page');
		if($this->input->post()){

			$data = $this->input->post();
			$data['status'] = 0;
			$data['tanggal_submit'] = date("yy-m-d");
			//print_r($data);

			$folder="uploads/pap/";

			//print_r($_FILES['pernyataan']['name']);

			$file = rand(1000,100000)."-".$_FILES['pernyataan']['name'];
		    $file_loc = $_FILES['pernyataan']['tmp_name'];
			$file_size = $_FILES['pernyataan']['size'];
			$file_type = $_FILES['pernyataan']['type'];
			
			$data['pernyataan'] = $file;

			move_uploaded_file($file_loc,$folder.$file);
			
			$file = rand(1000,100000)."-".$_FILES['ktp']['name'];
		    $file_loc = $_FILES['ktp']['tmp_name'];
			$file_size = $_FILES['ktp']['size'];
			$file_type = $_FILES['ktp']['type'];

			move_uploaded_file($file_loc,$folder.$file);

			$data['ktp'] = $file;

			$this->pap_model->tambah_pap($data);
		

		} else {
			$this->load->view('daftar_pap');
		}
	}

	public function daftar_kp()
	{

		//redirect('landing_page');

		if($this->input->post()){

			$data = $this->input->post();
			$data['status'] = 0;
			$data['tanggal_submit'] = date("yy-m-d");
			
			$folder="uploads/kp/";


			$file = rand(1000,100000)."-".$_FILES['proposal']['name'];
		    $file_loc = $_FILES['proposal']['tmp_name'];
			$file_size = $_FILES['proposal']['size'];
			$file_type = $_FILES['proposal']['type'];
			
			$data['proposal'] = $file;

			move_uploaded_file($file_loc,$folder.$file);
			
			$file = rand(1000,100000)."-".$_FILES['mou']['name'];
		    $file_loc = $_FILES['mou']['tmp_name'];
			$file_size = $_FILES['mou']['size'];
			$file_type = $_FILES['mou']['type'];

			move_uploaded_file($file_loc,$folder.$file);

			$data['mou'] = $file;


			$file = rand(1000,100000)."-".$_FILES['moa']['name'];
		    $file_loc = $_FILES['moa']['tmp_name'];
			$file_size = $_FILES['moa']['size'];
			$file_type = $_FILES['moa']['type'];

			move_uploaded_file($file_loc,$folder.$file);

			$data['moa'] = $file;

			//print_r($data);

			$this->kp_model->tambah_kp($data);
		} else {
			$this->load->view('daftar_kp');
		}
	}

	public function daftar_kmpi()
	{
		//redirect('landing_page');
		if($this->input->post()){

			$data = $this->input->post();
			$data['status'] = 0;
			$data['tanggal_submit'] = date("d-m-yy");
			print_r($data);

		} else {
			$this->load->view('daftar_kmpi');
		}
	}

	public function daftar_p3i()
	{
		//redirect('landing_page');
		if($this->input->post()){

			$data = $this->input->post();
			$data['status'] = 0;
			$data['tanggal_submit'] = date("d-m-yy");
			print_r($data);

		} else {
			$this->load->view('daftar_p3i');
		}
	}
}

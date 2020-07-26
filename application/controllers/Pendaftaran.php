<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendaftaran extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->db = $this->load->database('default', true);
		$this->load->model(array('kp_model', 'pap_model', 'kmpi_model'));
	}


	public function index()
	{
		//redirect('landing_page');
		echo "asdsad";
	}

	public function daftar_pap()
	{
		//redirect('landing_page');
		if ($this->input->post()) {

			$data = $this->input->post();
			$data['status'] = 0;
			$data['tanggal_submit'] = date("yy-m-d");
			//print_r($data);

			$folder = "uploads/pap/";

			//print_r($_FILES['pernyataan']['name']);

			$file = rand(1000, 100000) . "-" . $_FILES['pernyataan']['name'];
			$file_loc = $_FILES['pernyataan']['tmp_name'];
			$file_size = $_FILES['pernyataan']['size'];
			$file_type = $_FILES['pernyataan']['type'];

			$data['pernyataan'] = $file;

			move_uploaded_file($file_loc, $folder . $file);

			$file = rand(1000, 100000) . "-" . $_FILES['ktp']['name'];
			$file_loc = $_FILES['ktp']['tmp_name'];
			$file_size = $_FILES['ktp']['size'];
			$file_type = $_FILES['ktp']['type'];

			move_uploaded_file($file_loc, $folder . $file);

			$data['ktp'] = $file;

			$this->pap_model->tambah_pap($data);
		} else {
			$this->load->view('daftar_pap');
		}
	}

	public function daftar_kp()
	{

		//redirect('landing_page');

		if ($this->input->post()) {

			$data = $this->input->post();
			$data['status'] = 0;
			$data['tanggal_submit'] = date("yy-m-d");

			$folder = "uploads/kp/";


			$file = rand(1000, 100000) . "-" . $_FILES['proposal']['name'];
			$file_loc = $_FILES['proposal']['tmp_name'];
			$file_size = $_FILES['proposal']['size'];
			$file_type = $_FILES['proposal']['type'];

			$data['proposal'] = $file;

			move_uploaded_file($file_loc, $folder . $file);

			$file = rand(1000, 100000) . "-" . $_FILES['mou']['name'];
			$file_loc = $_FILES['mou']['tmp_name'];
			$file_size = $_FILES['mou']['size'];
			$file_type = $_FILES['mou']['type'];

			move_uploaded_file($file_loc, $folder . $file);

			$data['mou'] = $file;


			$file = rand(1000, 100000) . "-" . $_FILES['moa']['name'];
			$file_loc = $_FILES['moa']['tmp_name'];
			$file_size = $_FILES['moa']['size'];
			$file_type = $_FILES['moa']['type'];

			move_uploaded_file($file_loc, $folder . $file);

			$data['moa'] = $file;

			//print_r($data);

			$this->kp_model->tambah_kp($data);
			/*
			$this->load->library('email');

		$config['protocol']    = 'smtp';
		$config['smtp_host']    = 'ssl://smtp.gmail.com';
		$config['smtp_port']    = '465';
		$config['smtp_timeout'] = '7';
		$config['smtp_user']    = 'email';
		$config['smtp_pass']    = 'password';
		$config['charset']    = 'utf-8';
		$config['newline']    = "\r\n";
		$config['mailtype'] = 'text'; // or html
		$config['validation'] = TRUE; // bool whether to validate email or not      

		$this->email->initialize($config);

		$this->email->from('bakhtiarhanafi@gmail.com', 'Bakhtiar');
		$this->email->to('bakhtiarmochamad@gmail.com');
		$this->email->subject('Email Test');
		$this->email->message('Testing the email class.');

		$this->email->send();

		echo $this->email->print_debugger();
			*/
		} else {
			$this->load->view('daftar_kp');
		}
	}

	public function daftar_kmpi()
	{
		if ($this->input->post()) {

			$data = $this->input->post();
			$data['status'] = 0;
			$data['tanggal_submit'] = date("yy-m-d");

			$folder = "uploads/kmpi/";


			$file = rand(1000, 100000) . "-" . $_FILES['draft_publikasi']['name'];
			$file_loc = $_FILES['draft_publikasi']['tmp_name'];
			$file_size = $_FILES['draft_publikasi']['size'];
			$file_type = $_FILES['draft_publikasi']['type'];

			$data['draft_publikasi'] = $file;

			move_uploaded_file($file_loc, $folder . $file);

			$file = rand(1000, 100000) . "-" . $_FILES['luaran_publikasi']['name'];
			$file_loc = $_FILES['luaran_publikasi']['tmp_name'];
			$file_size = $_FILES['luaran_publikasi']['size'];
			$file_type = $_FILES['luaran_publikasi']['type'];

			move_uploaded_file($file_loc, $folder . $file);

			$data['luaran_publikasi'] = $file;


			$file = rand(1000, 100000) . "-" . $_FILES['mou_publikasi']['name'];
			$file_loc = $_FILES['mou_publikasi']['tmp_name'];
			$file_size = $_FILES['mou_publikasi']['size'];
			$file_type = $_FILES['mou_publikasi']['type'];

			move_uploaded_file($file_loc, $folder . $file);

			$data['mou_publikasi'] = $file;

			$simpan = $this->kmpi_model->tambah_kmpi($data);
			if ($simpan == 1) {
				$this->session->set_flashdata('hasil', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-warning"></i> Alert!</h4>Warning alert preview. This alert is dismissable.</div>');
			} else {
				$this->session->set_flashdata('hasil', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Alert!</h4>Success alert preview. This alert is dismissable.</div>');
			}
			redirect('pendaftaran/daftar_kmpi');
		} else {
			$this->load->view('daftar_kmpi');
		}
	}

	public function daftar_p3i()
	{
		//redirect('landing_page');
		if ($this->input->post()) {

			$data = $this->input->post();
			$data['status'] = 0;
			$data['tanggal_submit'] = date("d-m-yy");
			print_r($data);
		} else {
			$this->load->view('daftar_p3i');
		}
	}

	public function cekDosen()
	{
		$nidn = $this->input->post("nidn");
		$data["dosen"] = $this->kmpi_model->get_dosen($nidn);
		$dosen = json_encode($data["dosen"], true);
		print_r($dosen);
	}
}

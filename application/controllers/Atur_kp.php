<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Atur_kp extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('default', true);
        $this->load->model(array('admin_model','kp_model'));
    }

	public function index($temp1 = "", $temp2 = "")
	{

		$data['data'] = $this->kp_model->get_kp_all();
		$data['temp'] = $temp1." ".$temp2;

		$this->load->view('admin/atur_kp', $data);
	}

	public function detail($id = 0)
	{
		//print_r($id);
		$data = $this->kp_model->get_kp_by_id($id);
		
		//print_r($data[0]);
		$this->load->view('admin/detail_kp', $data[0]);

	}

	public function edit($id_kp = 0)
	{
	
		$data = $this->kp_model->get_kp_by_id($id_kp);

		$this->load->view('admin/edit_kp', $data[0]);
	}

	public function update_data($id_kp = 0)
	{

		$data = $this->input->post();

		//print_r($data);

		$folder="uploads/kp/";

		//print_r($_FILES['proposal']);

		if($_FILES['proposal']['name'])
		{
			$file = rand(1000,100000)."-".$_FILES['proposal']['name'];
		    $file_loc = $_FILES['proposal']['tmp_name'];
			$file_size = $_FILES['proposal']['size'];
			$file_type = $_FILES['proposal']['type'];
			
			move_uploaded_file($file_loc,$folder.$file);
			$data['proposal'] = $file;

		}
			
		if($_FILES['mou']['name'])
		{
			$file = rand(1000,100000)."-".$_FILES['mou']['name'];
		    $file_loc = $_FILES['mou']['tmp_name'];
			$file_size = $_FILES['mou']['size'];
			$file_type = $_FILES['mou']['type'];

			move_uploaded_file($file_loc,$folder.$file);
			$data['mou'] = $file;
		}

		if($_FILES['mou']['name'])
		{
			$file = rand(1000,100000)."-".$_FILES['moa']['name'];
		    $file_loc = $_FILES['moa']['tmp_name'];
			$file_size = $_FILES['moa']['size'];
			$file_type = $_FILES['moa']['type'];

			move_uploaded_file($file_loc,$folder.$file);

			$data['moa'] = $file;
		}
		
		
		$hasil = $this->kp_model->update_kp($id_kp, $data);

		if($hasil == 0)
		{
			$temp1 = "Gagal";
		}
		else
		{
			$temp1 = "Berhasil";
		}
		$temp2 = "Diperbarui";

		redirect('atur_kp/index/'.$temp1.'/'.$temp2);
		
	}

	public function update_status($id_kp = 0, $status = 0)
	{
		$data = $this->kp_model->get_kp_by_id($id_kp);
		$hasil = $this->kp_model->update_status_kp($id_kp, $status);

		if($hasil == 0)
		{
			$temp1 = "Gagal";
		}
		else
		{
			$temp1 = "Berhasil";
			if ($status == 1) {
				$this->send_email($data[0]['email'], "Usulan KP Anda sedang direview");
			} else if ($status == 2) {
				$this->send_email($data[0]['email'], "Usulan KP Anda harus Revisi");
			} else if ($status == 3) {
				$this->send_email($data[0]['email'], "Usulan KP Anda ditolak");
			} else if ($status == 4) {
				$this->send_email($data[0]['email'], "Usulan KP Anda berhasil diterima");
			}
		}
		$temp2 = "Diperbarui";

		redirect('atur_kp/index/'.$temp1.'/'.$data['email']);
	}

	public function send_email($email, $pesan)
	{
		$this->load->library('email');

		$config['protocol']    = 'smtp';
		$config['smtp_host']    = 'ssl://smtp.gmail.com';
		$config['smtp_port']    = '465';
		$config['smtp_timeout'] = '7';
		$config['smtp_user']    = 'bakhtiarhanafi@gmail.com';
		$config['smtp_pass']    = '';
		$config['charset']    = 'utf-8';
		$config['newline']    = "\r\n";
		$config['mailtype'] = 'text'; // or html
		$config['validation'] = TRUE; // bool whether to validate email or not      

		$this->email->initialize($config);

		$this->email->from('bakhtiarhanafi@gmail.com', 'Bakhtiar');
		$this->email->to('bakhtiarmochamad@gmail.com');
		$this->email->subject('Email Test');
		$this->email->message($pesan);

		$this->email->send();
	}

	public function hapus($id = 0)
	{
		$hasil = $this->kp_model->hapus_kp($id);

		//printf($data);
		//redirect('atur_kp');
		if($hasil == 0)
		{
			$temp1 = "Gagal";
		}
		else
		{
			$temp1 = "Berhasil";
		}
		$temp2 = "Dihapus";

		redirect('atur_kp/index/'.$temp1.'/'.$temp2);
	}
}

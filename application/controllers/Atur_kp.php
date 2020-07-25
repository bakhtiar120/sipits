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
		$hasil = $this->kp_model->update_status_kp($id_kp, $status);

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

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Atur_pap extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('default', true);
        $this->load->model(array('admin_model','pap_model'));
    }

	public function index($temp1 = "", $temp2 = "")
	{

		$data['data'] = $this->pap_model->get_pap_all();
		$data['temp'] = $temp1." ".$temp2;

		$this->load->view('admin/atur_pap', $data);
	}

	public function detail($id = 0)
	{
		//print_r($id);
		$data = $this->pap_model->get_pap_by_id($id);
		
		//print_r($data[0]);
		$this->load->view('admin/detail_pap', $data[0]);

	}

	public function edit($id_pap = 0)
	{
	
		$data = $this->pap_model->get_pap_by_id($id_pap);

		$this->load->view('admin/edit_pap', $data[0]);
	}

	public function update_data($id_pap = 0)
	{

		$data = $this->input->post();

		//print_r($data);

		$folder="uploads/pap/";

		//print_r($_FILES['pernyataan']);

		if($_FILES['pernyataan']['name'])
		{
			$file = rand(1000,100000)."-".$_FILES['pernyataan']['name'];
		    $file_loc = $_FILES['pernyataan']['tmp_name'];
			$file_size = $_FILES['pernyataan']['size'];
			$file_type = $_FILES['pernyataan']['type'];
			
			move_uploaded_file($file_loc,$folder.$file);
			$data['pernyataan'] = $file;

		}
			
		if($_FILES['ktp']['name'])
		{
			$file = rand(1000,100000)."-".$_FILES['ktp']['name'];
		    $file_loc = $_FILES['ktp']['tmp_name'];
			$file_size = $_FILES['ktp']['size'];
			$file_type = $_FILES['ktp']['type'];

			move_uploaded_file($file_loc,$folder.$file);
			$data['ktp'] = $file;
		}	
		
		$hasil = $this->pap_model->update_pap($id_pap, $data);

		if($hasil == 0)
		{
			$temp1 = "Gagal";
		}
		else
		{
			$temp1 = "Berhasil";
		}
		$temp2 = "Diperbarui";

		redirect('atur_pap/index/'.$temp1.'/'.$temp2);
		
	}

	public function update_status($id_pap = 0, $status = 0)
	{
		$hasil = $this->pap_model->update_status_pap($id_pap, $status);

		if($hasil == 0)
		{
			$temp1 = "Gagal";
		}
		else
		{
			$temp1 = "Berhasil";
		}
		$temp2 = "Diperbarui";

		redirect('atur_pap/index/'.$temp1.'/'.$temp2);
	}

	public function hapus($id = 0)
	{
		$hasil = $this->pap_model->hapus_pap($id);

		//printf($data);
		//redirect('atur_pap');
		if($hasil == 0)
		{
			$temp1 = "Gagal";
		}
		else
		{
			$temp1 = "Berhasil";
		}
		$temp2 = "Dihapus";

		redirect('atur_pap/index/'.$temp1.'/'.$temp2);
	}
}

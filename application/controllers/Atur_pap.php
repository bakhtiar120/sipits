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
		$total_honor = $data['total_honor'];
		$data['total_honor'] = preg_replace('/\D/', '', $total_honor);
		$jumlah_hibah = $data['jumlah_hibah'];
		$data['jumlah_hibah'] = preg_replace('/\D/', '', $jumlah_hibah);
		$honor = $data['honor'];
		$data['honor'] = preg_replace('/\D/', '', $honor);

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
			$this->session->set_flashdata(
				'hasil_pap',
				'<div class="alert alert-warning alert-dismissible col-12">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-exclamation-triangle"></i> Gagal!</h5>
                  Data Pengusul Penyelenggaraan Asisten Peneliti gagal update data.
                </div>'
			);
		}
		else
		{
			$this->session->set_flashdata(
				'hasil_pap',
				'<div class="alert alert-success col-12">
		      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		      <h5><i class="icon fa fa-check"></i> Berhasil!</h5>
		       Data Pengusul Penyelenggaraan Asisten Peneliti berhasil update data.
		    </div>'
			);
		}
		$temp2 = "Diperbarui";

		redirect('atur_pap/index/');
		
	}

	public function update_status($id_pap = 0, $status = 0)
	{
		$data = $this->pap_model->get_pap_by_id($id_pap);
		$hasil = $this->pap_model->update_status_pap($id_pap, $status);

		if($hasil == 0)
		{
			$temp1 = "Gagal";
		}
		else
		{
			$temp1 = "Berhasil";
			if ($status == 1) {
				$this->send_email($data[0]['email_ketua'], "Usulan PAP Anda sedang direview");
				$this->session->set_flashdata(
					'hasil_pap',
					'<div class="alert alert-success col-12">
		      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		      <h5><i class="icon fa fa-check"></i> Berhasil!</h5>
		      Proses Update Status (Review) Usulan PAP Berhasil.
		    </div>'
				);
			}
			else if ($status == 2) {
				$this->send_email($data[0]['email_ketua'], "Usulan PAP Anda harus Revisi");
				$this->session->set_flashdata(
					'hasil_kp',
					'<div class="alert alert-success col-12">
		      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		      <h5><i class="icon fa fa-check"></i> Berhasil!</h5>
		      Proses Update Status (Revisi) Usulan PAP Berhasil.
		    </div>'
				);
			}
			else if ($status == 3) {
				$this->send_email($data[0]['email_ketua'], "Usulan PAP Anda ditolak");
				$this->session->set_flashdata(
					'hasil_pap',
					'<div class="alert alert-success col-12">
		      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		      <h5><i class="icon fa fa-check"></i> Berhasil!</h5>
		      Proses Update Status(ditolak) Usulan PAP Berhasil.
		    </div>'
				);
			}
			else if($status==4) {
				$this->send_email($data[0]['email_ketua'],"Usulan PAP Anda berhasil diterima");
				$this->session->set_flashdata(
					'hasil_pap',
					'<div class="alert alert-success col-12">
		      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		      <h5><i class="icon fa fa-check"></i> Berhasil!</h5>
		      Proses Update Status(diterina) Usulan PAP Berhasil.
		    </div>'
				);
			}

		}
		$temp2 = "Diperbarui";

		redirect('atur_pap/index/');
	}

	public function send_email($email,$pesan) 
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

	public function hapus()
	{
		$id=$this->input->post('id_pap');
		$hasil = $this->pap_model->hapus_pap($id);

		//printf($data);
		//redirect('atur_pap');
		if($hasil == 0)
		{
			$this->session->set_flashdata(
				'hasil_pap',
				'<div class="alert alert-warning alert-dismissible col-12">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-exclamation-triangle"></i> Gagal!</h5>
                  Data Pengusul Penyelenggaraan Asisten Peneliti gagal dihapus.
                </div>'
			);
			redirect('atur_pap/detail/' . $id);
		}
		else
		{
			$this->session->set_flashdata(
				'hasil_pap',
				'<div class="alert alert-success col-12">
		      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		      <h5><i class="icon fa fa-check"></i> Berhasil!</h5>
		       Data Pengusul Penyelenggaraan Asisten Peneliti berhasil dihapus
		    </div>'
			);
			redirect('atur_pap/index/');
		}

		
	}
}

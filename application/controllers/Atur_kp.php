<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Atur_kp extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->db = $this->load->database('default', true);
		$this->load->model(array('admin_model', 'kp_model', 'user_model'));
		if ($this->user_model->isNotLogin()) redirect(site_url('login'));
	}

	public function index($temp1 = "", $temp2 = "")
	{

		$data['data'] = $this->kp_model->get_kp_all();
		$data['temp'] = $temp1 . " " . $temp2;

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

		$folder = "uploads/kp/";
		$folder2 = "uploads/luaran/";

		//print_r($_FILES['proposal']);

		if ($_FILES['proposal']['name']) {
			$file = rand(1000, 100000) . "-" . $_FILES['proposal']['name'];
			$file_loc = $_FILES['proposal']['tmp_name'];
			$file_size = $_FILES['proposal']['size'];
			$file_type = $_FILES['proposal']['type'];

			move_uploaded_file($file_loc, $folder . $file);
			$data['proposal'] = $file;
		}

		if ($_FILES['mou']['name']) {
			$file = rand(1000, 100000) . "-" . $_FILES['mou']['name'];
			$file_loc = $_FILES['mou']['tmp_name'];
			$file_size = $_FILES['mou']['size'];
			$file_type = $_FILES['mou']['type'];

			move_uploaded_file($file_loc, $folder . $file);
			$data['mou'] = $file;
		}

		if ($_FILES['mou']['name']) {
			$file = rand(1000, 100000) . "-" . $_FILES['moa']['name'];
			$file_loc = $_FILES['moa']['tmp_name'];
			$file_size = $_FILES['moa']['size'];
			$file_type = $_FILES['moa']['type'];

			move_uploaded_file($file_loc, $folder . $file);

			$data['moa'] = $file;
		}
		if ($_FILES['luaran']['name']) {
			$file = rand(1000, 100000) . "-" . $_FILES['luaran']['name'];
			$file_loc = $_FILES['luaran']['tmp_name'];
			$file_size = $_FILES['luaran']['size'];
			$file_type = $_FILES['luaran']['type'];

			move_uploaded_file($file_loc, $folder2 . $file);

			$data['luaran'] = $file;
			$data['status_luaran'] = 1;
		}


		$hasil = $this->kp_model->update_kp($id_kp, $data);

		if ($hasil == 0) {
			$this->session->set_flashdata(
				'hasil_kp',
				'<div class="alert alert-warning alert-dismissible col-12">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-exclamation-triangle"></i> Gagal!</h5>
                  Data Pengusul Kerjasama Penelitian gagal update data.
                </div>'
			);
		} else {
			$this->session->set_flashdata(
				'hasil_kp',
				'<div class="alert alert-success col-12">
		      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		      <h5><i class="icon fa fa-check"></i> Berhasil!</h5>
		       Data Pengusul Kerjasama Penelitian berhasil update data.
		    </div>'
			);
		}
		$temp2 = "Diperbarui";

		redirect('atur_kp/index/');
	}

	public function update_status($id_kp = 0, $status = 0)
	{
		$data = $this->kp_model->get_kp_by_id($id_kp);
		$hasil = $this->kp_model->update_status_kp($id_kp, $status);

		if ($hasil == 0) {
			$this->session->set_flashdata(
				'hasil_kp',
				'<div class="alert alert-warning alert-dismissible col-12">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-exclamation-triangle"></i> Gagal!</h5>
                  Data Pengusul Kerjasama Penelitian gagal update status.
                </div>'
			);
		} else {
			if ($status == 1) {
				$this->send_email($data[0]['email'], "Usulan KP Anda sedang direview");
				$this->session->set_flashdata(
					'hasil_kp',
					'<div class="alert alert-success col-12">
		      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		      <h5><i class="icon fa fa-check"></i> Berhasil!</h5>
		      Proses Update Status (Review) Usulan KP Berhasil.
		    </div>'
				);
			} else if ($status == 2) {
				$this->send_email($data[0]['email'], "Usulan KP Anda harus Revisi");
				$this->session->set_flashdata(
					'hasil_kp',
					'<div class="alert alert-success col-12">
		      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		      <h5><i class="icon fa fa-check"></i> Berhasil!</h5>
		      Proses Update Status (revisi) usulan KP berhasil.
		    </div>'
				);
			} else if ($status == 3) {
				$this->send_email($data[0]['email'], "Usulan KP Anda ditolak");
				$this->session->set_flashdata(
					'hasil_kp',
					'<div class="alert alert-success col-12">
		      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		      <h5><i class="icon fa fa-check"></i> Berhasil!</h5>
		      Proses update status (ditolak) Usulan KP berhasil.
		    </div>'
				);
			} else if ($status == 4) {
				$this->send_email($data[0]['email'], "Usulan KP Anda berhasil diterima");
				$this->session->set_flashdata(
					'hasil_kp',
					'<div class="alert alert-success col-12">
		      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		      <h5><i class="icon fa fa-check"></i> Berhasil!</h5>
		     Proses update status(diterima) Usulan KP berhasil
		    </div>'
				);
			}
		}
		$temp2 = "Diperbarui";

		redirect('atur_kp/index/');
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

	public function hapus()
	{

		$id = $this->input->post('id_kp');
		$hasil = $this->kp_model->hapus_kp($id);
		if ($hasil == 0) {
			$this->session->set_flashdata(
				'hasil_kp',
				'<div class="alert alert-warning alert-dismissible col-12">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-exclamation-triangle"></i> Gagal!</h5>
                  Data Pengusul Kerjasama Penelitian gagal dihapus.
                </div>'
			);
			redirect('atur_kp/detail/' . $id);
		} else {
			$this->session->set_flashdata(
				'hasil_kp',
				'<div class="alert alert-success col-12">
		      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		      <h5><i class="icon fa fa-check"></i> Berhasil!</h5>
		      Data Pengusul Kerjasama Penelitian berhasil dihapus
		    </div>'
			);



			redirect('atur_kp/index/');
		}
		// $temp2 = "Dihapus";


	}
}

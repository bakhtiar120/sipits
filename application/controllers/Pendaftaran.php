<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendaftaran extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->db = $this->load->database('default', true);
		$this->load->model(array('kp_model', 'pap_model', 'kmpi_model', 'P3i_model', 'helper_model', 'bpup_model'));
		$this->load->library('form_validation');
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
			$data = $this->security->xss_clean($data);
			$total_honor = $data['total_honor'];
			$data['total_honor'] = preg_replace('/\D/', '', $total_honor);
			$jumlah_hibah = $data['jumlah_hibah'];
			$data['jumlah_hibah'] = preg_replace('/\D/', '', $jumlah_hibah);
			$honor = $data['honor'];
			$data['honor'] = preg_replace('/\D/', '', $honor);
			$data['status'] = 0;
			$data['tanggal_submit'] = date("yy-m-d");
			//print_r($data);

			$folder = "uploads/pap/";

			//print_r($_FILES['pernyataan']['name']);
			$name_file = str_replace(' ', '_', $_FILES['pernyataan']['name']);
			$file = rand(1000, 100000) . "-" . $name_file;
			$file_loc = $_FILES['pernyataan']['tmp_name'];
			$file_size = $_FILES['pernyataan']['size'];
			$file_type = $_FILES['pernyataan']['type'];

			$data['pernyataan'] = $file;

			move_uploaded_file($file_loc, $folder . $file);
			$name_file_ktp = str_replace(' ', '_', $_FILES['ktp']['name']);
			$file = rand(1000, 100000) . "-" . $name_file_ktp;
			$file_loc = $_FILES['ktp']['tmp_name'];
			$file_size = $_FILES['ktp']['size'];
			$file_type = $_FILES['ktp']['type'];

			move_uploaded_file($file_loc, $folder . $file);

			$data['ktp'] = $file;

			$simpan = $this->pap_model->tambah_pap($data);
			if ($simpan == 1) {
				$this->load->library('email');

				$config['protocol']    = 'smtp';
				$config['smtp_host']    = 'ssl://smtp.gmail.com';
				$config['smtp_port']    = '465';
				$config['smtp_timeout'] = '7';
				$config['smtp_user']    = 'drpm.its@gmail.com';
				$config['smtp_pass']    = 'drpmITS2020';
				$config['charset']    = 'utf-8';
				$config['newline']    = "\r\n";
				$config['mailtype'] = 'text'; // or html
				$config['validation'] = TRUE; // bool whether to validate email or not      

				$this->email->initialize($config);

				$this->email->from('drpm.its@gmail.com', 'SIPITS ITS');
				$this->email->to($this->input->post('email_ketua'));
				$this->email->subject('Konfirmasi Pendaftaran PAP');
				$this->email->message('Pendaftaran PAP Telah Berhasil');

				$this->session->set_flashdata('hasil', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Alert!</h4>Berhasil Melakukan Pengajuan.</div>');
			} else {
				$this->session->set_flashdata('hasil', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-warning"></i> Alert!</h4>Gagal Melakukan Pengajuan.</div>');
			}
			redirect('pendaftaran/daftar_pap');
		} else {
			$this->load->view('daftar_pap');
		}
	}

	public function daftar_kp()
	{

		//redirect('landing_page');

		if ($this->input->post()) {

			$data = $this->input->post();
			$data = $this->security->xss_clean($data);
			$data['status'] = 0;
			$data['tanggal_submit'] = date("yy-m-d");

			$folder = "uploads/kp/";
			$name_file_proposal = str_replace(' ', '_', $_FILES['proposal']['name']);
			$file = rand(1000, 100000) . "-" . $name_file_proposal;
			// $file = rand(1000, 100000) . "-" . $_FILES['proposal']['name'];
			$file_loc = $_FILES['proposal']['tmp_name'];
			$file_size = $_FILES['proposal']['size'];
			$file_type = $_FILES['proposal']['type'];

			$data['proposal'] = $file;

			move_uploaded_file($file_loc, $folder . $file);
			$name_file_mou = str_replace(' ', '_', $_FILES['mou']['name']);
			$file = rand(1000, 100000) . "-" . $name_file_mou;
			// $file = rand(1000, 100000) . "-" . $_FILES['mou']['name'];
			$file_loc = $_FILES['mou']['tmp_name'];
			$file_size = $_FILES['mou']['size'];
			$file_type = $_FILES['mou']['type'];

			move_uploaded_file($file_loc, $folder . $file);

			$data['mou'] = $file;

			$name_file_moa = str_replace(' ', '_', $_FILES['moa']['name']);
			$file = rand(1000, 100000) . "-" . $name_file_moa;
			// $file = rand(1000, 100000) . "-" . $_FILES['moa']['name'];
			$file_loc = $_FILES['moa']['tmp_name'];
			$file_size = $_FILES['moa']['size'];
			$file_type = $_FILES['moa']['type'];

			move_uploaded_file($file_loc, $folder . $file);

			$data['moa'] = $file;

			//print_r($data);

			$simpan = $this->kp_model->tambah_kp($data);
			if ($simpan == 1) {
				$this->load->library('email');

				$config['protocol']    = 'smtp';
				$config['smtp_host']    = 'ssl://smtp.gmail.com';
				$config['smtp_port']    = '465';
				$config['smtp_timeout'] = '7';
				$config['smtp_user']    = 'drpm.its@gmail.com';
				$config['smtp_pass']    = 'drpmITS2020';
				$config['charset']    = 'utf-8';
				$config['newline']    = "\r\n";
				$config['mailtype'] = 'text'; // or html
				$config['validation'] = TRUE; // bool whether to validate email or not      

				$this->email->initialize($config);

				$this->email->from('drpm.its@gmail.com', 'SIPITS ITS');
				$this->email->to($this->input->post('email'));
				$this->email->subject('Konfirmasi Pendaftaran KP');
				$this->email->message('Pendaftaran KP Telah Berhasil');

				$this->email->send();

				$this->session->set_flashdata('hasil', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Selamat!</h4>Anda Berhasil Melakukan Pengajuan,Silahkan cek email anda untuk info lebih lanjut.</div>');
			} else {
				$this->session->set_flashdata('hasil', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-warning"></i> Maaf!</h4>Gagal Melakukan Pengajuan, Silahkan cek kembali data anda.</div>');
			}
			redirect('pendaftaran/daftar_kp');
		} else {
			$this->load->view('daftar_kp');
		}
	}

	public function daftar_kmpi()
	{
		if ($this->input->post()) {



			$this->form_validation->set_rules('nama', 'Nama', 'strip_tags');
			$this->form_validation->set_rules('dept', 'Departement', 'strip_tags');
			$this->form_validation->set_rules('univ', 'Universitas', 'strip_tags');
			$this->form_validation->set_rules('alamat_kantor', 'Alamat Kantor', 'strip_tags');
			$this->form_validation->set_rules('nama_pembimbing', 'Nama Pembimbing', 'strip_tags');
			$this->form_validation->set_rules('departemen_pembimbing', 'Departemen Pembimbing', 'strip_tags');
			$this->form_validation->set_rules('fakultas_pembimbing', 'Fakultas Pembimbing', 'strip_tags');
			$this->form_validation->set_rules('judul_publikasi', 'Judul Publikasi', 'strip_tags');
			$this->form_validation->set_rules('publisher', 'Publisher', 'strip_tags');

			$data = $this->input->post();
			$data['status'] = 0;
			$data['tanggal_submit'] = date("yy-m-d");

			$folder = "uploads/kmpi/";

			$name_file_publikasi = str_replace(' ', '_', $_FILES['draft_publikasi']['name']);
			$file = rand(1000, 100000) . "-" . $name_file_publikasi;
			// $file = rand(1000, 100000) . "-" . $_FILES['draft_publikasi']['name'];
			$file_loc = $_FILES['draft_publikasi']['tmp_name'];
			$file_size = $_FILES['draft_publikasi']['size'];
			$file_type = $_FILES['draft_publikasi']['type'];

			$data['draft_publikasi'] = $file;

			move_uploaded_file($file_loc, $folder . $file);
			$name_file_luaran = str_replace(' ', '_', $_FILES['luaran_publikasi']['name']);
			$file = rand(1000, 100000) . "-" . $name_file_luaran;
			// $file = rand(1000, 100000) . "-" . $_FILES['luaran_publikasi']['name'];
			$file_loc = $_FILES['luaran_publikasi']['tmp_name'];
			$file_size = $_FILES['luaran_publikasi']['size'];
			$file_type = $_FILES['luaran_publikasi']['type'];

			move_uploaded_file($file_loc, $folder . $file);

			$data['luaran_publikasi'] = $file;

			$name_file_mou_publikasi = str_replace(' ', '_', $_FILES['mou_publikasi']['name']);
			$file = rand(1000, 100000) . "-" . $name_file_mou_publikasi;
			// $file = rand(1000, 100000) . "-" . $_FILES['mou_publikasi']['name'];
			$file_loc = $_FILES['mou_publikasi']['tmp_name'];
			$file_size = $_FILES['mou_publikasi']['size'];
			$file_type = $_FILES['mou_publikasi']['type'];

			move_uploaded_file($file_loc, $folder . $file);

			$data['mou_publikasi'] = $file;

			$simpan = $this->kmpi_model->tambah_kmpi($data);
			if ($simpan == 1) {
				$this->load->library('email');

				$config['protocol']    = 'smtp';
				$config['smtp_host']    = 'ssl://smtp.gmail.com';
				$config['smtp_port']    = '465';
				$config['smtp_timeout'] = '7';
				$config['smtp_user']    = 'drpm.its@gmail.com';
				$config['smtp_pass']    = 'drpmITS2020';
				$config['charset']    = 'utf-8';
				$config['newline']    = "\r\n";
				$config['mailtype'] = 'text'; // or html
				$config['validation'] = TRUE; // bool whether to validate email or not      

				$this->email->initialize($config);

				$this->email->from('drpm.its@gmail.com', 'SIPITS ITS');
				$this->email->to($this->input->post('email'));
				$this->email->subject('Konfirmasi Pendaftaran KMPI');
				$this->email->message('Pendaftaran KMPI Telah Berhasil');

				$this->email->send();

				$this->session->set_flashdata('hasil', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Alert!</h4>Berhasil Melakukan Pengajuan.</div>');
			} else {
				$this->session->set_flashdata('hasil', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-warning"></i> Alert!</h4>Gagal Melakukan Pengajuan.</div>');
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
			$this->form_validation->set_rules('nama', 'Nama', 'required|strip_tags');
			$this->form_validation->set_rules('departement', 'Departement', 'required|strip_tags');
			$this->form_validation->set_rules('universitas', 'Universitas', 'required|strip_tags');
			$this->form_validation->set_rules('alamat_kantor', 'Alamat Kantor', 'required|strip_tags');
			$this->form_validation->set_rules('email', 'Alamat Kantor', 'required|strip_tags');
			$this->form_validation->set_rules('hindex', 'H-Index', 'strip_tags');
			$this->form_validation->set_rules('judul1', 'Judul 1', 'required|strip_tags');
			$this->form_validation->set_rules('skema1', 'Skema 1', 'required|strip_tags');
			$this->form_validation->set_rules('sumber1', 'Sumber Pendanaan 1', 'required|strip_tags');
			$this->form_validation->set_rules('judul2', 'Judul 2', 'required|strip_tags');
			$this->form_validation->set_rules('skema2', 'Skema 2', 'required|strip_tags');
			$this->form_validation->set_rules('sumber2', 'Sumber Pendanaan 2', 'required|strip_tags');
			$this->form_validation->set_rules('judul3', 'Judul 3', 'required|strip_tags');
			$this->form_validation->set_rules('skema3', 'Skema 3', 'required|strip_tags');
			$this->form_validation->set_rules('sumber3', 'Sumber Pendanaan 3', 'required|strip_tags');

			// $data = $this->stripHTMLtags($this->input->post());
			$data = $this->input->post();
			$data['status'] = 0;
			$data['tanggal_submit'] = date("yy-m-d");

			$folder = "uploads/p3i/";

			$name_file_pernyataan_p3i = str_replace(' ', '_', $_FILES['pernyataan']['name']);
			$file = rand(1000, 100000) . "-" . $name_file_pernyataan_p3i;
			// $file = rand(1000, 100000) . "-" . $_FILES['pernyataan']['name'];
			$file_loc = $_FILES['pernyataan']['tmp_name'];
			$file_size = $_FILES['pernyataan']['size'];
			$file_type = $_FILES['pernyataan']['type'];

			$data['pernyataan'] = $file;

			move_uploaded_file($file_loc, $folder . $file);
			$name_file_draf = str_replace(' ', '_', $_FILES['draf']['name']);
			$file = rand(1000, 100000) . "-" . $name_file_draf;
			// $file = rand(1000, 100000) . "-" . $_FILES['draf']['name'];
			$file_loc = $_FILES['draf']['tmp_name'];
			$file_size = $_FILES['draf']['size'];
			$file_type = $_FILES['draf']['type'];

			move_uploaded_file($file_loc, $folder . $file);

			$data['draf'] = $file;

			$name_file_npwp = str_replace(' ', '_', $_FILES['npwp']['name']);
			$file = rand(1000, 100000) . "-" . $name_file_npwp;
			// $file = rand(1000, 100000) . "-" . $_FILES['npwp']['name'];
			$file_loc = $_FILES['npwp']['tmp_name'];
			$file_size = $_FILES['npwp']['size'];
			$file_type = $_FILES['npwp']['type'];

			move_uploaded_file($file_loc, $folder . $file);

			$data['npwp'] = $file;
			$name_file_tabungan = str_replace(' ', '_', $_FILES['tabungan']['name']);
			$file = rand(1000, 100000) . "-" . $name_file_tabungan;
			// $file = rand(1000, 100000) . "-" . $_FILES['tabungan']['name'];
			$file_loc = $_FILES['tabungan']['tmp_name'];
			$file_size = $_FILES['tabungan']['size'];
			$file_type = $_FILES['tabungan']['type'];

			move_uploaded_file($file_loc, $folder . $file);

			$data['tabungan'] = $file;

			$simpan = $this->P3i_model->tambah_p3i($data);
			if ($simpan == 1) {
				$this->load->library('email');

				$config['protocol']    = 'smtp';
				$config['smtp_host']    = 'ssl://smtp.gmail.com';
				$config['smtp_port']    = '465';
				$config['smtp_timeout'] = '7';
				$config['smtp_user']    = 'drpm.its@gmail.com';
				$config['smtp_pass']    = 'drpmITS2020';
				$config['charset']    = 'utf-8';
				$config['newline']    = "\r\n";
				$config['mailtype'] = 'text'; // or html
				$config['validation'] = TRUE; // bool whether to validate email or not      

				$this->email->initialize($config);

				$this->email->from('drpm.its@gmail.com', 'SIPITS ITS');
				$this->email->to($this->input->post('email'));
				$this->email->subject('Konfirmasi Pendaftaran P3I');
				$this->email->message('Pendaftaran P3I Telah Berhasil');

				$this->email->send();

				$this->session->set_flashdata('hasil', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Alert!</h4>Berhasil Melakukan Pengajuan.</div>');
			} else {
				$this->session->set_flashdata('hasil', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-warning"></i> Alert!</h4>Gagal Melakukan Pengajuan.</div>');
			}
			redirect('pendaftaran/daftar_p3i');
		} else {
			$this->load->view('daftar_p3i');
		}
	}

	public function daftar_luaran()
	{
		if ($this->input->post()) {
			$data = $this->input->post();
			$data['status_luaran'] = 1;
			$data['tanggal_submit'] = date("yy-m-d");

			$folder = "uploads/luaran/";
			$name_file_upload_luaran = str_replace(' ', '_', $_FILES['upload']['name']);
			$file = rand(1000, 100000) . "-" . $name_file_upload_luaran;
			// $file = rand(1000, 100000) . "-" . $_FILES['upload']['name'];
			$file_loc = $_FILES['upload']['tmp_name'];
			$file_size = $_FILES['upload']['size'];
			$file_type = $_FILES['upload']['type'];

			move_uploaded_file($file_loc, $folder . $file);

			$data['upload'] = $file;

			$simpan = $this->helper_model->update_luaran($data);
			if ($simpan == 1) {
				$this->load->library('email');

				// $config['protocol']    = 'smtp';
				// $config['smtp_host']    = 'ssl://smtp.gmail.com';
				// $config['smtp_port']    = '465';
				// $config['smtp_timeout'] = '7';
				// $config['smtp_user']    = 'drpm.its@gmail.com';
				// $config['smtp_pass']    = 'drpmITS2020';
				// $config['charset']    = 'utf-8';
				// $config['newline']    = "\r\n";
				// $config['mailtype'] = 'text'; // or html
				// $config['validation'] = TRUE; // bool whether to validate email or not      

				// $this->email->initialize($config);

				// $this->email->from('drpm.its@gmail.com', 'SIPITS ITS');
				// $this->email->to($this->input->post('email'));
				// $this->email->subject('Konfirmasi Pengumpulan Luaran');
				// $this->email->message('Pengumpulan Luaran Telah Berhasil');

				// $this->email->send();

				$this->session->set_flashdata('hasil', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Alert!</h4>Berhasil Mengumpulkan Luaran.</div>');
			} else {
				$this->session->set_flashdata('hasil', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-warning"></i> Alert!</h4>Gagal Mengumpulkan Luaran.</div>');
			}
			redirect('pendaftaran/daftar_luaran');
		} else {
			$this->load->view('daftar_luaran');
		}
	}

	public function daftar_bpup()
	{
		if ($this->input->post()) {
			$data = $this->input->post();
			$data = $this->security->xss_clean($data);
			$total_biaya = $data['total_biaya'];
			$data['total_biaya'] = preg_replace('/\D/', '', $total_biaya);
			$satuan_biaya = $data['satuan_biaya'];
			$data['satuan_biaya'] = preg_replace('/\D/', '', $satuan_biaya);
			$data['status'] = 0;
			$data['tanggal_submit'] = date("yy-m-d");

			$folder = "uploads/bpup/";
			$name_file_ktp = str_replace(' ', '_', $_FILES['ktp']['name']);
			$file = rand(1000, 100000) . "-" . $name_file_ktp;
			// $file = rand(1000, 100000) . "-" . $_FILES['ktp']['name'];
			$file_loc = $_FILES['ktp']['tmp_name'];
			$file_size = $_FILES['ktp']['size'];
			$file_type = $_FILES['ktp']['type'];

			move_uploaded_file($file_loc, $folder . $file);

			$data['ktp'] = $file;
			$name_file_ktm = str_replace(' ', '_', $_FILES['ktm']['name']);
			$file = rand(1000, 100000) . "-" . $name_file_ktm;
			// $file = rand(1000, 100000) . "-" . $_FILES['ktm']['name'];
			$file_loc = $_FILES['ktm']['tmp_name'];
			$file_size = $_FILES['ktm']['size'];
			$file_type = $_FILES['ktm']['type'];

			move_uploaded_file($file_loc, $folder . $file);

			$data['ktm'] = $file;

			$simpan = $this->bpup_model->tambah_bpup($data);
			if ($simpan == 1) {
				$this->load->library('email');

				$config['protocol']    = 'smtp';
				$config['smtp_host']    = 'ssl://smtp.gmail.com';
				$config['smtp_port']    = '465';
				$config['smtp_timeout'] = '7';
				$config['smtp_user']    = 'drpm.its@gmail.com';
				$config['smtp_pass']    = 'drpmITS2020';
				$config['charset']    = 'utf-8';
				$config['newline']    = "\r\n";
				$config['mailtype'] = 'text'; // or html
				$config['validation'] = TRUE; // bool whether to validate email or not      

				$this->email->initialize($config);

				$this->email->from('drpm.its@gmail.com', 'SIPITS ITS');
				$this->email->to($this->input->post('email'));
				$this->email->subject('Konfirmasi Pendaftaran BPUP');
				$this->email->message('Pendaftaran BPUP Telah Berhasil');

				$this->email->send();

				$this->session->set_flashdata('hasil', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Alert!</h4>Berhasil Melakukan Pendaftaran BPUP.</div>');
			} else {
				$this->session->set_flashdata('hasil', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-warning"></i> Alert!</h4>Gagal Melakukan Pendaftaran BPUP.</div>');
			}
			redirect('pendaftaran/daftar_bpup');
		} else {
			$this->load->view('daftar_bpup');
		}
	}

	public function cekDosen()
	{
		$nidn = $this->input->post("nidn");
		$data = $this->kmpi_model->get_dosen($nidn);
		echo json_encode($data, true);
		exit;
	}

	public function cekJudul($table)
	{
		$judul = $this->input->post("judul");
		$data = $this->helper_model->get_judul($judul, $table);
		echo json_encode($data, true);
		exit;
	}

	public function cariMahasiswa()
	{
		$nrp = $this->input->post("nrp");
		$data = $this->pap_model->get_mahasiswa($nrp);
		echo json_encode($data, true);
		exit;
	}

	private function stripHTMLtags($str)
	{
		$t = preg_replace('/<[^<|>]+?>/', '', htmlspecialchars_decode($str));
		$t = htmlentities($t, ENT_QUOTES, "UTF-8");
		return $t;
	}
}

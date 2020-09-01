<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Atur_pap extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->db = $this->load->database('default', true);
		$this->load->model(array('admin_model', 'pap_model', 'user_model'));
		if ($this->user_model->isNotLogin()) redirect(site_url('login'));
	}

	public function index($temp1 = "", $temp2 = "")
	{

		$data['data'] = $this->pap_model->get_pap_all();
		$data['temp'] = $temp1 . " " . $temp2;

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

		$folder = "uploads/pap/";
		$folder2 = "uploads/luaran/";

		//print_r($_FILES['pernyataan']);

		if ($_FILES['pernyataan']['name']) {
			$file = rand(1000, 100000) . "-" . $_FILES['pernyataan']['name'];
			$file_loc = $_FILES['pernyataan']['tmp_name'];
			$file_size = $_FILES['pernyataan']['size'];
			$file_type = $_FILES['pernyataan']['type'];

			move_uploaded_file($file_loc, $folder . $file);
			$data['pernyataan'] = $file;
		}

		if ($_FILES['ktp']['name']) {
			$file = rand(1000, 100000) . "-" . $_FILES['ktp']['name'];
			$file_loc = $_FILES['ktp']['tmp_name'];
			$file_size = $_FILES['ktp']['size'];
			$file_type = $_FILES['ktp']['type'];

			move_uploaded_file($file_loc, $folder . $file);
			$data['ktp'] = $file;
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

		$hasil = $this->pap_model->update_pap($id_pap, $data);

		if ($hasil == 0) {
			$this->session->set_flashdata(
				'hasil_pap',
				'<div class="alert alert-warning alert-dismissible col-12">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-exclamation-triangle"></i> Gagal!</h5>
                  Data Pengusul Penyelenggaraan Asisten Peneliti gagal update data.
                </div>'
			);
		} else {
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

		if ($hasil == 0) {
			$temp1 = "Gagal";
		} else {
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
			} else if ($status == 2) {
				$this->send_email($data[0]['email_ketua'], "Usulan PAP Anda harus Revisi");
				$this->session->set_flashdata(
					'hasil_kp',
					'<div class="alert alert-success col-12">
		      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		      <h5><i class="icon fa fa-check"></i> Berhasil!</h5>
		      Proses Update Status (Revisi) Usulan PAP Berhasil.
		    </div>'
				);
			} else if ($status == 3) {
				$this->send_email($data[0]['email_ketua'], "Usulan PAP Anda ditolak");
				$this->session->set_flashdata(
					'hasil_pap',
					'<div class="alert alert-success col-12">
		      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		      <h5><i class="icon fa fa-check"></i> Berhasil!</h5>
		      Proses Update Status(ditolak) Usulan PAP Berhasil.
		    </div>'
				);
			} else if ($status == 4) {
				$this->send_email($data[0]['email_ketua'], "Usulan PAP Anda berhasil diterima");
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

	public function send_email($email, $pesan)
	{
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
        $this->email->to($email);
        $this->email->subject('Email Test');
        $this->email->message($pesan);

        $this->email->send();
	}

	public function hapus()
	{
		$id = $this->input->post('id_pap');
		$hasil = $this->pap_model->hapus_pap($id);

		//printf($data);
		//redirect('atur_pap');
		if ($hasil == 0) {
			$this->session->set_flashdata(
				'hasil_pap',
				'<div class="alert alert-warning alert-dismissible col-12">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-exclamation-triangle"></i> Gagal!</h5>
                  Data Pengusul Penyelenggaraan Asisten Peneliti gagal dihapus.
                </div>'
			);
			redirect('atur_pap/detail/' . $id);
		} else {
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

	public function cetak_data($id)
	{
		$data = $this->pap_model->get_pap_by_id($id);
		$this->load->library('f_pdf');
		$pdf = new FPDF('P', 'mm', 'Letter');

		$pdf->AddPage();
		$pdf->Image('assets/bahan/its-logo.png', 10, 10, 20, 25);
		//$pdf->Cell(25);
		$pdf->SetFont('Times', 'B', '14');
		$pdf->Cell(0, 5, 'KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN ', 0, 1, 'C');
		// $pdf->Cell(25);
		$pdf->Cell(0, 5, 'INSTITUT TEKNOLOGI SEPULUH NOPEMBER', 0, 1, 'C');
		$pdf->Cell(25);
		$pdf->SetFont('Times', 'B', '12');
		$pdf->Cell(0, 5, 'DIREKTORAT RISET DAN PENGABDIAN KEPADA MASYARAKAT', 0, 1, 'C');
		$pdf->Cell(25);
		$pdf->SetFont('Times', 'I', '10');
		$pdf->Cell(0, 5, 'Gedung Pusat Riset Lantai Lobby, Kampus ITS Sukolilo, Surabaya 60111', 0, 1, 'C');
		$pdf->Cell(25);
		$pdf->Cell(0, 2, 'Telp. (031) 0315953759, Fax (031)  5955793, PABX : 1404,1405,1330', 0, 1, 'C');
		$pdf->Ln(2);
		$pdf->SetFont('Times', 'I', '10');
		$pdf->Cell(25);

		$pdf->Cell(0, 2, 'Email: drpm@its.ac.id Website: www.its.ac.id/drpm', 0, 1, 'C');
		// $pdf->Ln(6);
		$pdf->SetLineWidth(1);
		$pdf->SetDrawColor(0, 0, 255);
		$pdf->Line(10, 40, 200, 40);
		$pdf->Ln(10);
		$pdf->Cell(25);
		$pdf->SetFont('Times', 'B', '12');
		$pdf->Cell(0, 5, 'SURAT PERJANJIAN', 0, 1, 'C');
		$pdf->Cell(25);
		$pdf->SetFont('Times', 'B', '12');
		$pdf->Cell(0, 5, 'DOSEN PENELITI', 0, 1, 'C');
		$pdf->Cell(25);
		$pdf->SetFont('Times', 'B', '12');
		$pdf->Cell(0, 5, 'DENGAN', 0, 1, 'C');
		$pdf->Cell(25);
		$pdf->SetFont('Times', 'B', '12');
		$pdf->Cell(0, 5, 'PENERIMA PENYELENGGARAAN ASISTEN PENELITIAN', 0, 1, 'C');
		$pdf->SetFont('Times', '', '12');
		$pdf->Cell(25);

		$pdf->Cell(0, 2, 'Nomor :   '.$data[0]['nomor_kontrak'], 0, 1, 'C');
		$pdf->Ln(6);
		$pdf->SetFont('Times', '', '10');
		$pdf->Cell(0, 2, 'Pada hari ini Rabu, tanggal Lima, bulan Mei, tahun Dua ribu delapan belas yang bertandatangan di bawah ini:', 0, 1, '');
		$pdf->Ln(3);
		$pdf->setX(15);
		$pdf->Cell(0, 2, 'Nama', 0, 1, '');
		$pdf->setX(42);
		$pdf->Cell(0, -2, ':', 0, 1, '');
		$pdf->setX(45);
		$pdf->Cell(0, 2, $data[0]['nama_ketua'], 0, 1, '');
		$pdf->Ln(3);
		$pdf->setX(15);
		$pdf->Cell(0, 2, 'NIP', 0, 1, '');
		$pdf->setX(42);
		$pdf->Cell(0, -2, ':', 0, 1, '');
		$pdf->setX(45);
		$pdf->Cell(0, 2, $data[0]['nomor_induk_ketua'], 0, 1, '');
		$pdf->Ln(3);
		$pdf->setX(15);
		$pdf->Cell(0, 2, 'Departemen', 0, 1, '');
		$pdf->setX(42);
		$pdf->Cell(0, -2, ':', 0, 1, '');
		$pdf->setX(45);
		$pdf->Cell(0, 2, $data[0]['departemen_ketua'], 0, 1, '');
		$pdf->Ln(3);
		$pdf->setX(15);
		$pdf->Cell(0, 2, 'Jabatan', 0, 1, '');
		$pdf->setX(42);
		$pdf->Cell(0, -2, ':', 0, 1, '');
		$pdf->setX(45);
		$pdf->Cell(0, 2, 'Ketua Peneliti '.$data[0]['judul'], 0, 1, '');
		$pdf->Ln(2);
		$pdf->setX(45);
		$pdf->Cell(0, 2, 'Skema Penelitian Unggulan sesuai Surat Perjanjian Sumber Dana ITS Nomor 47/PKS/ITS/2018  tanggal 1 Februari 2018', 0, 1, '');
		$pdf->Ln(3);
		$pdf->Cell(0, 2, 'Selanjutnya disebut', 0, 1, '');
		$pdf->SetFont('Times', 'B', '11');
		$pdf->setX(40);
		$pdf->Cell(0, -2, 'PIHAK PERTAMA', 0, 1, '');
		$pdf->Ln(8);
		$pdf->SetFont('Times', '', '10');
		$pdf->Cell(0, 2, 'Dengan', 0, 1, '');
		$pdf->Ln(3);
		$pdf->setX(15);
		$pdf->Cell(0, 2, 'Nama', 0, 1, '');
		$pdf->setX(42);
		$pdf->Cell(0, -2, ':', 0, 1, '');
		$pdf->setX(45);
		$pdf->Cell(0, 2, $data[0]['nama_ap'], 0, 1, '');
		$pdf->Ln(3);
		$pdf->setX(15);
		$pdf->Cell(0, 2, 'Status', 0, 1, '');
		$pdf->setX(42);
		$pdf->Cell(0, -2, ':', 0, 1, '');
		$pdf->setX(45);
		$pdf->Cell(0, 2, 'Mahasiswa', 0, 1, '');
		$pdf->Ln(3);
		$pdf->setX(15);
		$pdf->Cell(0, 2, 'NRP', 0, 1, '');
		$pdf->setX(42);
		$pdf->Cell(0, -2, ':', 0, 1, '');
		$pdf->setX(45);
		$pdf->Cell(0, 2, $data[0]['nomor_induk_ap'], 0, 1, '');
		$pdf->Ln(3);
		$pdf->setX(15);
		$pdf->Cell(0, 2, 'Departemen', 0, 1, '');
		$pdf->setX(42);
		$pdf->Cell(0, -2, ':', 0, 1, '');
		$pdf->setX(45);
		$pdf->Cell(0, 2, 'Fisika', 0, 1, '');
		$pdf->Ln(3);
		$pdf->setX(15);
		$pdf->Cell(0, 2, 'NIK', 0, 1, '');
		$pdf->setX(42);
		$pdf->Cell(0, -2, ':', 0, 1, '');
		$pdf->setX(45);
		$pdf->Cell(0, 2, '4234234', 0, 1, '');
		$pdf->Ln(3);
		$pdf->setX(15);
		$pdf->Cell(0, 2, 'No HP', 0, 1, '');
		$pdf->setX(42);
		$pdf->Cell(0, -2, ':', 0, 1, '');
		$pdf->setX(45);
		$pdf->Cell(0, 2, $data[0]['no_hp_ap'], 0, 1, '');
		$pdf->Ln(3);
		$pdf->setX(15);
		$pdf->Cell(0, 2, 'email', 0, 1, '');
		$pdf->setX(42);
		$pdf->Cell(0, -2, ':', 0, 1, '');
		$pdf->setX(45);
		$pdf->Cell(0, 2, $data[0]['email_ap'], 0, 1, '');
		$pdf->Ln(3);
		$pdf->setX(15);
		$pdf->Cell(0, 2, 'Alamat KTP', 0, 1, '');
		$pdf->setX(42);
		$pdf->Cell(0, -2, ':', 0, 1, '');
		$pdf->setX(45);
		$pdf->Cell(0, 2, $data[0]['alamat_ktp_ap'], 0, 1, '');
		$pdf->Ln(3);
		$pdf->setX(15);
		$pdf->Cell(0, 2, 'Alamat Domisili', 0, 1, '');
		$pdf->setX(42);
		$pdf->Cell(0, -2, ':', 0, 1, '');
		$pdf->setX(45);
		$pdf->Cell(0, 2, $data[0]['alamat_domisili_ap'], 0, 1, '');
		$pdf->Ln(3);
		$pdf->Cell(0, 2, 'Selanjutnya disebut', 0, 1, '');
		$pdf->SetFont('Times', 'B', '10');
		$pdf->setX(40);
		$pdf->Cell(0, -2, 'PIHAK KEDUA', 0, 1, '');
		$pdf->Ln(7);
		$pdf->Cell(0, 2, 'PIHAK PERTAMA', 0, 1, '');
		$pdf->setX(42);
		$pdf->SetFont('Times', '', '10');
		$pdf->Cell(0, -2, 'dan', 0, 1, '');
		$pdf->SetFont('Times', 'B', '10');
		$pdf->setX(48);
		$pdf->Cell(0, 2, 'PIHAK KEDUA', 0, 1, '');
		$pdf->setX(75);
		$pdf->SetFont('Times', '', '10');
		$pdf->Cell(0, -2, 'sepakat mengadakan perjanjian sebagai berikut:', 0, 1, '');
		$pdf->Ln(4);
		$pdf->SetFont('Times', '', '10');
		$pdf->Cell(0, 2, '1.', 0, 1, '');
		$pdf->SetFont('Times', 'B', '10');
		$pdf->setX(15);
		$pdf->Cell(0, -2, 'PIHAK PERTAMA', 0, 1, '');
		$pdf->SetFont('Times', '', '10');
		$pdf->setX(46);
		$pdf->Cell(0, 2, 'memberikan reward kepada asisten peneliti, yang selanjutnya disebut PAP, sesuai ketentuan yang berlaku  : ', 0, 1, '');
		$pdf->Ln(3);
		$pdf->setX(15);
		$pdf->Cell(0, 2, 'kepada', 0, 1, '');
		$pdf->SetFont('Times', 'B', '10');
		$pdf->setX(26);
		$pdf->Cell(0, -2, 'PIHAK KEDUA', 0, 1, '');
		$pdf->SetFont('Times', '', '10');
		$pdf->setX(52);
		$pdf->Cell(0, 2, 'berupa', 0, 1, '');
		$pdf->Ln(3);
		$pdf->setX(15);
		$pdf->Cell(0, 2, 'Jenis Reward', 0, 1, '');
		$pdf->setX(42);
		$pdf->Cell(0, -2, ':', 0, 1, '');
		$pdf->setX(45);
		$pdf->Cell(0, 2, 'Honorium', 0, 1, '');
		$pdf->Ln(3);
		$pdf->setX(15);
		$pdf->Cell(0, 2, 'Sebagai', 0, 1, '');
		$pdf->setX(42);
		$pdf->Cell(0, -2, ':', 0, 1, '');
		$pdf->setX(45);
		$pdf->Cell(0, 2, 'Administrasi', 0, 1, '');
		$pdf->Ln(3);
		$pdf->setX(15);

		$pdf->Cell(0, 2, 'Selama', 0, 1, '');
		$pdf->setX(42);
		$pdf->Cell(0, -2, ':', 0, 1, '');
		$pdf->setX(45);
		$pdf->Cell(0, 2, '8 Jam', 0, 1, '');
		$pdf->Ln(3);
		$pdf->setX(15);
		$pdf->Cell(0, 2, 'Sebesar', 0, 1, '');
		$pdf->setX(42);
		$pdf->Cell(0, -2, ':', 0, 1, '');
		$pdf->setX(45);
		$pdf->Cell(0, 2, '500.000 Setiap Hari', 0, 1, '');
		$pdf->Ln(3);
		$pdf->setX(15);
		$pdf->Cell(0, 2, 'Total Sebesar', 0, 1, '');
		$pdf->setX(42);
		$pdf->Cell(0, -2, ':', 0, 1, '');
		$pdf->setX(45);
		$pdf->Cell(0, 2, 'Rp 9.500.000', 0, 1, '');
		$pdf->Ln(3);
		$pdf->setX(15);
		$pdf->Cell(0, 2, 'Terbilang', 0, 1, '');
		$pdf->setX(42);
		$pdf->Cell(0, -2, ':', 0, 1, '');
		$pdf->setX(45);
		$pdf->Cell(0, 2, 'Satu juta rupiah', 0, 1, '');
		$pdf->Ln(3);
		$pdf->Cell(0, 2, '2.', 0, 1, '');
		$pdf->SetFont('Times', 'B', '10');
		$pdf->setX(15);
		$pdf->Cell(0, -2, 'PIHAK KEDUA', 0, 1, '');
		$pdf->setX(41);
		$pdf->SetFont('Times', '', '10');
		$pdf->Cell(0, 2, 'mempunyai kewajiban membantu', 0, 1, '');
		$pdf->SetFont('Times', 'B', '10');
		$pdf->setX(90);
		$pdf->Cell(0, -2, 'PIHAK PERTAMA', 0, 1, '');
		$pdf->SetFont('Times', '', '10');
		$pdf->setX(122);
		$pdf->Cell(0, 2, 'dalam melaksanakan penelitian dan meningkatkan jumlah', 0, 1, '');
		$pdf->Ln(3);
		$pdf->setX(15);
		$pdf->Cell(0, 2, 'dan mutu luaran penelitian;', 0, 1, '');

		$pdf->Ln(3);
		$pdf->Cell(0, 2, '3.', 0, 1, '');
		$pdf->SetFont('Times', 'B', '10');
		$pdf->setX(15);
		$pdf->Cell(0, -2, 'PIHAK PERTAMA', 0, 1, '');
		$pdf->SetFont('Times', '', '10');
		$pdf->setX(46);
		$pdf->Cell(0, 2, 'akan menghentikan honorarium asisten peneliti kepada', 0, 1, '');
		$pdf->SetFont('Times', 'B', '10');
		$pdf->setX(125);
		$pdf->Cell(0, -2, 'PIHAK KEDUA', 0, 1, '');
		$pdf->SetFont('Times', '', '10');
		$pdf->setX(151);
		$pdf->Cell(0, 2, 'dalam hal', 0, 1, '');
		$pdf->SetFont('Times', 'B', '10');
		$pdf->setX(166);
		$pdf->Cell(0, -2, 'PIHAK KEDUA', 0, 1, '');
		$pdf->Ln(4);
		$pdf->SetFont('Times', '', '10');
		$pdf->setX(15);

		$pdf->Cell(0, 2, 'dalam hal PIHAK KEDUA tidak dapat melaksanakan kewajibannya sesuai point 2; dan', 0, 1, '');
		$pdf->Ln(3);
		$pdf->Cell(0, 2, '4. ', 0, 1, '');

		$pdf->SetFont('Times', 'B', '10');
		$pdf->setX(15);
		$pdf->Cell(0, -2, 'PIHAK PERTAMA', 0, 1, '');
		$pdf->SetFont('Times', '', '10');
		$pdf->setX(46);
		$pdf->Cell(0, 2, 'dan', 0, 1, '');
		$pdf->SetFont('Times', 'B', '10');
		$pdf->setX(52);
		$pdf->Cell(0, -2, 'PIHAK KEDUA', 0, 1, '');
		$pdf->SetFont('Times', '', '10');
		$pdf->setX(78);
		$pdf->Cell(0, 2, 'wajib memberikan luaran berupa Jurnal Internasional kepada Direktur Riset dan Pengabdian', 0, 1, '');
		$pdf->Ln(3);
		$pdf->setX(15);
		$pdf->Cell(0, 2, 'kepada Masyarakat (DRPM)  ITS.', 0, 1, '');
		$pdf->Ln(7);

		$pdf->SetFont('Times', '', '10');
		$pdf->Cell(0, 2, 'Demikian surat perjanjian ini dibuat oleh kedua belah pihak, ditandatangani di atas materai secukupnya sesuai ketentuan yang berlaku.', 0, 1, '');
		$pdf->Ln(7);
		$pdf->SetFont('Times', 'B', '10');
		$pdf->Cell(0, 2, 'PIHAK PERTAMA', 0, 1, '');
		$pdf->setX(130);
		$pdf->Cell(0, -2, 'PIHAK KEDUA', 0, 1, '');
		$pdf->Ln(7);
		$pdf->SetFont('Times', '', '10');
		$pdf->Cell(0, 2, 'Suprapto PHd', 0, 1, '');
		$pdf->setX(130);
		$pdf->Cell(0, -2, 'Muhammad Yudha', 0, 1, '');
		$pdf->Ln(4);
		$pdf->Cell(0, 2, 'NIP. 197209191998021002', 0, 1, '');
		$pdf->setX(130);
		$pdf->Cell(0, -2, 'NIK. 1403052803954595', 0, 1, '');

		$pdf->Output();
            // $this->load->view('admin/cetak_kontrak');
      
	}
}

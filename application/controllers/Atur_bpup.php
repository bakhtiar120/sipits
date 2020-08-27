<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Atur_bpup extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('default', true);
        $this->load->model(array('admin_model', 'bpup_model', 'user_model'));
        if ($this->user_model->isNotLogin()) redirect(site_url('login'));
    }

    public function index($temp1 = "", $temp2 = "")
    {

        $data['data'] = $this->bpup_model->get_bpup_all();
        $data['temp'] = $temp1 . " " . $temp2;

        $this->load->view('admin/atur_bpup', $data);
    }

    public function detail($id = 0)
    {
        $data = $this->bpup_model->get_bpup_by_id($id);
        $this->load->view('admin/detail_bpup', $data[0]);
    }
    public function update_status($id_bpup = 0, $status = 0)
    {
        $hasil = $this->bpup_model->update_status_bpup($id_bpup, $status);
        $data = $this->bpup_model->get_bpup_by_id($id_bpup);

        if ($hasil == 0) {
            $this->session->set_flashdata(
                'hasil',
                '<div class="alert alert-warning alert-dismissible col-12">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-exclamation-triangle"></i> Gagal!</h5>
                  Data Pengusul BPUP gagal update status.
                </div>'
            );
        } else {
            if ($status == 1) {
                $this->send_email($data[0]['email'], "Usulan BPUP Anda sedang direview");
                $this->session->set_flashdata(
                    'hasil',
                    '<div class="alert alert-success col-12">
		      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		      <h5><i class="icon fa fa-check"></i> Berhasil!</h5>
		      Proses Update Status (Review) Usulan BPUP Berhasil.
		    </div>'
                );
            } else if ($status == 2) {
                $this->send_email($data[0]['email'], "Usulan BPUP Anda harus Revisi");
                $this->session->set_flashdata(
                    'hasil',
                    '<div class="alert alert-success col-12">
		      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		      <h5><i class="icon fa fa-check"></i> Berhasil!</h5>
		      Proses Update Status (revisi) usulan BPUP berhasil.
		    </div>'
                );
            } else if ($status == 3) {
                $this->send_email($data[0]['email'], "Usulan BPUP Anda ditolak");
                $this->session->set_flashdata(
                    'hasil',
                    '<div class="alert alert-success col-12">
		      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		      <h5><i class="icon fa fa-check"></i> Berhasil!</h5>
		      Proses update status (ditolak) Usulan BPUP berhasil.
		    </div>'
                );
            } else if ($status == 4) {
                $this->send_email($data[0]['email'], "Usulan BPUP Anda berhasil diterima");
                $this->session->set_flashdata(
                    'hasil',
                    '<div class="alert alert-success col-12">
		      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		      <h5><i class="icon fa fa-check"></i> Berhasil!</h5>
		     Proses update status(diterima) Usulan BPUP berhasil
		    </div>'
                );
            }
        }
        $temp2 = "Diperbarui";

        redirect('atur_bpup/detail/' . $id_bpup);
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
        $id = $this->input->post('id_bpup');
        $hasil = $this->bpup_model->hapus_bpup($id);

        //printf($data);
        //redirect('atur_pap');
        if ($hasil == 0) {
            $this->session->set_flashdata(
                'hasil_bpup',
                '<div class="alert alert-warning alert-dismissible col-12">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-exclamation-triangle"></i> Gagal!</h5>
                  Data Pengusul Beasiswa Pascasarjana untuk Peneliti gagal dihapus.
                </div>'
            );
            redirect('atur_pap/detail/' . $id);
        } else {
            $this->session->set_flashdata(
                'hasil_bpup',
                '<div class="alert alert-success col-12">
		      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		      <h5><i class="icon fa fa-check"></i> Berhasil!</h5>
		       Data Pengusul Beasiswa Pascasarjana untuk Peneliti berhasil dihapus
		    </div>'
            );
            redirect('atur_bpup/index/');
        }
    }
    public function edit($id_bpup = 0)
    {

        $data = $this->bpup_model->get_bpup_by_id($id_bpup);

        $this->load->view('admin/edit_bpup', $data[0]);
    }

    public function update_data($id_bpup = 0)
    {

        $data = $this->input->post();
        $total_biaya = $data['total_biaya'];
        $data['total_biaya'] = preg_replace('/\D/', '', $total_biaya);
        $satuan_biaya = $data['satuan_biaya'];
        $data['satuan_biaya'] = preg_replace('/\D/', '', $satuan_biaya);
        //print_r($data);

        $folder = "uploads/bpup/";
        $folder2 = "uploads/luaran/";

        //print_r($_FILES['pernyataan']);

        if ($_FILES['ktm']['name']) {
            $file = rand(1000, 100000) . "-" . $_FILES['ktm']['name'];
            $file_loc = $_FILES['ktm']['tmp_name'];
            $file_size = $_FILES['ktm']['size'];
            $file_type = $_FILES['ktm']['type'];

            move_uploaded_file($file_loc, $folder . $file);
            $data['ktm'] = $file;
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

        $hasil = $this->bpup_model->update_pap($id_bpup, $data);

        if ($hasil == 0) {
            $this->session->set_flashdata(
                'hasil_pap',
                '<div class="alert alert-warning alert-dismissible col-12">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-exclamation-triangle"></i> Gagal!</h5>
                  Data Pengusul Beasiswa Pascasarjana untuk Peneliti gagal update data.
                </div>'
            );
        } else {
            $this->session->set_flashdata(
                'hasil_pap',
                '<div class="alert alert-success col-12">
		      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		      <h5><i class="icon fa fa-check"></i> Berhasil!</h5>
		       Data Pengusul Beasiswa Pascasarjana untuk Peneliti berhasil update data.
		    </div>'
            );
        }
        $temp2 = "Diperbarui";

        redirect('atur_bpup/index/');
    }
}

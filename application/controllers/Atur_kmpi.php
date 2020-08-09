<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Atur_kmpi extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('default', true);
        $this->load->model(array('admin_model', 'kmpi_model', 'user_model'));
        if ($this->user_model->isNotLogin()) redirect(site_url('login'));
    }

    public function index($temp1 = "", $temp2 = "")
    {

        $data['data'] = $this->kmpi_model->get_all();
        $data['temp'] = $temp1 . " " . $temp2;

        $this->load->view('admin/atur_kmpi', $data);
    }

    public function detail($id = 0)
    {
        $data = $this->kmpi_model->get_by_id($id);
        $this->load->view('admin/detail_kmpi', $data[0]);
    }

    public function edit($id_kmpi = 0)
    {

        $data = $this->kmpi_model->get_by_id($id_kmpi);

        $this->load->view('admin/edit_kmpi', $data[0]);
    }

    public function update_data($id_kmpi = 0)
    {

        $data = $this->input->post();

        //print_r($data);

        $folder = "uploads/kmpi/";

        //print_r($_FILES['proposal']);

        if ($_FILES['draft_publikasi']['name']) {
            $file = rand(1000, 100000) . "-" . $_FILES['draft_publikasi']['name'];
            $file_loc = $_FILES['draft_publikasi']['tmp_name'];
            $file_size = $_FILES['draft_publikasi']['size'];
            $file_type = $_FILES['draft_publikasi']['type'];

            move_uploaded_file($file_loc, $folder . $file);
            $data['draft_publikasi'] = $file;
        }

        if ($_FILES['luaran_publikasi']['name']) {
            $file = rand(1000, 100000) . "-" . $_FILES['luaran_publikasi']['name'];
            $file_loc = $_FILES['luaran_publikasi']['tmp_name'];
            $file_size = $_FILES['luaran_publikasi']['size'];
            $file_type = $_FILES['luaran_publikasi']['type'];

            move_uploaded_file($file_loc, $folder . $file);
            $data['luaran_publikasi'] = $file;
        }

        if ($_FILES['mou_publikasi']['name']) {
            $file = rand(1000, 100000) . "-" . $_FILES['mou_publikasi']['name'];
            $file_loc = $_FILES['mou_publikasi']['tmp_name'];
            $file_size = $_FILES['mou_publikasi']['size'];
            $file_type = $_FILES['mou_publikasi']['type'];

            move_uploaded_file($file_loc, $folder . $file);

            $data['mou_publikasi'] = $file;
        }
        if ($_FILES['luaran']['name']) {
            $file = rand(1000, 100000) . "-" . $_FILES['luaran']['name'];
            $file_loc = $_FILES['luaran']['tmp_name'];
            $file_size = $_FILES['luaran']['size'];
            $file_type = $_FILES['luaran']['type'];

            move_uploaded_file($file_loc, $folder . $file);

            $data['luaran'] = $file;
        }

        $hasil = $this->kmpi_model->update_kmpi($id_kmpi, $data);


        if ($hasil == 0) {
            $this->session->set_flashdata(
                'hasil',
                '<div class="alert alert-warning alert-dismissible col-12">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-exclamation-triangle"></i> Gagal!</h5>
                  Data Pengusul KMPI gagal update data.
                </div>'
            );
        } else {
            $this->session->set_flashdata(
                'hasil',
                '<div class="alert alert-success col-12">
		      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		      <h5><i class="icon fa fa-check"></i> Berhasil!</h5>
		       Data Pengusul KMPI berhasil update data.
		    </div>'
            );
        }
        $temp2 = "Diperbarui";

        redirect('atur_kmpi/detail/' . $id_kmpi);
    }

    public function update_status($id_kmpi = 0, $status = 0)
    {
        $hasil = $this->kmpi_model->update_status_kmpi($id_kmpi, $status);
        $data = $this->kmpi_model->get_by_id($id_kmpi);

        if ($hasil == 0) {
            $this->session->set_flashdata(
                'hasil',
                '<div class="alert alert-warning alert-dismissible col-12">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-exclamation-triangle"></i> Gagal!</h5>
                  Data Pengusul KMPI gagal update status.
                </div>'
            );
        } else {
            if ($status == 1) {
                $this->send_email($data[0]['email'], "Usulan KMPI Anda sedang direview");
                $this->session->set_flashdata(
                    'hasil',
                    '<div class="alert alert-success col-12">
		      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		      <h5><i class="icon fa fa-check"></i> Berhasil!</h5>
		      Proses Update Status (Review) Usulan KMPI Berhasil.
		    </div>'
                );
            } else if ($status == 2) {
                $this->send_email($data[0]['email'], "Usulan KMPI Anda harus Revisi");
                $this->session->set_flashdata(
                    'hasil',
                    '<div class="alert alert-success col-12">
		      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		      <h5><i class="icon fa fa-check"></i> Berhasil!</h5>
		      Proses Update Status (revisi) usulan KMPI berhasil.
		    </div>'
                );
            } else if ($status == 3) {
                $this->send_email($data[0]['email'], "Usulan KMPI Anda ditolak");
                $this->session->set_flashdata(
                    'hasil',
                    '<div class="alert alert-success col-12">
		      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		      <h5><i class="icon fa fa-check"></i> Berhasil!</h5>
		      Proses update status (ditolak) Usulan KMPI berhasil.
		    </div>'
                );
            } else if ($status == 4) {
                $this->send_email($data[0]['email'], "Usulan KMPI Anda berhasil diterima");
                $this->session->set_flashdata(
                    'hasil',
                    '<div class="alert alert-success col-12">
		      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		      <h5><i class="icon fa fa-check"></i> Berhasil!</h5>
		     Proses update status(diterima) Usulan KMPI berhasil
		    </div>'
                );
            }
        }
        $temp2 = "Diperbarui";

        redirect('atur_kmpi/detail/' . $id_kmpi);
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
        $id = $this->input->post("id_kmpi");
        $hasil = $this->kmpi_model->hapus_kmpi($id);

        if ($hasil == 0) {
            $this->session->set_flashdata(
                'hasil',
                '<div class="alert alert-warning alert-dismissible col-12">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-exclamation-triangle"></i> Gagal!</h5>
                  Data Pengusul KMPI gagal dihapus.
                </div>'
            );
            redirect('atur_kmpi/detail/' . $id);
        } else {
            $this->session->set_flashdata(
                'hasil',
                '<div class="alert alert-success col-12">
		      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		      <h5><i class="icon fa fa-check"></i> Berhasil!</h5>
		      Data Pengusul KMPI berhasil dihapus
		    </div>'
            );



            redirect('atur_kmpi');
        }
    }
}

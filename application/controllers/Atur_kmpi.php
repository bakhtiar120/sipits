<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Atur_kmpi extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('default', true);
        $this->load->model(array('admin_model', 'kmpi_model'));
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


        $hasil = $this->kmpi_model->update_kmpi($id_kmpi, $data);

        if ($hasil == 0) {
            $temp1 = "Gagal";
        } else {
            $temp1 = "Berhasil";
        }
        $temp2 = "Diperbarui";

        redirect('atur_kmpi/index/' . $temp1 . '/' . $temp2);
    }

    public function update_status($id_kmpi = 0, $status = 0)
    {
        $hasil = $this->kmpi_model->update_status_kmpi($id_kmpi, $status);
        $data = $this->kmpi_model->get_by_id($id_kmpi);

        if ($hasil == 0) {
            $temp1 = "Gagal";
        } else {
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

        redirect('atur_kmpi/index/' . $temp1 . '/' . $temp2);
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
        $hasil = $this->kmpi_model->hapus_kmpi($id);

        //printf($data);
        //redirect('atur_kmpi');
        if ($hasil == 0) {
            $temp1 = "Gagal";
        } else {
            $temp1 = "Berhasil";
        }
        $temp2 = "Dihapus";

        redirect('atur_kmpi/index/' . $temp1 . '/' . $temp2);
    }
}

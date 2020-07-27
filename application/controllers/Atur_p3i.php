<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Atur_p3i extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('default', true);
        $this->load->model(array('admin_model', 'p3i_model'));
    }

    public function index($temp1 = "", $temp2 = "")
    {

        $data['data'] = $this->p3i_model->get_all();
        $data['temp'] = $temp1 . " " . $temp2;

        $this->load->view('admin/atur_p3i', $data);
    }

    public function detail($id = 0)
    {
        $data = $this->p3i_model->get_by_id($id);
        $this->load->view('admin/detail_p3i', $data[0]);
    }

    public function edit($id_p3i = 0)
    {

        $data = $this->p3i_model->get_by_id($id_p3i);

        $this->load->view('admin/edit_p3i', $data[0]);
    }

    public function update_data($id_p3i = 0)
    {

        $data = $this->input->post();


        $folder = "uploads/p3i/";


        if ($_FILES['pernyataan']['name']) {
            $file = rand(1000, 100000) . "-" . $_FILES['pernyataan']['name'];
            $file_loc = $_FILES['pernyataan']['tmp_name'];
            $file_size = $_FILES['pernyataan']['size'];
            $file_type = $_FILES['pernyataan']['type'];

            move_uploaded_file($file_loc, $folder . $file);
            $data['pernyataan'] = $file;
        }

        if ($_FILES['draf']['name']) {
            $file = rand(1000, 100000) . "-" . $_FILES['draf']['name'];
            $file_loc = $_FILES['draf']['tmp_name'];
            $file_size = $_FILES['draf']['size'];
            $file_type = $_FILES['draf']['type'];

            move_uploaded_file($file_loc, $folder . $file);
            $data['draf'] = $file;
        }

        if ($_FILES['npwp']['name']) {
            $file = rand(1000, 100000) . "-" . $_FILES['npwp']['name'];
            $file_loc = $_FILES['npwp']['tmp_name'];
            $file_size = $_FILES['npwp']['size'];
            $file_type = $_FILES['npwp']['type'];

            move_uploaded_file($file_loc, $folder . $file);

            $data['npwp'] = $file;
        }

        if ($_FILES['tabungan']['name']) {
            $file = rand(1000, 100000) . "-" . $_FILES['tabungan']['name'];
            $file_loc = $_FILES['tabungan']['tmp_name'];
            $file_size = $_FILES['tabungan']['size'];
            $file_type = $_FILES['tabungan']['type'];

            move_uploaded_file($file_loc, $folder . $file);

            $data['tabungan'] = $file;
        }


        $hasil = $this->p3i_model->update_p3i($id_p3i, $data);

        if ($hasil == 0) {
            $temp1 = "Gagal";
        } else {
            $temp1 = "Berhasil";
        }
        $temp2 = "Diperbarui";

        redirect('atur_p3i/index/' . $temp1 . '/' . $temp2);
    }

    public function update_status($id_p3i = 0, $status = 0)
    {
        $hasil = $this->p3i_model->update_status_p3i($id_p3i, $status);

        if ($hasil == 0) {
            $temp1 = "Gagal";
        } else {
            $temp1 = "Berhasil";
        }
        $temp2 = "Diperbarui";

        redirect('atur_p3i/index/' . $temp1 . '/' . $temp2);
    }

    public function hapus($id = 0)
    {
        $hasil = $this->p3i_model->hapus_p3i($id);

        //printf($data);
        //redirect('atur_p3i');
        if ($hasil == 0) {
            $temp1 = "Gagal";
        } else {
            $temp1 = "Berhasil";
        }
        $temp2 = "Dihapus";

        redirect('atur_p3i/index/' . $temp1 . '/' . $temp2);
    }
}

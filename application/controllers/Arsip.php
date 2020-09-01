<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Arsip extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Arsip_model');
    }

    function index()
    {
        $data["tahun"] = $this->Arsip_model->tahun();
        $data["skema"] = $this->Arsip_model->skema();
        $data["departemen"] = $this->Arsip_model->departemen();
        $data["fakultas"] = $this->Arsip_model->fakultas();
        $this->load->view('admin/arsip', $data);
    }

    function get_data()
    {
        $list = $this->Arsip_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $field->id_arsip;
            $row[] = $field->no;
            $row[] = $field->tahun;
            $row[] = $field->skema;
            $row[] = $field->sumber;
            $row[] = $field->judul;
            $row[] = $field->nama_ketua;
            $row[] = $field->departemen;
            $row[] = $field->fakultas;
            $row[] = $field->dana_disetujui;
            $row[] = $field->nomor_kontrak . $field->kode_kontrak;
            $row[] = $field->tgl_kontrak;
            $row[] = $field->nomor_sk . $field->kode_sk;
            $row[] = $field->tgl_sk;
            $row[] = $field->kode_unik;

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Arsip_model->count_all(),
            "recordsFiltered" => $this->Arsip_model->count_filtered(),
            "data" => $data,
        );

        //output dalam format JSON
        echo json_encode($output);
        exit();
    }

    function get_data2()
    {
        $list = $this->Arsip_model->get_datatables2($this->input->post());
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $field->id_arsip;
            $row[] = $field->no;
            $row[] = $field->tahun;
            $row[] = $field->skema;
            $row[] = $field->sumber;
            $row[] = $field->judul;
            $row[] = $field->nama_ketua;
            $row[] = $field->departemen;
            $row[] = $field->fakultas;
            $row[] = $field->dana_disetujui;
            $row[] = $field->nomor_kontrak . $field->kode_kontrak;
            $row[] = $field->tgl_kontrak;
            $row[] = $field->nomor_sk . $field->kode_sk;
            $row[] = $field->tgl_sk;
            $row[] = $field->kode_unik;

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Arsip_model->count_all2($this->input->post()),
            "recordsFiltered" => $this->Arsip_model->count_filtered2(),
            "data" => $data,
        );

        //output dalam format JSON
        echo json_encode($output);
        exit();
    }
}

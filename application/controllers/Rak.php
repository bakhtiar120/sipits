<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rak extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Rak_model', 'rak');
    }

    function index()
    {
        $data["rak"] = $this->rak->rak();
        $this->load->view('admin/rak', $data);
    }

    public function simpan_rak()
    {
        $hasil = $this->rak->simpanRak();
        if ($hasil == 1) {
            $this->session->set_flashdata(
                'hasil',
                '<div class="alert alert-success col-12">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h5><i class="icon fa fa-check"></i> Berhasil!</h5>
               Rak berhasil disimpan.
            </div>'
            );
        } else {
            $this->session->set_flashdata(
                'hasil',
                '<div class="alert alert-warning alert-dismissible col-12">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <h5><i class="icon fas fa-exclamation-triangle"></i> Gagal!</h5>
                      Rak gagal simpan.
                    </div>'
            );
        }
        redirect('rak');
    }
}

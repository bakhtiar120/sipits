<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('User_model', 'users');
    }

    function index()
    {
        $data["users"] = $this->users->user();
        $data["role"] = $this->users->role();
        $this->template->display_admin('users', 'User', $data);
    }

    function tambah()
    {
        $data["menu"] = $this->users->menu();
        $this->template->display_admin('users_add', 'User Add', $data);
    }

    function edit($id)
    {
        $data["menu"] = $this->users->menu();
        $data["users"] = $this->users->users_all($id);
        $this->template->display_admin('users_edit', 'User Edit', $data);
    }

    public function simpan()
    {
        $hasil = $this->users->simpanUser();
        if ($hasil == 1) {
            $this->session->set_flashdata(
                'hasil',
                '<div class="alert alert-success col-12">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h5><i class="icon fa fa-check"></i> Berhasil!</h5>
               User berhasil disimpan.
            </div>'
            );
        } else {
            $this->session->set_flashdata(
                'hasil',
                '<div class="alert alert-warning alert-dismissible col-12">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <h5><i class="icon fas fa-exclamation-triangle"></i> Gagal!</h5>
                      User gagal simpan.
                    </div>'
            );
        }
        redirect('users');
    }

    public function simpanEdit()
    {
        $hasil = $this->users->simpanEdit();
        if ($hasil == 0) {
            $this->session->set_flashdata(
                'hasil',
                '<div class="alert alert-warning alert-dismissible col-12">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-exclamation-triangle"></i> Gagal!</h5>
                  Data Master User gagal update.
                </div>'
            );
        } else {
            $this->session->set_flashdata(
                'hasil',
                '<div class="alert alert-success col-12">
		      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		      <h5><i class="icon fa fa-check"></i> Berhasil!</h5>
		       Data Master User berhasil update.
		    </div>'
            );
        }

        redirect('users');
    }
}

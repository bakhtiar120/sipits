<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("user_model");
        $this->load->library('form_validation');
        $this->load->library('session');
        // if ($this->user_model->isNotLogin()===FALSE) redirect(site_url('admin'));


    }

    public function index()
    {
        if ($this->session->userdata('user_logged')) {
            // do something when exist
            redirect(site_url('admin'));
        } else {
            // do something when doesn't exist
            if ($this->input->post()) {
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                if ($username == '' && $password == '') {
                    $this->session->set_flashdata(
                        'login',
                        ' <div class="alert alert-warning" role="alert">
                        Email dan Password Harus Diisi
                    </div>'
                    );
                } else if ($username = '') {
                    $this->session->set_flashdata(
                        'login',
                        ' <div class="alert alert-warning" role="alert">
                    Email Harus diisi
                    </div>'
                    );
                } else if ($password == '') {
                    $this->session->set_flashdata(
                        'login',
                        ' <div class="alert alert-warning" role="alert">
                        Password Harus diisi
                        </div>'
                    );
                } else {
                    if ($this->user_model->doLogin())
                        redirect(site_url('admin'));
                    else
                    $this->session->set_flashdata(
                        'login',
                        ' <div class="alert alert-warning" role="alert">
                        Email atau Password Salah
                        </div>'
                    );
                }
            }
        }
        


        $this->load->view('login');
    }

    public function logout()
    {
        // hancurkan semua sesi
        $this->session->sess_destroy();
        redirect(site_url('login'));
    }
}

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        // $this->load->model(array('petugas_model','log_model'));

        // if($this->session->userdata('data_petugas')){
        //     $data_petugas = $this->session->userdata('data_petugas');

            

            
        //         if($data_petugas['role'] == '4')
        //         {
        //             redirect('admin');
        //         }
        //         else
        //         {
        //             redirect('petugas');
        //         }
            
           
        // }
       

        
    }

    public function index()
    {

        $data = array();
        if ($this->input->post()) {
             $username = $this->input->post('username');
             $password = $this->input->post('password');

             //print_r($username);
            // print_r($password);
             if ($username == "admin@admin.com" && $password == "admin") {
                 //$this->log_model->set_log("Login");

                 //$data_petugas = $this->session->userdata('data_petugas');
                
                 //print_r("Anda masuk");
             	redirect('admin');
             } else {
             	print_r("admin@admin.com admin");
                //redirect('login');
             }
        } else {
             $this->load->view('login');
        }
    }
}
<?php

class User_model extends CI_Model
{
    // private $_table = "user";

    function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('default', true);
    }
    public function doLogin()
    {
        $post = $this->input->post();

        // cari user berdasarkan email dan username
        // var_dump($post['username']);
        $this->db->where('username', $post['username']); // Produces: WHERE name = 'Joe'
        $user = $this->db->get('user')->row();
        // var_dump($user);
        // jika user terdaftar
        if ($user) {
            // periksa password-nya
            $isPasswordTrue = password_verify($post['password'], $user->password);
            

            // jika password benar dan dia admin
            if ($isPasswordTrue) {
                // login sukses yay!
                $this->session->set_userdata(['user_logged' => $user]);
                // $this->_updateLastLogin($user->user_id);
                return true;
            }
        }

        // login gagal
        return false;
    }

    public function isNotLogin()
    {
        return $this->session->userdata('user_logged') === null;
    }

    private function _updateLastLogin($user_id)
    {
        $sql = "UPDATE {$this->_table} SET last_login=now() WHERE user_id={$user_id}";
        $this->db->query($sql);
    }
}

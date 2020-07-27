<?php

class Helper_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('default', true);
    }

    function cekIdDosen($nidn)
    {
        $query = $this->db->query("select id from dosen where nidn = '$nidn'");
        return $query->row()->id;
    }
}

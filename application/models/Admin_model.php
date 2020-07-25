<?php

class Admin_model extends CI_Model  {

	function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('default', true);
    }




    
    /*
    function update_departemen($id_departemen, $data)
    {

        $this->db->trans_start();

        $this->db->where('id_departemen', $id_departemen);
        $this->db->update('departemen', $data);

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) return false;
        return true;
    }

    function hapus_departemen($id_departemen)
    {

        $this->db->trans_start();

        $this->db->where('id_departemen', $id_departemen);
        $this->db->delete('departemen');

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) return false;
        return true;
    }
    */
}
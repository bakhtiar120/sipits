<?php

class Kp_model extends CI_Model  {

	function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('default', true);
    }


    function tambah_kp($data)
    {

        //print_r("expression");
        $this->db->trans_start();
        $this->db->insert('data_kp', $data);
        $this->db->insert_id();
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) return 0;
        return true;
    }

    function get_kp_all()
    {

        $this->db->order_by("nama", "asc");
        $query = $this->db->get('data_kp');
        return $query->result_array();
    }

    function get_kp_by_id($id)
    {

        $this->db->where('id_kp', $id); // Produces: WHERE name = 'Joe'
        $query = $this->db->get('data_kp');
        return $query->result_array();
    }

    function hapus_kp($id)
    {

        $this->db->trans_start();
        $this->db->where('id_kp', $id);
        $this->db->delete('data_kp');
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) return 0;
        return true;
    }

    function update_status_kp($id_kp, $status)
    {

        $this->db->trans_start();

         $data = array(
                'status' => $status
                
        );

        $this->db->where('id_kp', $id_kp);
        $this->db->update('data_kp', $data);

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) return 0;
        return true;
    }

    function update_kp($id_kp, $data)
    {

        $this->db->trans_start();

        $this->db->where('id_kp', $id_kp);
        $this->db->update('data_kp', $data);

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) return 0;
        return true;
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
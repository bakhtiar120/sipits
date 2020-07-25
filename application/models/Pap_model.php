<?php

class Pap_model extends CI_Model  {

	function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('default', true);
    }


    function tambah_pap($data)
    {

        //print_r("expression");
        $this->db->trans_start();
        $this->db->insert('data_pap', $data);
        $this->db->insert_id();
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) return 0;
        return true;
    }

    function get_pap_all()
    {

        $this->db->order_by("nama", "asc");
        $query = $this->db->get('data_pap');
        return $query->result_array();
    }

    function get_pap_by_id($id)
    {

        $this->db->where('id_pap', $id); // Produces: WHERE name = 'Joe'
        $query = $this->db->get('data_pap');
        return $query->result_array();
    }

    function hapus_pap($id)
    {

        $this->db->trans_start();
        $this->db->where('id_pap', $id);
        $this->db->delete('data_pap');
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) return 0;
        return true;
    }

    function update_status_pap($id_pap, $status)
    {

        $this->db->trans_start();

         $data = array(
                'status' => $status
                
        );

        $this->db->where('id_pap', $id_pap);
        $this->db->update('data_pap', $data);

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) return 0;
        return true;
    }

    function update_pap($id_pap, $data)
    {

        $this->db->trans_start();

        $this->db->where('id_pap', $id_pap);
        $this->db->update('data_pap', $data);

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) return 0;
        return true;
    }
 
}
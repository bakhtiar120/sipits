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

    function jml_kp()
    {
        $query = $this->db->query("select count(*) jml from data_kp");
        return $query->row()->jml;
    }

    function jml_pap()
    {
        $query = $this->db->query("select count(*) jml from data_pap");
        return $query->row()->jml;
    }

    function jml_kmpi()
    {
        $query = $this->db->query("select count(*) jml from data_kmpi");
        return $query->row()->jml;
    }

    function jml_p3i()
    {
        $query = $this->db->query("select count(*) jml from data_p3i");
        return $query->row()->jml;
    }

    function status_kp($status)
    {
        $query = $this->db->query("select count(*) jml from data_kp where status = '$status'");
        return $query->row()->jml;
    }

    function status_pap($status)
    {
        $query = $this->db->query("select count(*) jml from data_pap where status = '$status'");
        return $query->row()->jml;
    }

    function status_kmpi($status)
    {
        $query = $this->db->query("select count(*) jml from data_kmpi where status = '$status'");
        return $query->row()->jml;
    }

    function status_p3i($status)
    {
        $query = $this->db->query("select count(*) jml from data_p3i where status = '$status'");
        return $query->row()->jml;
    }
}

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

    function get_judul($judul, $table)
    {
        if ($table == "kp") {
            $query = $this->db->query("select *, id_kp as id from data_kp where lower(judul) like '%" . $judul . "%'");
        } else if ($table == "pap") {
            $query = $this->db->query("select *, id_pap as id, nama_ketua as nama, departemen_ketua as departemen, universitas_ketua as universitas, email_ketua as email from data_pap where lower(judul) like '%" . $judul . "%'");
        } else if ($table == "p3i") {
            $query = $this->db->query("select *, id_p3i as id from data_p3i where lower(judul) like '%" . $judul . "%'");
        } else {
            $query = $this->db->query("select *, dept as departemen, univ as universitas, id_kp as id, judul_publikasi as judul from data_kmpi where lower(judul_publikasi) like '%" . $judul . "%'");
        }
        return $query->result();
    }

    public function update_luaran($tata)
    {
        // print_r($tata);
        // die();
        $status = $tata["status"];
        $id = $tata["id"];
        $upload = $tata["upload"];
        $table = $tata["luaran"];
        if ($table == "kp") {
            $query = $this->db->query("update data_kp set status = '$status', luaran = '$upload' where id_kp = '$id'");
        } else if ($table == "pap") {
            $query = $this->db->query("update data_pap set status = '$status', luaran = '$upload' where id_pap = '$id'");
        } else if ($table == "p3i") {
            $query = $this->db->query("update data_p3i set status = '$status', luaran = '$upload' where id_p3i = '$id'");
        } else {
            $query = $this->db->query("update data_kmpi set status = '$status', luaran = '$upload' where id_kmpi = '$id'");
        }

        if ($query) {
            return 1;
        } else {
            return 0;
        }
    }
}

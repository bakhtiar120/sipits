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
            return $query->result();
        } else if ($table == "pap") {
            $query = $this->db->query("select *, id_pap as id, nama_ketua as nama, departemen_ketua as departemen, universitas_ketua as universitas, email_ketua as email from data_pap where lower(judul) like '%" . $judul . "%'");
            return $query->result();
        } else if ($table == "p3i") {
            $query = $this->db->query("select *, id_p3i as id, judul1 as judul from data_p3i where lower(judul1) like '%" . $judul . "%'");
            if (empty($query->result())) {
                $query1 = $this->db->query("select *, id_p3i as id, judul2 as judul from data_p3i where lower(judul2) like '%" . $judul . "%'");
                if (empty($query1->result())) {
                    $query2 = $this->db->query("select *, id_p3i as id, judul3 as judul from data_p3i where lower(judul3) like '%" . $judul . "%'");
                    return $query2->result();
                } else {
                    return $query1->result();
                }
            } else {
                return $query->result();
            }
        } else if ($table == "bpup") {
            $query = $this->db->query("select *, id_bpup as id, nomor_induk as nidn from data_bpup where lower(judul) like '%" . $judul . "%'");
            return $query->result();
        } else {
            $query = $this->db->query("select *, dept as departemen, univ as universitas, id_kp as id, judul_publikasi as judul from data_kmpi where lower(judul_publikasi) like '%" . $judul . "%'");
            return $query->result();
        }
    }

    public function update_luaran($tata)
    {
        // print_r($tata);
        // die();
        $status = $tata["status_luaran"];
        $id = $tata["id"];
        $upload = $tata["upload"];
        $judul = $tata["judul"];
        $table = $tata["luaran"];
        if ($table == "kp") {
            $query = $this->db->query("update data_kp set status_luaran = '$status', luaran = '$upload' where id_kp = '$id'");
        } else if ($table == "pap") {
            $query = $this->db->query("update data_pap set status_luaran = '$status', luaran = '$upload' where id_pap = '$id'");
        } else if ($table == "p3i") {
            $query = $this->db->query("select *, id_p3i as id from data_p3i where lower(judul1) like '%" . $judul . "%'");
            if (empty($query->result())) {
                $query1 = $this->db->query("select *, id_p3i as id from data_p3i where lower(judul2) like '%" . $judul . "%'");
                if (empty($query1->result())) {
                    $query2 = $this->db->query("select *, id_p3i as id from data_p3i where lower(judul3) like '%" . $judul . "%'");
                    $query = $this->db->query("update data_p3i set status_luaran3 = '1', luaran3 = '$upload' where id_p3i = '$id'");
                } else {
                    $query = $this->db->query("update data_p3i set status_luaran2 = '1', luaran2 = '$upload' where id_p3i = '$id'");
                }
            } else {
                $query = $this->db->query("update data_p3i set status_luaran1 = '1', luaran1 = '$upload' where id_p3i = '$id'");
            }
        } else if ($table == "bpup") {
            $jenis_luaran = $tata["jenis_luaran"];
            $isi_luaran = $tata["isi_luaran"];
            if ($jenis_luaran == 1) {
                $jenis_luaran =
                    'Jurnal Internasional';
            } else if ($jenis_luaran == 2) {
                $jenis_luaran = 'Publikasi Seminar Internasional';
            } else if ($jenis_luaran == 3) {
                $jenis_luaran = 'Produk';
            } else if ($jenis_luaran == 4) {
                $jenis_luaran = 'Prototipe';
            } else if ($jenis_luaran == 5) {
                $jenis_luaran = 'HKI';
            } else {
                $jenis_luaran = 'Lainnya';
            }
            $query = $this->db->query("update data_bpup set status_luaran = '$status', luaran = '$upload', jenis_luaran = '$jenis_luaran', isi_luaran = '$isi_luaran' where id_bpup = '$id'");
        } else {
            $query = $this->db->query("update data_kmpi set status_luaran = '$status', luaran = '$upload' where id_kmpi = '$id'");
        }

        if ($query) {
            return 1;
        } else {
            return 0;
        }
    }

    function cekKategori($id)
    {
        $query = $this->db->query("select kategori from kategori where id_kategori = '$id'");
        return $query->row()->kategori;
    }

    function cekStatusSoftCopy($id)
    {
        $query = $this->db->query("select * from detail_arsip a join kategori b on a.id_kategori=b.id_kategori where id_arsip = '$id'");
        
        return $query->result();
    }
}

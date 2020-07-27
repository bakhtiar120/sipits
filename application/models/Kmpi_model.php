<?php

class Kmpi_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('default', true);
    }


    function tambah_kmpi($data)
    {
        $nomor_induk = $data["nomor_induk"];
        $nidn_pengusul = $this->nidn($nomor_induk);
        if ($nidn_pengusul == 0) {
            $dosen = array(
                'nama' => $data["nama"],
                'nidn' => $data["nomor_induk"],
                'nip' => $data["nomor_induk"],
                'alamat' => $data["alamat_kantor"],
                'email' => $data["email"],
                'departemen' => $data["dept"],
                'telepon' => $data["no_hp"],
                'universitas' => $data["univ"]
            );
            $this->simpan_dosen($dosen);
        }
        $nomor_pembimbing = $data["nomor_pembimbing"];
        $nidn_pembimbing = $this->nidn($nomor_pembimbing);
        if ($nidn_pembimbing == 0) {
            $dosen2 = array(
                'nama' => $data["nama_pembimbing"],
                'nidn' => $data["nomor_pembimbing"],
                'nip' => $data["nomor_pembimbing"],
                'telepon' => $data["hp_pembimbing"],
                'email' => $data["email_pembimbing"],
                'departemen' => $data["departemen_pembimbing"],
                'fakultas' => $data["fakultas_pembimbing"]
            );
            $this->simpan_dosen($dosen2);
        }

        $this->db->trans_start();
        $this->db->insert('data_kmpi', $data);
        $this->db->insert_id();
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return 0;
        } else {
            $this->db->trans_commit();
            return 1;
        }
    }

    function nidn($nomor)
    {
        $query = $this->db->query("select count(nidn) jml from dosen where nidn = '$nomor'");
        return $query->row()->jml;
    }

    function get_dosen($nomor)
    {
        $query = $this->db->query("select * from dosen where nidn = '$nomor'");
        return $query->result();
    }

    function simpan_dosen($data)
    {
        $this->db->trans_start();
        $this->db->insert('dosen', $data);
        $this->db->insert_id();
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) return 0;
        return true;
    }
}

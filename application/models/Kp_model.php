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
        $nomor_induk = $data["nomor_induk"];
        $nidn_pengusul = $this->nidn($nomor_induk);
        if ($nidn_pengusul == 0) {
            $dosen = array(
                'nama' => $data["nama"],
                'nidn' => $data["nomor_induk"],
                'nip' => $data["nomor_induk"],
                'alamat' => $data["alamat_kantor"],
                'email' => $data["email"],
                'departemen' => $data["departemen"],
                'telepon' => $data["no_hp"],
                'universitas' => $data["universitas"]
            );
            $this->simpan_dosen($dosen);
        }
        $this->db->trans_start();
        $this->db->insert('data_kp', $data);
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
        $query = $this->db->query("select count(nip) jml from dosen where nip = '$nomor'");
        return $query->row()->jml;
    }

    function get_dosen($nomor)
    {
        $query = $this->db->query("select * from dosen where nip = '$nomor'");
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
<?php

class P3i_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('default', true);
    }


    function tambah_p3i($data)
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
        $this->db->insert('data_p3i', $data);
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

    function get_all()
    {

        $this->db->order_by("tanggal_submit", "desc");
        $query = $this->db->get('data_p3i');
        return $query->result_array();
    }

    function get_by_id($id)
    {
        $this->db->where('id_p3i', $id);
        $query = $this->db->get('data_p3i');
        return $query->result_array();
    }

    function update_p3i($id_p3i, $data)
    {
        $this->update_dosen($data);
        $this->db->trans_start();

        $this->db->where('id_p3i', $id_p3i);
        $this->db->update('data_p3i', $data);

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) return 0;
        return true;
    }

    function update_dosen($data)
    {

        $dosen1 = array(
            'nama' => $data['nama'],
            'nidn' => $data['nomor_induk'],
            'nip' => $data['nomor_induk'],
            'alamat' => $data['alamat_kantor'],
            'telepon' => $data['no_hp']
        );
        $this->db->where('id', cekIdDosen($data['nomor_induk']));
        $this->db->update('dosen', $dosen1);
    }

    function hapus_p3i($id)
    {

        $this->db->trans_start();
        $this->db->where('id_p3i', $id);
        $this->db->delete('data_p3i');
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) return 0;
        return true;
    }

    function update_status_p3i($id_p3i, $status)
    {

        $this->db->trans_start();

        $data = array(
            'status' => $status

        );

        $this->db->where('id_p3i', $id_p3i);
        $this->db->update('data_p3i', $data);

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) return 0;
        return true;
    }
}

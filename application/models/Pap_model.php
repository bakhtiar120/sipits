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
        $nomor_induk = $data["nomor_induk_ketua"];
        $nidn_pengusul = $this->nidn($nomor_induk);
        if ($nidn_pengusul == 0) {
            $dosen = array(
                'nama' => $data["nama_ketua"],
                'nidn' => $data["nomor_induk_ketua"],
                'nip' => $data["nomor_induk_ketua"],
                'alamat' => $data["alamat_ketua"],
                'email' => $data["email_ketua"],
                'departemen' => $data["departemen_ketua"],
                'telepon' => $data["no_hp_ketua"],
                'universitas' => $data["universitas_ketua"]
            );
            $this->simpan_dosen($dosen);
        }
        $nrp = $data["nomor_induk_ap"];
        $nrp_pengusul = $this->nrp($nrp);
        if($nrp_pengusul==0) {
            $mahasiswa = array(
                'nama' => $data["nama_ap"],
                'nrp' => $data["nomor_induk_ap"],
                'nik' => $data["nomor_induk_ap"],
                'alamat_KTP' => $data["alamat_ktp_ap"],
                'alamat_domisili' => $data["alamat_domisili_ap"],
                'email' => $data["email_ap"],
                'no_hp' => $data["no_hp_ap"],
                'departemen' => "Oke",
                'fakultas' => "Oke",
                'universitas' => "Oke"
            );
            $this->simpan_mahasiswa($mahasiswa);
        }
        $this->db->trans_start();
        $this->db->insert('data_pap', $data);
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
    function nrp($nomor)
    {
        $query = $this->db->query("select count(nrp) jml from mahasiswa where nrp = '$nomor'");
        return $query->row()->jml;
    }

    function get_dosen($nomor)
    {
        $query = $this->db->query("select * from dosen where nidn = '$nomor'");
        return $query->result();
    }

    function get_mahasiswa($nomor)
    {
        $query = $this->db->query("select * from mahasiswa where nrp = '$nomor'");
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

    function simpan_mahasiswa($data)
    {
        $this->db->trans_start();
        $this->db->insert('mahasiswa', $data);
        $this->db->insert_id();
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) return 0;
        return true;
    }

    function get_pap_all()
    {

        $this->db->order_by("nama_ketua", "asc");
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
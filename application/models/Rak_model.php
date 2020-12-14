<?php

class Rak_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('default', true);
    }

    public function rak()
    {
        $query = $this->db->query("select * from rak");
        return $query->result();
    }

    public function get_rak_by_id($id)
    {
        $this->db->select('data_arsip.judul as judul, data_arsip.nama_ketua as nama_ketua,data_arsip.tahun as tahun,data_arsip.skema as skema ,data_arsip.sumber as sumber, data_arsip.dana_disetujui as dana_disetujui');
        $this->db->from('data_arsip');
        $this->db->join('detail_rak', 'data_arsip.id_detail=detail_rak.id_detail');
        $this->db->join('rak','rak.id_rak=detail_rak.id_rak');
        $this->db->where('rak.id_rak',$id);
        $query = $this->db->get();
        return $query->result();
    }
    

    public function simpanRak()
    {
        $id_rak = $this->input->post("id_rak");
        $nama_rak = $this->input->post("nama_rak");
        $posisi = $this->input->post("posisi");
        $jumlah_kolom = $this->input->post("jumlah_kolom");
        $jumlah_baris = $this->input->post("jumlah_baris");
        $tgl_beli = date_format(date_create($this->input->post("tgl_beli")), 'Y-m-d');
        if (empty($id_rak)) {
            $query = $this->db->query("insert into rak values (null,'$nama_rak','$posisi','$jumlah_kolom','$jumlah_baris','$tgl_beli')");
        } else {
            $query = $this->db->query("update rak set nama_rak = '$nama_rak', posisi = '$posisi', jumlah_kolom = '$jumlah_kolom', jumlah_baris = '$jumlah_baris', tgl_beli = '$tgl_beli' where id_rak = '$id_rak'");
        }

        if ($query) {
            return 1;
        } else {
            return 0;
        }
    }

    public function lihatRak()
    {
        $id_arsip = $this->input->post("id_arsip");
        $query = $this->db->query("select nama_rak, nomor_baris, nomor_kolom, keterangan from data_arsip a join detail_rak b on a.id_detail=b.id_detail join rak c on b.id_rak=c.id_rak where id_arsip = '$id_arsip'");
        return $query->row();
    }

    public function cekRak()
    {
        $id_rak = $this->input->post("id_rak");
        $query = $this->db->query("select jumlah_kolom, jumlah_baris from rak where id_rak = '$id_rak'");
        return $query->row();
    }


    function update_rak($id_rak, $data)
    {

        $this->db->trans_start();

        $this->db->where('id_rak', $id_rak);
        $this->db->update('rak', $data);

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) return 0;
        return true;
    }
}

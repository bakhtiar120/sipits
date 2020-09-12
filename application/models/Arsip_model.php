<?php

class Arsip_model extends CI_Model
{
    protected $table = 'data_arsip';
    protected $column_order = array('id_arsip', 'no', 'tahun', 'skema', 'sumber', 'judul', 'departemen', 'fakultas', 'dana_disetujui', 'nomor_kontrak', 'kode_kontrak', 'tgl_kontrak', 'nomor_sk', 'kode_sk', 'tgl_sk', 'kode_unik', 'dana_sisa');
    protected $column_search = array('id_arsip', 'no', 'tahun', 'skema', 'sumber', 'judul', 'departemen', 'fakultas', 'dana_disetujui', 'dana_sisa', 'nomor_kontrak', 'kode_kontrak', 'tgl_kontrak', 'nomor_sk', 'kode_sk', 'tgl_sk', 'kode_unik', 'tgl_submit');
    protected $order = array('id_arsip' => 'asc');
    function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('default', true);
    }

    private function _get_datatables_query()
    {
        $this->db->from($this->table);

        $i = 0;

        foreach ($this->column_search as $item) {
            if ($_POST['search']['value']) {

                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);

        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    private function _get_datatables_query2()
    {
        $tahun = str_replace('.', '', $this->input->post("tahun"));
        $skema = str_replace('.', '', $this->input->post("skema"));
        $dep = str_replace('.', '', $this->input->post("departemen"));
        $fak = str_replace('.', '', $this->input->post("fakultas"));
        if (!empty($tahun)) {
            $this->db->where("tahun", $tahun);
        }
        if (!empty($skema)) {
            $this->db->where("skema", $skema);
        }
        if (!empty($dep)) {
            $this->db->where("departemen", $dep);
        }
        if (!empty($fak)) {
            $this->db->where("fakultas", $fak);
        }
        $this->db->from($this->table);

        $i = 0;

        foreach ($this->column_search as $item) {
            if ($_POST['search']['value']) {

                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables2($post)
    {

        $this->_get_datatables_query2();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);

        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered2()
    {
        $this->_get_datatables_query2();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all2($post)
    {
        $tahun = $this->input->post("tahun");
        $skema = $this->input->post("skema");
        $dep = $this->input->post("departemen");
        $fak = $this->input->post("fakultas");
        if (!empty($tahun)) {
            $this->db->where("tahun", $tahun);
        }
        if (!empty($skema)) {
            $this->db->where("skema", $skema);
        }
        if (!empty($dep)) {
            $this->db->where("departemen", $dep);
        }
        if (!empty($fak)) {
            $this->db->where("fakultas", $fak);
        }
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function tahun()
    {
        $query = $this->db->query("select distinct tahun from data_arsip where tahun != '' order by tahun desc");
        return $query->result();
    }

    public function skema()
    {
        $query = $this->db->query("select distinct skema from data_arsip where skema != ''");
        return $query->result();
    }

    public function departemen()
    {
        $query = $this->db->query("select distinct departemen from data_arsip where departemen != ''");
        return $query->result();
    }

    public function fakultas()
    {
        $query = $this->db->query("select distinct fakultas from data_arsip where fakultas != ''");
        return $query->result();
    }

    public function cekEdit()
    {
        $id_arsip = $this->input->post("id_arsip");
        $query = $this->db->query("select *, replace(FORMAT(dana_disetujui, 0),',','.') setujui, replace(FORMAT(dana_sisa, 0),',','.') sisa from data_arsip where id_arsip = '$id_arsip'");
        return $query->row();
    }

    public function updateSisa()
    {
        $id_arsip = $this->input->post("id_arsip");
        $terpakai = str_replace(".", "", $this->input->post("terpakai"));
        $query = $this->db->query("update data_arsip set sptb = '$terpakai', dana_sisa = dana_disetujui-'$terpakai' where id_arsip = '$id_arsip' ");
        if ($query) {
            return 1;
        } else {
            return 0;
        }
    }

    public function updateRak()
    {
        $id_arsip = $this->input->post("id_arsip");
        $id_rak = $this->input->post("id_rak");
        $kolom = $this->input->post("kolom");
        $baris = $this->input->post("baris");
        $keterangan = $this->input->post("keterangan");
        $cekIdDetail = $this->db->query("select id_detail from data_arsip where id_arsip = '$id_arsip'");
        if (!empty($cekIdDetail->row()->id_detail)) {
            $id_detail = $cekIdDetail->row()->id_detail;
            $query = $this->db->query("update detail_rak set nomor_kolom = '$kolom', nomor_baris = '$baris', keterangan = '$keterangan' where id_detail = '$id_detail'");
        } else {
            $query = $this->db->query("insert into detail_rak values (null,'$id_rak','$baris','$kolom','$keterangan')");
            $idDetail = $this->db->query("select max(id_detail) detail from detail_rak")->row()->detail;
            $update = $this->db->query("update data_arsip set id_detail = '$idDetail' where id_arsip = '$id_arsip'");
        }
        if ($query) {
            return 1;
        } else {
            return 0;
        }
    }

    public function simpanPenerima()
    {
        $id = $this->input->post('id_arsip3');
        $editStatus = $this->input->post('editStatus');
        $nama_pengirim = $this->input->post('nama_pengirim');
        $hp = $this->input->post('no_hp_pengirim');
        $nama_penerima = $this->input->post('nama_penerima');
        $cekKategori = $this->db->query("select id_kategori from kategori");
        if ($editStatus == 1) {
            foreach ($this->input->post('status') as $check) {
                $update = $this->db->query("update detail_arsip set status = '1' where id_arsip = '$id' and id_kategori = '$check'");
            }
            $query = $this->db->query("update tanda_terima set nama_pengirim='$nama_pengirim',hp='$hp',nama_penerima='$nama_penerima' where id_arsip = '$id'");
        } else {
            foreach ($cekKategori->result() as $value) {
                $inputStatus = $this->db->query("insert into detail_arsip values (null,'$id','$value->id_kategori','0')");
                foreach ($this->input->post('status') as $check) {
                    if ($value->id_kategori == $check) {
                        $update = $this->db->query("update detail_arsip set status = '1' where id_arsip = '$id' and id_kategori = '$check'");
                    }
                }
            }
            $tgl = date("Y-m-d");
            $query = $this->db->query("insert into tanda_terima values (null,'$id','$nama_pengirim','$hp','$nama_penerima','$tgl')");
        }
    }

    public function data_arsip($id)
    {
        $query = $this->db->query("select * from data_arsip where id_arsip = '$id'");
        return $query->row();
    }

    public function tanda_terima($id)
    {
        $query = $this->db->query("select * from tanda_terima where id_arsip = '$id'");
        return $query->row();
    }

    public function detail_data_arsip($id)
    {
        $query = $this->db->query("select * from detail_arsip a join kategori b on a.id_kategori=b.id_kategori where id_arsip = '$id'");
        return $query->result();
    }

    public function kategori()
    {
        $query = $this->db->query("select * from kategori");
        return $query->result();
    }

    public function kategori_edit($id, $id_kategori)
    {
        $query = $this->db->query("select status from detail_arsip  where id_arsip = '$id' and id_kategori = '$id_kategori'");
        if (!empty($query->row())) {
            return $query->row()->status;
        } else {
            return 0;
        }
    }
}

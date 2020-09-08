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
        $query = $this->db->query("select * from data_arsip where id_arsip = '$id_arsip'");
        return $query->row();
    }

    public function updateSisa()
    {
        $id_arsip = $this->input->post("id_arsip");
        $sisa = $this->input->post("sisa");
        $query = $this->db->query("update data_arsip set dana_sisa = '$sisa' where id_arsip = '$id_arsip' ");
        if ($query) {
            return 1;
        } else {
            return 0;
        }
    }
}

<?php

class Arsip_model extends CI_Model
{
    protected $table = 'data_arsip';
    protected $column_order = array('id_arsip', 'no', 'tahun', 'skema', 'sumber', 'judul', 'departemen', 'fakultas', 'dana_disetujui', 'nomor_kontrak', 'kode_kontrak', 'tgl_kontrak', 'nomor_sk', 'kode_sk', 'tgl_sk', 'kode_unik');
    protected $column_search = array('id_arsip', 'no', 'tahun', 'skema', 'sumber', 'judul', 'departemen', 'fakultas', 'dana_disetujui', 'nomor_kontrak', 'kode_kontrak', 'tgl_kontrak', 'nomor_sk', 'kode_sk', 'tgl_sk', 'kode_unik', 'tgl_submit');
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

    private function _get_datatables_query2($post)
    {
        $tahun = $post->tahun;
        $skema = $post->skema;
        $dep = $post->dep;
        $fak = $post->fak;
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
        $tahun = $post->tahun;
        $skema = $post->skema;
        $dep = $post->dep;
        $fak = $post->fak;
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


        $this->_get_datatables_query2($post);
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
        $tahun = $post->tahun;
        $skema = $post->skema;
        $dep = $post->dep;
        $fak = $post->fak;
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
}
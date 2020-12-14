<?php defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('cekIdDosen')) {

    function cekIdDosen($nidn)
    {
        $CI = get_instance();
        $CI->load->model('Helper_model', 'helper');
        $id = $CI->helper->cekIdDosen($nidn);
        return $id;
    }
}

if (!function_exists('jml_kp')) {

    function jml_kp()
    {
        $CI = get_instance();
        $CI->load->model('Helper_model', 'helper');
        $id = $CI->helper->jml_kp();
        return $id;
    }
}

if (!function_exists('jml_pap')) {

    function jml_pap()
    {
        $CI = get_instance();
        $CI->load->model('Helper_model', 'helper');
        $id = $CI->helper->jml_pap();
        return $id;
    }
}

if (!function_exists('jml_kmpi')) {

    function jml_kmpi()
    {
        $CI = get_instance();
        $CI->load->model('Helper_model', 'helper');
        $id = $CI->helper->jml_kmpi();
        return $id;
    }
}

if (!function_exists('jml_p3i')) {

    function jml_p3i()
    {
        $CI = get_instance();
        $CI->load->model('Helper_model', 'helper');
        $id = $CI->helper->jml_p3i();
        return $id;
    }
}

if (!function_exists('status_kp')) {

    function status_kp($status)
    {
        $CI = get_instance();
        $CI->load->model('Helper_model', 'helper');
        $id = $CI->helper->status_kp($status);
        return $id;
    }
}

if (!function_exists('status_pap')) {

    function status_pap($status)
    {
        $CI = get_instance();
        $CI->load->model('Helper_model', 'helper');
        $id = $CI->helper->status_pap($status);
        return $id;
    }
}

if (!function_exists('status_kmpi')) {

    function status_kmpi($status)
    {
        $CI = get_instance();
        $CI->load->model('Helper_model', 'helper');
        $id = $CI->helper->status_kmpi($status);
        return $id;
    }
}

if (!function_exists('status_p3i')) {

    function status_p3i($status)
    {
        $CI = get_instance();
        $CI->load->model('Helper_model', 'helper');
        $id = $CI->helper->status_p3i($status);
        return $id;
    }
}

if (!function_exists('cetak')) {
    function cetak($str)
    {
        $cetak = htmlentities($str, ENT_QUOTES, 'UTF-8');
        return $cetak;
    }
}

if (!function_exists('nominal')) {

    function nominal($val)
    {
        return number_format($val, 0, "", ".");
    }
}

if (!function_exists('tgl')) {

    function tgl($val)
    {
        return date_format(date_create($val), 'd-M-Y');
    }
}

if (!function_exists('tgl2')) {

    function tgl2($val)
    {
        return date_format(date_create($val), 'd/m/Y');
    }
}

if (!function_exists('cekStatusKategori')) {

    function cekStatusKategori($id_arsip, $id_kategori)
    {
        $CI = get_instance();
        $CI->load->model('Arsip_model', 'arsip');
        $status = $CI->arsip->kategori_edit($id_arsip, $id_kategori);
        return $status;
    }
}

if (!function_exists('cekNamaKategori')) {

    function cekNamaKategori($id_kategori)
    {
        $CI = get_instance();
        $CI->load->model('Helper_model', 'helper');
        $status = $CI->helper->cekKategori( $id_kategori);
        return $status;
    }
}

if (!function_exists('cekStatusUnggahan')) {

    function cekStatusUnggahan($id_arsip, $id_kategori)
    {
        $CI = get_instance();
        $CI->load->model('Arsip_model', 'arsip');
        $status = $CI->arsip->kategori_status_unggahan($id_arsip, $id_kategori);
        return $status;
    }
}

if (!function_exists('cekRole')) {

    function cekRole($id_user, $kode_menu, $role)
    {
        $CI = get_instance();
        $CI->load->model('User_model', 'users');
        $status = $CI->users->cekRole($id_user, $kode_menu, $role);
        return $status;
    }
}

if (!function_exists('cekstatusSoftCopy')) {

    function cekstatusSoftCopy($id_arsip,$status_cek)
    {
        $CI = get_instance();
        $CI->load->model('Helper_model', 'helper');
        $status = $CI->helper->cekstatusSoftCopy($id_arsip);
        $softcopy = '';
        foreach($status as $row)
        {
            if($status_cek=="softcopy") {
                if ($row->status_upload == 1) {
                    $softcopy = $softcopy . $CI->helper->cekKategori($row->id_kategori) . ', ';
                }
            }
            else if($status_cek=="hardcopy") {
                if($row->status==1) {
                    $softcopy = $softcopy . $CI->helper->cekKategori($row->id_kategori) . ', ';
                }
            }
            
        }
        return $softcopy;
    }
}



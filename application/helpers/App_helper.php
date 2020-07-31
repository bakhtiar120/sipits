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

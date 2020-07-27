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

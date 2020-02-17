<?php


if (!function_exists('url_value_encode')) {

    function url_value_encode($param) {
        $CI = & get_instance();
        $CI->load->library('encryption');
        $enc = $CI->encryption->encrypt($param);
        return str_replace(array('+', '/', '='), array('-', '_', '~'), $enc);
    }

}
// Decode Url Parameters
if (!function_exists('url_value_decode')) {

    function url_value_decode($param) {
        $CI = & get_instance();
        $CI->load->library('encryption');
        $dec = str_replace(array('-', '_', '~'), array('+', '/', '='), $param);
        return $CI->encryption->decrypt($dec);
    }

}

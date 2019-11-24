<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
// ------------------------------------------------------------------------
// check admin user login return true or false
if (!function_exists('check_login')) {

    function check_login() {
        $CI = & get_instance();
        if ($CI->session->userdata('login_id') && $CI->session->userdata('user_type')) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}


// check admin user login return true or false
if (!function_exists('check_admin')) {

    function check_admin() {
        $CI = & get_instance();
        if ($CI->session->userdata('login_id') && $CI->session->userdata('email')) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}



//user info by user id
if (!function_exists('user_info')) {

    function user_info() {
        $CI = & get_instance();
        $user_id = $CI->session->userdata('login_id');
        $query = $CI->db->get_where('users', array('id' => $user_id));
        $results = $query->row_array();
        if (!empty($results)) {
            return $results;
        } else {
            return FALSE;
        }
    }

}



if (!function_exists('check_level_1')) {

    function check_level_1() {
        $CI = & get_instance();
        $user_id = $CI->session->userdata('login_id');

        $CI->db->select('*');
        $CI->db->from('users as u');
        $CI->db->where_in('u.parent_profession', array('2','3','4','5','6','7','8','9','11','14'));
        $CI->db->where('u.id',$user_id);
        $query = $CI->db->get();
        $results = $query->row_array();

        if (!empty($results)) {
            return $results;
        }
        else {
            return FALSE;
        }

    }

}



/* End of file check_login_helper.php */
/* Location: ./application/helpers/check_login_helper.php */
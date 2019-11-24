<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class FlipDashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!check_login()) {
            redirect('home/login');
        }
    }

    public function index() {

        $data = array();
        $user_type = $this->session->userdata('user_type');

        if($user_type==100)
        {
            $das = "";
        }
        else{
            $das = "Flip Home ";
        }

        $data['page_title'] = $das.'';
        $data['tabActive'] = 'dashboard';
        $data['error'] = '';
        /// TOP 4 box
        $loginId = $this->session->userdata('login_id');

        $data['user_info'] = $this->global_model->get_data('flip_users', array('uid' => $loginId));




        $this->load->view('flip/flip_header', $data);
        $this->load->view('flip/profile/dashboard', $data);
        $this->load->view('flip/flip_footer');

    }

}

?>

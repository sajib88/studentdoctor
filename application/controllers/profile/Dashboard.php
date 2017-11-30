<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!check_login()) {
            redirect('home/login');
        }
    }

    public function index() {

        $data = array();
        $data['page_title'] = 'Dashboard';
        $data['tabActive'] = 'dashboard';
        $data['error'] = '';
        /// TOP 4 box
        $data['classified'] = $this->global_model->count_row('classified');
        $data['personals'] = $this->global_model->count_row('personals');
        $data['forum'] = $this->global_model->count_row('forum_category');
        $data['forumPost'] = $this->global_model->count_row('forum_post');
        //$data['photos'] = $this->global_model->count_row_where('photos', array('ref_name' => 'image_album'));
        $data['product'] = $this->global_model->count_row('product');
        //$data['ces'] = $this->global_model->count_row('ces');

        //bottom 4 box
        $data['gorup'] = $this->global_model->count_row('gorupfad');
        $data['product'] = $this->global_model->count_row('product');
        $data['blog'] = $this->global_model->count_row('insideblog');
        //$data['privatewebsite'] = $this->global_model->count_row('private_website');
        $data['users'] = $this->global_model->count_row('users');
        $data['events'] = $this->global_model->count_row('event');
        $data['public_website'] = $this->global_model->count_row('public_website');

        $loginId = $this->session->userdata('login_id');
        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
       // $data['doctor_appointment'] = $this->global_model->get('appointment', array('doctor_id' => $loginId, 'date' => date("Y-m-d")));
       // $data['message'] = $this->global_model->get_message($loginId);
        //print_r($data['message']);die;
        /// Appointment check
        $data['check_appointment'] = $this->global_model->get_data('public_website', array('user_id' => $loginId, 'appointment' => '1'));
        //// Product Add
        $data['recent_prodcut'] = $this->global_model->get('product');



        $this->load->view('header', $data);
        $this->load->view('profile/dashboard', $data);
        $this->load->view('footer');
    }

}

?>

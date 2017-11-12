<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!check_admin()) {
            redirect('admin/login');
        }
    }

    public function index() {
        $data = array();
        $data['page_title'] = 'Dashboard';
        $data['tabActive'] = 'dashboard';
        $data['error'] = '';

        $data['leadClassified'] = $this->global_model->get('classified', false, array('limit' => '5', 'start' => '0'), array('filed' => 'added', 'order' => 'DESC') );
        $data['leadPersonals'] = $this->global_model->get('personals', false, array('limit' => '5', 'start' => '0'), array('filed' => 'id', 'order' => 'DESC') );
        $data['leadProduct'] = $this->global_model->get('product', false, array('limit' => '5', 'start' => '0'), array('filed' => 'id', 'order' => 'DESC') );
        $data['leadEvent'] = $this->global_model->get('event', false, array('limit' => '5', 'start' => '0'), array('filed' => 'start_date', 'order' => 'DESC') );
        $data['leadBlog'] = $this->global_model->get('blog_front', false, array('limit' => '5', 'start' => '0'), array('filed' => 'date', 'order' => 'DESC') );
        $data['leadPub'] = $this->global_model->get('private_website', false, array('limit' => '5', 'start' => '0'), array('filed' => 'added', 'order' => 'DESC') );

        $data['newComments'] = $this->global_model->get('blog_comments');
//        foreach ($data['leadClassified'] as $row){
//        print_r($row->id);}die;

        $this->load->view('admin/header', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('admin/footer');
    }
}

?>

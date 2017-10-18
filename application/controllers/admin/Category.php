<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!check_admin()) {
            redirect('admin/login');
        }
    }

    public function event() {
        $data = array();
        $data['page_title'] = 'Category Mange';
        $data['tabActive'] = 'Category';
        $data['error'] = '';
        $data['eventactive'] = $this->global_model->get('event_main_cat', array('status' => '1'));
        $data['eventpending'] = $this->global_model->get('event_main_cat', array('status' => '0'));
        $this->load->view('admin/header', $data);
        $this->load->view('admin/category/event', $data);
        $this->load->view('admin/footer');
    }



    public function eventupdate($catid, $status) {
        if ($status == 0) {
            $data['status'] = '1';
        }
        elseif ($status == 1) {

            $data['status'] = '0';
        }
        $this->global_model->update('event_main_cat', $data, array('id' => $catid));
        redirect('admin/category/event');
    }

}

?>

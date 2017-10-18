<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!check_admin()) {
            redirect('admin/login');
        }
    }

    public function event_main_cat() {
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

    public function classified_main_cat() {
        $data = array();
        $data['page_title'] = 'Category Mange';
        $data['tabActive'] = 'Category';
        $data['error'] = '';
        $data['eventactive'] = $this->global_model->get('classified_main_cat', array('status' => '1'));
        $data['eventpending'] = $this->global_model->get('classified_main_cat', array('status' => '0'));
        $this->load->view('admin/header', $data);
        $this->load->view('admin/category/classified', $data);
        $this->load->view('admin/footer');
    }

    public function group_main_cat() {
        $data = array();
        $data['page_title'] = 'Category Mange';
        $data['tabActive'] = 'Category';
        $data['error'] = '';
        $data['eventactive'] = $this->global_model->get('group_main_cat', array('status' => '1'));
        $data['eventpending'] = $this->global_model->get('group_main_cat', array('status' => '0'));
        $this->load->view('admin/header', $data);
        $this->load->view('admin/category/group', $data);
        $this->load->view('admin/footer');
    }

    public function product_main_cat() {
        $data = array();
        $data['page_title'] = 'Category Mange';
        $data['tabActive'] = 'Category';
        $data['error'] = '';
        $data['eventactive'] = $this->global_model->get('product_main_cat', array('status' => '1'));
        $data['eventpending'] = $this->global_model->get('product_main_cat', array('status' => '0'));
        $this->load->view('admin/header', $data);
        $this->load->view('admin/category/product', $data);
        $this->load->view('admin/footer');
    }

    public function insideblog_cat() {
        $data = array();
        $data['page_title'] = 'Category Mange';
        $data['tabActive'] = 'Category';
        $data['error'] = '';
        $data['eventactive'] = $this->global_model->get('insideblog_cat', array('status' => '1'));
        $data['eventpending'] = $this->global_model->get('insideblog_cat', array('status' => '0'));
        $this->load->view('admin/header', $data);
        $this->load->view('admin/category/blog', $data);
        $this->load->view('admin/footer');
    }



    public function eventupdate($catid, $status, $table) {
        if ($status == 0) {
            $data['status'] = '1';
        }
        elseif ($status == 1) {

            $data['status'] = '0';
        }
        $this->global_model->update($table, $data, array('id' => $catid));
        $this->session->set_flashdata('message', 'Category update successfully');
        redirect(base_url('admin/category/'.$table));


    }

}

?>

<?php
/**
 * Created by PhpStorm.
 * User: alam
 * Date: 2/4/2017
 * Time: 9:07 PM
 */

Class Store extends CI_Controller{

    public function __construct() {
        parent::__construct();
        // $this->load->library('File_processing');
        $this->load->helper('global');
        $this->load->library('upload');
        if (!check_login()) {
            redirect('home/login');
        }

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

    }

    public function index(){
        $data = array();
        $data['page_title'] = 'Add Online store';
        $loginId = $this->session->userdata('login_id');

        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
        $data['login_id'] = $loginId;
        $this->load->view('header', $data);
        $this->load->view('store/add_view', $data);
        $this->load->view('footer');

    }

    public function add(){
        $this->form_validation->set_rules('store_name','Store Name','required');
        if($this->form_validation->run() == false){
            $this->index();
        }
        else{
            if(!empty($_POST)){
                $postData = $this->input->post();

                $value = array();
                $value['store_name'] = (!empty($postData['store_name']))?$postData['store_name']:'';
                $value['business'] = (!empty($postData['business']))?$postData['business']:'';
                $value['store_phone'] = (!empty($postData['store_phone']))?$postData['store_phone']:'';
                $value['store_email'] = (!empty($postData['store_email']))?$postData['store_email']:'';
                $value['product'] = (!empty($postData['product']))?$postData['product']:'';
                $value['created_by'] = (!empty($postData['login_id']))?$postData['login_id']:'';

                $post_id = $this->global_model->insert('store',$value);
                $this->session->set_flashdata('msg', '<div class="alert alert-success" id="success-alert">'.'Online Store Create Successfully'.'</div>');
                redirect(base_url().'store/store');
            }
        }
    }
    
    
}
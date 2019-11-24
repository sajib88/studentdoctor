<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Advertise extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('global');
        $this->load->library('upload');
        if (!check_login()) {
            redirect('home/login');
        }
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger form-error">', '</div>');
    }



    public function add(){
        $data = array();
        $data['page_title'] = 'Add New Advertise';
        $data['error'] = '';
        $loginId = $this->session->userdata('login_id');
        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));

        if($this->input->post()){
            $postData = $this->input->post();
            $this->form_validation->set_rules('ad_name', 'ad_name', 'required');
            if($this->form_validation->run() == true){

                $save['uid'] = $loginId;
                $save['ad_name'] = $postData['ad_name'];
                $save['start_date'] = $postData['start_date'];
                $save['end_date'] = $postData['end_date'];
                $save['profession_view'] = (!empty($this->input->post('profession_view')))?implode(',', $this->input->post('profession_view')):'0';
                $save['ad_view'] = (!empty($this->input->post('ad_view')))?implode(',', $this->input->post('ad_view')):'0';

                if (isset($_FILES["ad_image"]["name"]) && $_FILES["ad_image"]["name"] != '') {
                    $this->PATH = './assets/file/advertise/';
                    $photo_name = time();
                    if (!file_exists($this->PATH)) {
                        mkdir($this->PATH, 0777, true);
                    }
                    $save['ad_image'] = $this->resizeimg->image_upload('ad_image', $this->PATH, 'size[318,210]', '', $photo_name);
                }
                $save['status'] = 1;


                if ($ref_id = $this->global_model->insert('advertise', $save)) {
                    $this->session->set_flashdata('message', 'Save Success');                    
                }

            }
        }

        $data['ad_place'] = $this->global_model->get('page_show_ad', array('status' => 1));
       // $data['countries'] = $this->global_model->get('countries');
        $data['profession_by_profession'] = $this->global_model->profession_by_profession();
        $data['login_id'] = $loginId;
        $this->load->view('header', $data);
        $this->load->view('advertise/add', $data);
        $this->load->view('footer');
        
        
    }
    public function edit($id='')
    {
        $data = array();
        $data['page_title'] = 'Edit Advertise';
        $data['tabActive'] = 'public';
        $loginId = $this->session->userdata('login_id');
        $data['user_info'] = $user_info = $this->global_model->get_data('users', array('id' => $loginId));

        $data['profession_by_profession'] = $this->global_model->profession_by_profession();

        if($this->input->post()){
            $postData = $this->input->post();
            $this->form_validation->set_rules('ad_name', 'ad_name', 'required');
            if($this->form_validation->run() == true){

                $save['uid'] = $loginId;
                $save['ad_name'] = $postData['ad_name'];
                $save['start_date'] = $postData['start_date'];
                $save['end_date'] = $postData['end_date'];
                $save['profession_view'] = (!empty($this->input->post('profession_view')))?implode(',', $this->input->post('profession_view')):'0';
                $save['ad_view'] = (!empty($this->input->post('ad_view')))?implode(',', $this->input->post('ad_view')):'0';

                if (isset($_FILES["ad_image"]["name"]) && $_FILES["ad_image"]["name"] != '') {
                    $this->PATH = './assets/file/advertise/';
                    $photo_name = time();
                    if (!file_exists($this->PATH)) {
                        mkdir($this->PATH, 0777, true);
                    }
                    $save['ad_image'] = $this->resizeimg->image_upload('ad_image', $this->PATH, 'size[318,210]', '', $photo_name);
                }
                $save['status'] = 1;

                if ($this->global_model->update('advertise', $save, array('id' => $id))){
                    $this->session->set_flashdata('message', 'Edit Success');
                }

            }
        }



        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
        $data['login_id'] = $loginId;

        $data['ad_place'] = $this->global_model->get('page_show_ad', array('status' => 1));

        $data['editad'] = $this->global_model->get_data('advertise', array('id' => $id));



        $this->load->view('header', $data);
        $this->load->view('advertise/edit', $data);
        $this->load->view('footer');


    }


    public function myadd()
    {
        $table = 'advertise';
        $data = array();
        $data['page_title'] = 'All MY Advertise List';
        $loginId = $this->session->userdata('login_id');
        $data['alladvertise']  	 = $this->global_model->get($table, array('uid'=> $loginId));

        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
        $data['login_id'] = $loginId;
        $this->load->view('header', $data);
        $this->load->view('advertise/alladvertise', $data);
        $this->load->view('footer');

    }


//// for remove
    public function delete()
    {
        $id = $this->uri->segment('4');
        if ($this->global_model->delete('product', array('id' => $id))) {
            $this->session->set_flashdata('success', 'Delete successfully!');
            redirect(base_url('product/list'));
        }

    }





//// SHW ALL PRODUCT
    public function allProductGrid()
    {
        $table = 'product';
        $data = array();
        $data['page_title'] = 'Add Product';
        $loginId = $this->session->userdata('login_id');
        $profession = $this->session->userdata('user_type');
        $data['allproducts']  	 = $this->global_model->getViewByProfession($table,$profession);

        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));       
        
        $data['login_id'] = $loginId;
        $this->load->view('header', $data);
        $this->load->view('products/productgrid', $data);
        $this->load->view('footer');

    }


    //// Detisls View
    public function layoutfull()
    {

        $data = array();

        $data['page_title'] = 'Private Web';
        $data['tabActive'] = 'private';
        $data['error'] = '';
        $id = $this->uri->segment('3');

        $loginId = $this->session->userdata('login_id');
        $data['user_info'] = $user_info = $this->global_model->get_data('users', array('id' => $loginId));



        $data['layoutfull'] = $this->global_model->get_data('product', array('id' => $id));
        $data['countries'] = $this->global_model->get('countries');
        $data['main_cat'] = $this->global_model->get('classified_main_cat');

        $this->load->view('header', $data);
        $this->load->view('products/layoutfull', $data);
        $this->load->view('footer');


    }

    public function getStateByAjax() {
        $data = array();
        $id = $this->input->post('state');
        $states = $this->global_model->get('states', array('country_id' => $id));
        $data['states'] = $states;
        echo $this->load->view('state', $data, TRUE);
        exit;
    }

    public function search(){
        $this->load->helper('global_helper');
        $data = array();
        $data['page_title'] = 'Search';
        $data['error'] = '';
        $loginId = $this->session->userdata('login_id');


        $this->form_validation->set_rules('name');
        $this->form_validation->set_rules('type');
        $this->form_validation->set_rules('price');
        $this->form_validation->set_rules('description');


        if($this->input->post()){
            $postData = $this->input->post();
            $value = array();
            $value['name'] = (!empty($postData['name']))?$postData['name']:'';
            $value['type'] = (!empty($postData['type']))?$postData['type']:'';
            $value['price'] = (!empty($postData['price']))?$postData['price']:'';
            $value['description'] = (!empty($postData['description']))?$postData['description']:'';

            $data['result'] = $this->global_model->get_product_search_data('product',$value,FALSE,FALSE);


        }

        $data['page_title'] = 'Product search';
        $data['tabActive'] = 'Product';
        $data['error'] = '';
        $loginId = $this->session->userdata('login_id');
        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
        $data['countries'] = $this->global_model->get('countries');
        $data['profession'] = $this->global_model->get('profession');
        $data['main_cat'] = $this->global_model->get('product_main_cat');
        $this->load->view('header', $data);
        $this->load->view('products/product_search', $data);
        $this->load->view('footer');

    }


}

?>
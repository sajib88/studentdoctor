<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller{

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

    public function addCat()
    {
        $data = array();
        $data['page_title'] = 'Add New Category';
        $data['tabActive'] = 'Product Category';
        $data['error'] = '';
        $loginId = $this->session->userdata('login_id');
        $user_type = $this->session->userdata('user_type');

        if ($this->input->post()) {
            $postData = $this->input->post();
            $this->form_validation->set_rules('cat_name', 'cat_name', 'trim');


            if ($this->form_validation->run() == true) {

                $save['cat_name'] = $postData['cat_name'];
                $save['created_by'] = $loginId;
                $save['status'] = '1';

                if ($ref_id = $this->global_model->insert('product_main_cat', $save)) {

                    $this->session->set_flashdata('message2', 'New Category Create successfully.');
                    redirect(base_url('product/add'));
                }
            }
        }
        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
        $data['login_id'] = $loginId;

    }

    public function add(){
        $data = array();
        $data['page_title'] = 'Add Product';
        $data['error'] = '';
        $loginId = $this->session->userdata('login_id');

        if($this->input->post()){
            $postData = $this->input->post();
            $this->form_validation->set_rules('name', 'name', 'required');
            $this->form_validation->set_rules('description', 'description', 'required');
            $this->form_validation->set_rules('type', 'type', 'trim');
            $this->form_validation->set_rules('price', 'price', 'trim');
            $this->form_validation->set_rules('special_price', 'special_price', 'trim');
            $this->form_validation->set_rules('country', 'country', 'required');

            $this->form_validation->set_rules('city', 'city', 'trim');
            $this->form_validation->set_rules('zip', 'zip', 'trim');
            $this->form_validation->set_rules('seller_address1', 'seller_address1', 'trim');
            $this->form_validation->set_rules('seller_address2', 'seller_address2', 'trim');
            $this->form_validation->set_rules('seller_name', 'seller_name', 'trim');
            $this->form_validation->set_rules('seller_email', 'seller_email', 'trim');
            $this->form_validation->set_rules('seller_website', 'seller_website', 'trim');
            $this->form_validation->set_rules('seller_phone', 'seller_phone', 'trim');
            $this->form_validation->set_rules('seller_fax', 'seller_fax', 'trim');
            


            if($this->form_validation->run() == true){

                $save['uid'] = $loginId;
                $save['name'] = $postData['name'];
                $save['description'] = $postData['description'];
                $save['type'] = $postData['type'];
                $save['price'] = $postData['price'];
                $save['special_price'] = $postData['special_price'];
                $save['country'] = $postData['country'];
                $save['state'] = $postData['state'];
                $save['city'] = $postData['city'];
                $save['zip'] = $postData['zip'];
                $save['seller_address1'] = $postData['seller_address1'];
                $save['seller_name'] = $postData['seller_name'];
                $save['seller_email'] = $postData['seller_email'];
                $save['seller_website'] = $postData['seller_website'];
                $save['seller_phone'] = $postData['seller_phone'];
                $save['seller_fax'] = $postData['seller_fax'];
                $save['status'] = 1;
                if(!empty($postData['profession_view'])){
                    $save['profession_view'] = (!empty($postData['profession_view']))?implode(',', $postData['profession_view']):'';
                }else{
                    $save['profession_view'] = 0;
                }
                if (isset($_FILES["photo_primary"]["name"]) && $_FILES["photo_primary"]["name"] != '') {
                    $this->PATH = './assets/file/product/';
                    $photo_name = time();
                    if (!file_exists($this->PATH)) {
                        mkdir($this->PATH, 0777, true);
                    }
                    $save['photo_primary'] = $this->resizeimg->image_upload('photo_primary', $this->PATH, 'size[318,210]', '', $photo_name);
                }
                else {

                }if (isset($_FILES["photo_2"]["name"]) && $_FILES["photo_2"]["name"] != '') {
                    $this->PATH = './assets/file/product/';
                    $photo_name = time();
                    if (!file_exists($this->PATH)) {
                        mkdir($this->PATH, 0777, true);
                    }
                    $save['photo_2'] = $this->resizeimg->image_upload('photo_2', $this->PATH, 'size[318,210]', '', $photo_name);
                }
                else {

                }if (isset($_FILES["photo_3"]["name"]) && $_FILES["photo_3"]["name"] != '') {
                    $this->PATH = './assets/file/product/';
                    $photo_name = time();
                    if (!file_exists($this->PATH)) {
                        mkdir($this->PATH, 0777, true);
                    }
                    $save['photo_3'] = $this->resizeimg->image_upload('photo_3', $this->PATH, 'size[318,210]', '', $photo_name);
                }
                else {

                }

                //// (image upload funtion)
                uploadProduct();

                //// File UPLOAD
                if ($this->upload->do_upload('primary_file')) {
                    $fileInfo = $this->upload->data();
                    $file1['name'] = $fileInfo['file_name'];
                    $save['primary_file'] = $file1['name'];
                }
                if ($this->upload->do_upload('file_2')) {
                    $fileInfo = $this->upload->data();
                    $file1['name'] = $fileInfo['file_name'];
                    $save['file_2'] = $file1['name'];
                }

                //sound upload
                if ($this->upload->do_upload('primary_sound')) {
                    $fileInfo = $this->upload->data();
                    $sound['name'] = $fileInfo['file_name'];
                    $save['primary_sound'] = $sound['name'];
                }
                //sound upload
                if ($this->upload->do_upload('sound1')) {
                    $fileInfo = $this->upload->data();
                    $sound['name'] = $fileInfo['file_name'];
                    $save['sound1'] = $sound['name'];
                }
                //video upload
                if ($this->upload->do_upload('primary_video')) {
                    $fileInfo = $this->upload->data();
                    $video['name'] = $fileInfo['file_name'];
                    $save['primary_video'] = $video['name'];
                }

                //video upload
                if ($this->upload->do_upload('video1')) {
                    $fileInfo = $this->upload->data();
                    $video['name'] = $fileInfo['file_name'];
                    $save['video1'] = $video['name'];
                }


               // print '<pre>';
               // print_r($save);die;

                if ($ref_id = $this->global_model->insert('product', $save)) {
                    $this->session->set_flashdata('message', 'Save Success');                    
                }

            }
        }

        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
        $data['countries'] = $this->global_model->get('countries');
        $data['profession'] = $this->global_model->get('profession');
        $data['main_cat'] = $this->global_model->get('product_main_cat');
        $data['login_id'] = $loginId;
        $this->load->view('header', $data);
        $this->load->view('products/add', $data);
        $this->load->view('footer');
        
        
    }

    public function edit()
    {
        $data = array();
        $data['page_title'] = 'Public Web';
        $data['tabActive'] = 'public';
        $data['error'] = '';
        $loginId = $this->session->userdata('login_id');

        if ($this->input->post()) {
            $postData = $this->input->post();
            $this->form_validation->set_rules('name', 'name', 'trim');
            $this->form_validation->set_rules('description', 'description', 'trim');
            $this->form_validation->set_rules('type', 'type', 'trim');
            $this->form_validation->set_rules('price', 'price', 'trim');
            $this->form_validation->set_rules('special_price', 'special_price', 'trim');
            $this->form_validation->set_rules('country', 'country', 'trim');
            $this->form_validation->set_rules('state', 'state', 'trim');
            $this->form_validation->set_rules('city', 'city', 'trim');
            $this->form_validation->set_rules('zip', 'zip', 'trim');
            $this->form_validation->set_rules('seller_address1', 'seller_address1', 'trim');
            $this->form_validation->set_rules('seller_address2', 'seller_address2', 'trim');
            $this->form_validation->set_rules('seller_name', 'seller_name', 'trim');
            $this->form_validation->set_rules('seller_email', 'seller_email', 'trim');
            $this->form_validation->set_rules('seller_website', 'seller_website', 'trim');
            $this->form_validation->set_rules('seller_phone', 'seller_phone', 'trim');
            $this->form_validation->set_rules('seller_fax', 'seller_fax', 'trim');


            if ($this->form_validation->run() == true) {

                $save['uid'] = $loginId;
                $save['name'] = $postData['name'];
                $save['description'] = $postData['description'];
                $save['type'] = $postData['type'];
                $save['price'] = $postData['price'];
                $save['special_price'] = $postData['special_price'];
                $save['country'] = $postData['country'];
                $save['state'] = $postData['state'];
                $save['city'] = $postData['city'];
                $save['zip'] = $postData['zip'];
                $save['seller_address1'] = $postData['seller_address1'];
                $save['seller_name'] = $postData['seller_name'];
                $save['seller_email'] = $postData['seller_email'];
                $save['seller_website'] = $postData['seller_website'];
                $save['seller_phone'] = $postData['seller_phone'];
                $save['seller_fax'] = $postData['seller_fax'];
                $save['status'] = 1;
                $save['profession_view'] = (!empty($postData['profession_view']))?implode(',', $postData['profession_view']):'';

                if (isset($_FILES["photo_primary"]["name"]) && $_FILES["photo_primary"]["name"] != '') {
                    $this->PATH = './assets/file/product/';
                    $photo_name = time();
                    if (!file_exists($this->PATH)) {
                        mkdir($this->PATH, 0777, true);
                    }
                    $save['photo_primary'] = $this->resizeimg->image_upload('photo_primary', $this->PATH, 'size[318,210]', '', $photo_name);
                }
                else {

                }if (isset($_FILES["photo_2"]["name"]) && $_FILES["photo_2"]["name"] != '') {
                    $this->PATH = './assets/file/product/';
                    $photo_name = time();
                    if (!file_exists($this->PATH)) {
                        mkdir($this->PATH, 0777, true);
                    }
                    $save['photo_2'] = $this->resizeimg->image_upload('photo_2', $this->PATH, 'size[318,210]', '', $photo_name);
                }
                else {

                }if (isset($_FILES["photo_3"]["name"]) && $_FILES["photo_3"]["name"] != '') {
                    $this->PATH = './assets/file/product/';
                    $photo_name = time();
                    if (!file_exists($this->PATH)) {
                        mkdir($this->PATH, 0777, true);
                    }
                    $save['photo_3'] = $this->resizeimg->image_upload('photo_3', $this->PATH, 'size[318,210]', '', $photo_name);
                }
                else {

                }

                //// (image upload funtion)
                uploadProduct();

                //// File UPLOAD
                if ($this->upload->do_upload('primary_file')) {
                    $fileInfo = $this->upload->data();
                    $file1['name'] = $fileInfo['file_name'];
                    $save['primary_file'] = $file1['name'];
                }
                if ($this->upload->do_upload('file_2')) {
                    $fileInfo = $this->upload->data();
                    $file1['name'] = $fileInfo['file_name'];
                    $save['file_2'] = $file1['name'];
                }

                //sound upload
                if ($this->upload->do_upload('primary_sound')) {
                    $fileInfo = $this->upload->data();
                    $sound['name'] = $fileInfo['file_name'];
                    $save['primary_sound'] = $sound['name'];
                }
                //sound upload
                if ($this->upload->do_upload('sound1')) {
                    $fileInfo = $this->upload->data();
                    $sound['name'] = $fileInfo['file_name'];
                    $save['sound1'] = $sound['name'];
                }
                //video upload
                if ($this->upload->do_upload('primary_video')) {
                    $fileInfo = $this->upload->data();
                    $video['name'] = $fileInfo['file_name'];
                    $save['primary_video'] = $video['name'];
                }

                //video upload
                if ($this->upload->do_upload('video1')) {
                    $fileInfo = $this->upload->data();
                    $video['name'] = $fileInfo['file_name'];
                    $save['video1'] = $video['name'];
                }

                $id = $this->uri->segment('3');

                if ($this->global_model->update('product', $save, array('id' => $id))){
                    $this->session->set_flashdata('message', 'Edit Success');
                }
            }
        }
        $id = $this->uri->segment('3');
        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
        $data['countries'] = $this->global_model->get('countries');
        $data['profession'] = $this->global_model->get('profession');

        $data['login_id'] = $loginId;

        $tablename = 'product';
        $data['states'] = getStatesByCountry($tablename,$id);
        $data['states'] = $this->global_model->get('states');
        $data['main_cat'] = $this->global_model->get('product_main_cat');

        $loginId = $this->session->userdata('login_id');
        $data['user_info'] = $user_info = $this->global_model->get_data('users', array('id' => $loginId));
        $data['editProduct'] = $this->global_model->get_data('product', array('id' => $id));

        $this->load->view('header', $data);
        $this->load->view('products/edit', $data);
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

    public function myproduct()
    {
        $table = 'product';
        $data = array();
        $data['page_title'] = 'Add Product';
        $loginId = $this->session->userdata('login_id');
        $data['allproducts']  	 = $this->global_model->get($table, array('uid'=> $loginId));

        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
        $data['login_id'] = $loginId;
        $this->load->view('header', $data);
        $this->load->view('products/allproducts', $data);
        $this->load->view('footer');

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
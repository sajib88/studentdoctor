<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class FlipGroup extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // $this->load->library('File_processing');
        $this->load->helper('global');
        $this->load->library('upload');


    }



    public function index()
    {
        $data = array();
        $data['page_title'] = 'New Group Create';
        $data['tabActive'] = 'public';
        $data['error'] = '';
        $loginId = $this->session->userdata('login_id');


            if ($this->input->post()) {
                $postData = $this->input->post();
                $this->form_validation->set_rules('group_name', 'group_name', 'trim');
                $this->form_validation->set_rules('description', 'description', 'trim');
                $this->form_validation->set_rules('category', 'category', 'trim');
                $this->form_validation->set_rules('discussion', 'discussion', 'trim');
                $this->form_validation->set_rules('create_date', 'create_date', 'trim');

                if ($this->form_validation->run() == true) {


                    $save['group_name'] = $postData['group_name'];
                    $save['description'] = $postData['description'];
                    $save['category'] = $postData['category'];
                    $save['discussion'] = $postData['discussion'];
                    if(!empty($postData['create_date'])) {
                        $save['create_date'] = $postData['create_date'];
                    }else{
                        $save['create_date'] = date('m-d-Y', time());
                    }
                    $save['user_id'] = $loginId;
                    $save['status'] = '1';
                    if(!empty($postData['profession_view'])){
                        $save['profession_view'] = (!empty($postData['profession_view']))?implode(',', $postData['profession_view']):'';
                    }else{
                        $save['profession_view'] = 0;
                    }
                    if (isset($_FILES["primary_image"]["name"]) && $_FILES["primary_image"]["name"] != '') {
                        $this->PATH = './assets/flip/group/';
                        $photo_name = time();
                        if (!file_exists($this->PATH)) {
                            mkdir($this->PATH, 0777, true);
                        }
                        $save['primary_image'] = $this->resizeimg->image_upload('primary_image', $this->PATH, 'size[318,210]', '', $photo_name);
                    }
                    else {

                    }
                    if (isset($_FILES["image_2"]["name"]) && $_FILES["image_2"]["name"] != '') {
                        $this->PATH = './assets/flip/group/';
                        $photo_name = time();
                        if (!file_exists($this->PATH)) {
                            mkdir($this->PATH, 0777, true);
                        }
                        $save['image_2'] = $this->resizeimg->image_upload('image_2', $this->PATH, 'size[318,210]', '', $photo_name);
                    }
                    else {

                    }
                    if ($ref_id = $this->global_model->insert('flip_gorupfad', $save)) {

                        $this->session->set_flashdata('message', 'Save Success');
                        //redirect('profile/profile');
                    }
                }
            }
            $data['profession_by_profession'] = $this->global_model->profession_by_profession();
            $data['user_info'] = $this->global_model->get_data('flip_users', array('uid' => $loginId));
            $data['main_cat'] = $this->global_model->get('group_main_cat');
            $data['login_id'] = $loginId;


            $this->load->view('flip/flip_header', $data);
            $this->load->view('flip/group/add', $data);
            $this->load->view('flip/flip_footer', $data);


        }


    public function edit()
    {
        $data = array();
        $data['page_title'] = 'Edit Group';
        $data['tabActive'] = 'public';
        $data['error'] = '';
        $loginId = $this->session->userdata('login_id');


        if ($this->input->post()) {
            $postData = $this->input->post();
            $this->form_validation->set_rules('group_name', 'group_name', 'trim');
            $this->form_validation->set_rules('description', 'description', 'trim');
            $this->form_validation->set_rules('category', 'category', 'trim');
            $this->form_validation->set_rules('discussion', 'discussion', 'trim');
            $this->form_validation->set_rules('create_date', 'create_date', 'trim');

            if ($this->form_validation->run() == true) {

                $save['group_name'] = $postData['group_name'];
                $save['description'] = $postData['description'];
                $save['category'] = $postData['category'];
                $save['discussion'] = $postData['discussion'];
                if(!empty($postData['create_date'])) {
                    $save['create_date'] = $postData['create_date'];
                }else{
                    $save['create_date'] = date('m-d-Y', time());
                }
                $save['user_id'] = $loginId;
                $save['status'] = '1';
                $save['profession_view'] = (!empty($this->input->post('profession_view')))?implode(',', $this->input->post('profession_view')):'';

                if (isset($_FILES["primary_image"]["name"]) && $_FILES["primary_image"]["name"] != '') {
                    $this->PATH = './assets/flip/group/';
                    $photo_name = time();
                    if (!file_exists($this->PATH)) {
                        mkdir($this->PATH, 0777, true);
                    }
                    $save['primary_image'] = $this->resizeimg->image_upload('primary_image', $this->PATH, 'size[318,210]', '', $photo_name);
                }
                else {

                }
                if (isset($_FILES["image_2"]["name"]) && $_FILES["image_2"]["name"] != '') {
                    $this->PATH = './assets/flip/group/';
                    $photo_name = time();
                    if (!file_exists($this->PATH)) {
                        mkdir($this->PATH, 0777, true);
                    }
                    $save['image_2'] = $this->resizeimg->image_upload('image_2', $this->PATH, 'size[318,210]', '', $photo_name);
                }
                else {

                }

                $id = $this->uri->segment('3');
                if ($this->global_model->update('flip_gorupfad', $save, array('id' => $id))){
                    $this->session->set_flashdata('message', 'Save Success');
                    //redirect('profile/profile');
                }
            }
        }

        $data['user_info'] = $this->global_model->get_data('flip_users', array('uid' => $loginId));
        $data['login_id'] = $loginId;


        $loginId = $this->session->userdata('login_id');
        $data['user_info'] = $this->global_model->get_data('flip_users', array('uid' => $loginId));

        $id = $this->uri->segment('3');
        $data['editgroup'] = $this->global_model->get_data('flip_gorupfad', array('id' => $id));
        $data['main_cat'] = $this->global_model->get('group_main_cat');
        $data['profession_by_profession'] = $this->global_model->profession_by_profession();

        $this->load->view('flip/flip_header', $data);
        $this->load->view('flip/group/edit', $data);
        $this->load->view('flip/flip_footer', $data);

    }





    ////  View my classified only
    public function mygroup(){

        $data = array();
        $data['page_title'] = 'My Gorup list';
        $data['tabActive'] = 'private';
        $data['error'] = '';

        $loginId = $this->session->userdata('login_id');
        $data['user_info'] = $this->global_model->get_data('flip_users', array('uid' => $loginId));

        $data['mygroup'] = $this->global_model->get('flip_gorupfad', array('user_id' => $loginId));



        $this->load->view('flip/flip_header', $data);
        $this->load->view('flip/group/myview', $data);
        $this->load->view('flip/flip_footer', $data);


    }
    ////  View all users
    public function viewall(){

        $data = array();
        $data['page_title'] = 'All Group List';
        $data['tabActive'] = 'private';
        $data['error'] = '';


        $loginId = $this->session->userdata('login_id');
        $data['user_info'] = $this->global_model->get_data('flip_users', array('uid' => $loginId));
        $profession = $this->session->userdata('user_type');
        $data['viewallevent'] = $this->global_model->getViewByProfession('flip_gorupfad', $profession);



        $this->load->view('flip/flip_header', $data);
        $this->load->view('flip/group/detailsview', $data);
        $this->load->view('flip/flip_footer', $data);


    }




    //// for remove
    public function delete()
    {
        $id = $this->uri->segment('4');
        if ($this->global_model->delete('gorupfad', array('id' => $id))) {
            $this->session->set_flashdata('success', 'Delete successfully!');
            redirect(base_url('group/mygroup'));
        }

    }

    public function grouptcat()
    {
        $data = array();
        $data['page_title'] = 'Add New Category';
        $data['tabActive'] = 'Group Category';
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

                if ($ref_id = $this->global_model->insert('group_main_cat', $save)) {

                    $this->session->set_flashdata('message2');

                }
            }
        }
        $data['user_info'] = $this->global_model->get_data('flip_users', array('uid' => $loginId));
        $data['main_cat'] = $this->global_model->get('group_main_cat');
        $data['login_id'] = $loginId;
        $this->load->view('header', $data);
        $this->load->view('group/add', $data);
        $this->load->view('footer');
    }

    //// Detisls View



    public function layoutfull(){
        $data = array();
        $data['page_title'] = 'Add Product';
        $data['error'] = '';
        $loginId = $this->session->userdata('login_id');
        $data['user_info'] = $this->global_model->get_data('flip_users', array('uid' => $loginId));

        $id = $this->uri->segment('3');

        $data['getid']  = $this->uri->segment('3');
        $data['layoutfull'] = $this->global_model->get_data('flip_gorupfad', array('id' => $id));
        $data['main_cat'] = $this->global_model->get('group_main_cat');

        $data['comments'] = $this->global_model->get('flip_group_comments', array('group_id' => $data['getid']));



        if ($this->input->post()) {
            $postData = $this->input->post();
            $this->form_validation->set_rules('comments_title', 'comments_title', 'trim');
            $this->form_validation->set_rules('comments_details', 'comments_details', 'trim');



            if ($this->form_validation->run() == true) {

                $save['group_id'] = $postData['postid'];
                $save['user_id'] = $loginId;
                $save['comments_title'] = $postData['comments_title'];
                $save['comments_details'] = $postData['comments_details'];
                $save['status'] = '1';




                if ($ref_id = $this->global_model->insert('flip_group_comments', $save)) {

                    $this->session->set_flashdata('message', 'New Forum Post Create Successfully');
                    $redirect_link = base_url() . 'FlipGroup/layoutfull/'. $postData['postid'];
                    redirect($redirect_link);

                }
            }
        }




        $this->load->view('flip/flip_header', $data);
        $this->load->view('flip/group/layoutfull', $data);
        $this->load->view('flip/flip_footer', $data);



    }


    public function search(){
        $this->load->helper('global_helper');
        $data = array();
        $data['page_title'] = 'Search';
        $data['error'] = '';
        $loginId = $this->session->userdata('login_id');
        if($this->input->post()){
            $postData = $this->input->post();
            /*print '<pre>';
            print_r($this->input->post());
            die;*/
            $value = array();
            $value['group_name'] = (!empty($postData['group_name']))?$postData['group_name']:'';
            $value['discussion'] = (!empty($postData['discussion']))?$postData['discussion']:'';
            $value['description'] = (!empty($postData['description']))?$postData['description']:'';
            $value['category'] = (!empty($postData['category']))?$postData['category']:'';

            $data['result'] = $this->global_model->get_group_search_data('flip_gorupfad',$value,FALSE,FALSE);


        }

        $id = $this->uri->segment('4');
        $data['user_info'] = $this->global_model->get_data('flip_users', array('uid' => $loginId));
        $data['countries'] = $this->global_model->get('countries');
        $data['main_cat'] = $this->global_model->get('group_main_cat');
        $data['profession'] = $this->global_model->get('profession');
        //$data['states'] = $this->global_model->get('states');
        $data['login_id'] = $loginId;

        $this->form_validation->set_rules('title', 'title', 'xss_clean');
        $this->form_validation->set_rules('summary', 'summary', 'xss_clean');
        $this->form_validation->set_rules('description', 'description', 'xss_clean');
        $this->form_validation->set_rules('category', 'category', 'xss_clean');
        $this->form_validation->set_rules('location', 'location', 'xss_clean');



        $this->load->view('flip/flip_header', $data);
        $this->load->view('flip/group/search_view', $data);
        $this->load->view('flip/flip_footer', $data);



    }



}

?>

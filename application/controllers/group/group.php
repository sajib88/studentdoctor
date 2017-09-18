<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class group extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // $this->load->library('File_processing');
        $this->load->helper('global');
        $this->load->library('upload');
        if (!check_login()) {
            redirect('home/login');
        }

    }



    public function index()
    {
        $data = array();
        $data['page_title'] = 'Public Web';
        $data['tabActive'] = 'public';
        $data['error'] = '';
        $loginId = $this->session->userdata('login_id');
        $data['profession'] = $this->global_model->get('profession');

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
                    $save['create_date'] = $postData['create_date'];
                    $save['user_id'] = $loginId;
                    $save['status'] = '1';
                    if(!empty($postData['profession_view'])){
                        $save['profession_view'] = (!empty($postData['profession_view']))?implode(',', $postData['profession_view']):'';
                    }else{
                        $save['profession_view'] = 0;
                    }
                    if (isset($_FILES["primary_image"]["name"]) && $_FILES["primary_image"]["name"] != '') {
                        $this->PATH = './assets/file/group/';
                        $photo_name = time();
                        if (!file_exists($this->PATH)) {
                            mkdir($this->PATH, 0777, true);
                        }
                        $save['primary_image'] = $this->resizeimg->image_upload('primary_image', $this->PATH, 'size[318,210]', '', $photo_name);
                    }
                    else {

                    }
                    if (isset($_FILES["image_2"]["name"]) && $_FILES["image_2"]["name"] != '') {
                        $this->PATH = './assets/file/group/';
                        $photo_name = time();
                        if (!file_exists($this->PATH)) {
                            mkdir($this->PATH, 0777, true);
                        }
                        $save['image_2'] = $this->resizeimg->image_upload('image_2', $this->PATH, 'size[318,210]', '', $photo_name);
                    }
                    else {

                    }
                    if ($ref_id = $this->global_model->insert('gorupfad', $save)) {

                        $this->session->set_flashdata('message', 'Save Success');
                        //redirect('profile/profile');
                    }
                }
            }
            $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
            $data['login_id'] = $loginId;
            $this->load->view('header', $data);
            $this->load->view('group/add', $data);
            $this->load->view('footer');
        }


    public function edit()
    {
        $data = array();
        $data['page_title'] = 'Public Web';
        $data['tabActive'] = 'public';
        $data['error'] = '';
        $loginId = $this->session->userdata('login_id');
        $data['profession'] = $this->global_model->get('profession');

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
                $save['create_date'] = $postData['create_date'];
                $save['user_id'] = $loginId;
                $save['status'] = '1';
                $save['profession_view'] = (!empty($this->input->post('profession_view')))?implode(',', $this->input->post('profession_view')):'';

                if (isset($_FILES["primary_image"]["name"]) && $_FILES["primary_image"]["name"] != '') {
                    $this->PATH = './assets/file/group/';
                    $photo_name = time();
                    if (!file_exists($this->PATH)) {
                        mkdir($this->PATH, 0777, true);
                    }
                    $save['primary_image'] = $this->resizeimg->image_upload('primary_image', $this->PATH, 'size[318,210]', '', $photo_name);
                }
                else {

                }
                if (isset($_FILES["image_2"]["name"]) && $_FILES["image_2"]["name"] != '') {
                    $this->PATH = './assets/file/group/';
                    $photo_name = time();
                    if (!file_exists($this->PATH)) {
                        mkdir($this->PATH, 0777, true);
                    }
                    $save['image_2'] = $this->resizeimg->image_upload('image_2', $this->PATH, 'size[318,210]', '', $photo_name);
                }
                else {

                }

                $id = $this->uri->segment('4');
                if ($this->global_model->update('gorupfad', $save, array('id' => $id))){
                    $this->session->set_flashdata('message', 'Save Success');
                    //redirect('profile/profile');
                }
            }
        }

        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
        $data['login_id'] = $loginId;


        $loginId = $this->session->userdata('login_id');
        $data['user_info'] = $user_info = $this->global_model->get_data('users', array('id' => $loginId));

        $id = $this->uri->segment('4');
        $data['editgroup'] = $this->global_model->get_data('gorupfad', array('id' => $id));

        $this->load->view('header', $data);
        $this->load->view('group/edit', $data);
        $this->load->view('footer');
    }





    ////  View my classified only
    public function mygroup(){

        $data = array();
        $data['page_title'] = 'Private Web';
        $data['tabActive'] = 'private';
        $data['error'] = '';

        $loginId = $this->session->userdata('login_id');
        $data['user_info'] = $user_info = $this->global_model->get_data('users', array('id' => $loginId));

        $data['mygroup'] = $this->global_model->get('gorupfad', array('user_id' => $loginId));

        $this->load->view('header', $data);
        $this->load->view('group/myview', $data);
        $this->load->view('footer');


    }
    ////  View all users
    public function viewall(){

        $data = array();
        $data['page_title'] = 'Private Web';
        $data['tabActive'] = 'private';
        $data['error'] = '';


        $loginId = $this->session->userdata('login_id');
        $data['user_info'] = $user_info = $this->global_model->get_data('users', array('id' => $loginId));
        $profession = $this->session->userdata('user_type');
        $data['viewallevent'] = $this->global_model->getViewByProfession('gorupfad', $profession);
        //$data['viewallevent'] = $this->global_model->get('gorupfad');

        $this->load->view('header', $data);
        $this->load->view('group/detailsview', $data);
        $this->load->view('footer');


    }




    //// for remove
    public function delete()
    {
        $id = $this->uri->segment('4');
        if ($this->global_model->delete('gorupfad', array('id' => $id))) {
            $this->session->set_flashdata('success', 'Delete successfully!');
            redirect('group/group/mygroup');
        }

    }



}

?>

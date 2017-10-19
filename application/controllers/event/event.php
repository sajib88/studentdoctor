<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class event extends CI_Controller {

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

            if ($this->input->post()) {
                $postData = $this->input->post();
                $this->form_validation->set_rules('title', 'title', 'trim');
                $this->form_validation->set_rules('summary', 'summary', 'trim');
                $this->form_validation->set_rules('description', 'description', 'trim');
                $this->form_validation->set_rules('category', 'category', 'trim');
                $this->form_validation->set_rules('location', 'location', 'trim');
                $this->form_validation->set_rules('start_date', 'start_date', 'trim');
                $this->form_validation->set_rules('end_date', 'end_date', 'trim');
                $this->form_validation->set_rules('start_time', 'start_time', 'trim');
                $this->form_validation->set_rules('end_time', 'end_time', 'trim');
                $this->form_validation->set_rules('seats_no', 'seats_no', 'trim');

                if ($this->form_validation->run() == true) {


                    $save['title'] = $postData['title'];
                    $save['summary'] = $postData['summary'];
                    $save['description'] = $postData['description'];
                    $save['category'] = $postData['category'];
                    $save['location'] = $postData['location'];
                    $save['start_date'] = $postData['start_date'];
                    $save['end_date'] = $postData['end_date'];
                    $save['start_time'] = $postData['start_time'];
                    $save['end_time'] = $postData['end_time'];
                    $save['seats_no'] = $postData['seats_no'];
                   // $save['ticketprice'] = $postData['ticketprice'];
                    $save['user_id'] = $loginId;
                    $save['event_join'] = '0';
                    $save['status'] = '1';
                    if(!empty($this->input->post('profession_view'))) {
                        $sata = array();
                        $sata ['profession_view'] = $this->input->post('profession_view');
                        $save['profession_view'] = (!empty($sata['profession_view'])) ? implode(',', $sata['profession_view']) : '';
                    }else{
                        $save['profession_view'] = 0;
                    }

                    if (isset($_FILES["primary_photo"]["name"]) && $_FILES["primary_photo"]["name"] != '') {
                        $this->PATH = './assets/file/event/';
                        $photo_name = time();
                        if (!file_exists($this->PATH)) {
                            mkdir($this->PATH, 0777, true);
                        }
                        $save['primary_photo'] = $this->resizeimg->image_upload('primary_photo', $this->PATH, 'size[318,210]', '', $photo_name);
                    }
                    else {

                    }

                    if (isset($_FILES["photo_2"]["name"]) && $_FILES["photo_2"]["name"] != '') {
                        $this->PATH = './assets/file/event/';
                        $photo_name = time();
                        if (!file_exists($this->PATH)) {
                            mkdir($this->PATH, 0777, true);
                        }
                        $save['photo_2'] = $this->resizeimg->image_upload('photo_2', $this->PATH, 'size[318,210]', '', $photo_name);
                    }
                    else {

                    }

                    if (isset($_FILES["photo_3"]["name"]) && $_FILES["photo_3"]["name"] != '') {
                        $this->PATH = './assets/file/event/';
                        $photo_name = time();
                        if (!file_exists($this->PATH)) {
                            mkdir($this->PATH, 0777, true);
                        }
                        $save['photo_3'] = $this->resizeimg->image_upload('photo_3', $this->PATH, 'size[318,210]', '', $photo_name);
                    }
                    else {

                    }

                    uploadEvent();
                    //// File UPLOAD
                    if ($this->upload->do_upload('file1')) {
                        $fileInfo = $this->upload->data();
                        $file1['name'] = $fileInfo['file_name'];
                        $save['file1'] = $file1['name'];
                    }

                    if ($this->upload->do_upload('file2')) {
                        $fileInfo = $this->upload->data();
                        $file1['name'] = $fileInfo['file_name'];
                        $save['file2'] = $file1['name'];
                    }



                    if ($ref_id = $this->global_model->insert('event', $save)) {

                        $this->session->set_flashdata('message', 'New Event Category Create Successfully');

                    }




                }
            }
            $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
            $data['login_id'] = $loginId;
            $data['profession'] = $this->global_model->get('profession');
            $data['main_cat'] = $this->global_model->get('event_main_cat');
            $this->load->view('header', $data);
            $this->load->view('event/add', $data);
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
            $this->form_validation->set_rules('title', 'title', 'trim');
            $this->form_validation->set_rules('summary', 'summary', 'trim');
            $this->form_validation->set_rules('description', 'description', 'trim');
            $this->form_validation->set_rules('category', 'category', 'trim');
            $this->form_validation->set_rules('location', 'location', 'trim');
            $this->form_validation->set_rules('start_date', 'start_date', 'trim');
            $this->form_validation->set_rules('end_date', 'end_date', 'trim');
            $this->form_validation->set_rules('start_time', 'start_time', 'trim');
            $this->form_validation->set_rules('end_time', 'end_time', 'trim');
            $this->form_validation->set_rules('seats_no', 'seats_no', 'trim');

            // $this->form_validation->set_rules('ticketprice', 'ticketprice', 'trim');

            if ($this->form_validation->run() == true) {

                $save['title'] = $postData['title'];
                $save['summary'] = $postData['summary'];
                $save['description'] = $postData['description'];
                $save['category'] = $postData['category'];
                $save['location'] = $postData['location'];
                $save['start_date'] = $postData['start_date'];
                $save['end_date'] = $postData['end_date'];
                $save['start_time'] = $postData['start_time'];
                $save['end_time'] = $postData['end_time'];
                $save['seats_no'] = $postData['seats_no'];
                // $save['ticketprice'] = $postData['ticketprice'];
                $save['user_id'] = $loginId;
                $save['event_join'] = '0';
                $save['status'] = '1';
                $sata = array();
                $sata ['profession_view'] = $this->input->post('profession_view');
                $save['profession_view'] = (!empty($sata['profession_view']))?implode(',', $sata['profession_view']):'';

                if (isset($_FILES["primary_photo"]["name"]) && $_FILES["primary_photo"]["name"] != '') {
                    $this->PATH = './assets/file/event/';
                    $photo_name = time();
                    if (!file_exists($this->PATH)) {
                        mkdir($this->PATH, 0777, true);
                    }
                    $save['primary_photo'] = $this->resizeimg->image_upload('primary_photo', $this->PATH, 'size[318,210]', '', $photo_name);
                }
                else {

                }

                if (isset($_FILES["photo_2"]["name"]) && $_FILES["photo_2"]["name"] != '') {
                    $this->PATH = './assets/file/event/';
                    $photo_name = time();
                    if (!file_exists($this->PATH)) {
                        mkdir($this->PATH, 0777, true);
                    }
                    $save['photo_2'] = $this->resizeimg->image_upload('photo_2', $this->PATH, 'size[318,210]', '', $photo_name);
                }
                else {

                }

                if (isset($_FILES["photo_3"]["name"]) && $_FILES["photo_3"]["name"] != '') {
                    $this->PATH = './assets/file/event/';
                    $photo_name = time();
                    if (!file_exists($this->PATH)) {
                        mkdir($this->PATH, 0777, true);
                    }
                    $save['photo_3'] = $this->resizeimg->image_upload('photo_3', $this->PATH, 'size[318,210]', '', $photo_name);
                }
                else {

                }
                $id = $this->uri->segment('3');
                if ($this->global_model->update('event', $save, array('id' => $id))){
                    $this->session->set_flashdata('message', 'Save Success');
                    //redirect('profile/profile');
                }
            }
        }

        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
        $data['login_id'] = $loginId;


        $loginId = $this->session->userdata('login_id');
        $data['user_info'] = $user_info = $this->global_model->get_data('users', array('id' => $loginId));

        $id = $this->uri->segment('3');
        $data['editevent'] = $this->global_model->get_data('event', array('id' => $id));
        $data['profession'] = $this->global_model->get('profession');
        $data['main_cat'] = $this->global_model->get('event_main_cat');
        $this->load->view('header', $data);
        $this->load->view('event/edit', $data);
        $this->load->view('footer');
    }





    ////  View my classified only
    public function myevent(){

        $data = array();
        $data['page_title'] = 'Private Web';
        $data['tabActive'] = 'private';
        $data['error'] = '';

        $loginId = $this->session->userdata('login_id');
        $data['user_info'] = $user_info = $this->global_model->get_data('users', array('id' => $loginId));

        $data['myevent'] = $this->global_model->get('event', array('user_id' => $loginId));
        $data['main_cat'] = $this->global_model->get('event_main_cat');

        $this->load->view('header', $data);
        $this->load->view('event/myview', $data);
        $this->load->view('footer');


    }
    ////  View all users
    public function viewall(){

        $data = array();
        $data['page_title'] = 'Private Web';
        $data['tabActive'] = 'private';
        $data['error'] = '';

      // echo  $today = strtotime(date('Y-m-d', time()));


        $loginId = $this->session->userdata('login_id');
        $data['user_info'] = $user_info = $this->global_model->get_data('users', array('id' => $loginId));

        $profession = $this->session->userdata('user_type');
        $newcomefirst = $order_by = FALSE;
        $data['viewallevent'] = $this->global_model->getViewByProfession('event', $profession, $newcomefirst);
        $data['main_cat'] = $this->global_model->get('event_main_cat');

        $this->load->view('header', $data);
        $this->load->view('event/detailsview', $data);
        $this->load->view('footer');


    }

    //// Detisls View
    public function layoutfull()
    {

        $data = array();

        $data['page_title'] = 'Private Web';
        $data['tabActive'] = 'private';
        $data['error'] = '';


        $loginId = $this->session->userdata('login_id');
        $data['user_info'] = $user_info = $this->global_model->get_data('users', array('id' => $loginId));


        $id = $this->uri->segment('3');
        $data['layoutfull'] = $this->global_model->get_data('event', array('id' => $id));
        $data['main_cat'] = $this->global_model->get('event_main_cat');


        $this->load->view('header', $data);
        $this->load->view('event/layoutfull', $data);
        $this->load->view('footer');


    }


    //// for remove
    public function delete()
    {
        $id = $this->uri->segment('4');
        if ($this->global_model->delete('event', array('id' => $id))) {
            $this->session->set_flashdata('success', 'Delete successfully!');
            redirect(base_url('event/myevent'));
        }

    }


    public function getStateByAjax() {
        $data = array();
        $id = $this->input->post('state');
        $states = $this->global_model->get('states', array('country_id' => $id));
        $data['states'] = $states;
        echo $this->load->view('state', $data, TRUE);
        exit;
    }

    public function getSubCat() {
        $data = array();
        $id = $this->input->post('state');
        $states = $this->global_model->get('classified_sub_cat', array('country_id' => $id));
        $data['cld_sub_cat'] = $states;
        echo $this->load->view('classified_sub_cat', $data, TRUE);
        exit;
    }

    public function eventcat()
    {
        $data = array();
        $data['page_title'] = 'Add New Category';
        $data['tabActive'] = 'Event Category';
        $data['error'] = '';
        $loginId = $this->session->userdata('login_id');
        $user_type = $this->session->userdata('user_type');

        if ($this->input->post()) {
            $postData = $this->input->post();
            $this->form_validation->set_rules('cat_name', 'cat_name', 'trim|is_unique[event_main_cat.cat_name]');


            if ($this->form_validation->run() == true) {

                $save['cat_name'] = $postData['cat_name'];
                $save['created_by'] = $loginId;
                $save['status'] = '1';

                if ($ref_id = $this->global_model->insert('event_main_cat', $save)) {

                    $this->session->set_flashdata('message2', 'New Category Create successfully.');
                    redirect(base_url('event/add'));

                }
            }
            else{
                $this->session->set_flashdata('message3', 'Category name must be unique.');
                redirect(base_url('event/add'));
            }
        }
        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
        $data['login_id'] = $loginId;
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

            $value['title'] = (!empty($postData['title']))?$postData['title']:'';
            $value['summary'] = (!empty($postData['summary']))?$postData['summary']:'';
            $value['description'] = (!empty($postData['description']))?$postData['description']:'';
            $value['category'] = (!empty($postData['category']))?$postData['category']:'';
            $value['location'] = (!empty($postData['location']))?$postData['location']:'';


            $data['result'] = $this->global_model->get_event_search_data('event',$value,FALSE,FALSE);


        }

        $id = $this->uri->segment('4');
        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
        $data['countries'] = $this->global_model->get('countries');
        $data['main_cat'] = $this->global_model->get('event_main_cat');
        $data['profession'] = $this->global_model->get('profession');
        //$data['states'] = $this->global_model->get('states');
        $data['login_id'] = $loginId;

        $this->form_validation->set_rules('title', 'title', 'xss_clean');
        $this->form_validation->set_rules('summary', 'summary', 'xss_clean');
        $this->form_validation->set_rules('description', 'description', 'xss_clean');
        $this->form_validation->set_rules('category', 'category', 'xss_clean');
        $this->form_validation->set_rules('location', 'location', 'xss_clean');


        $this->load->view('header', $data);
        $this->load->view('event/search_view', $data);
        $this->load->view('footer');




    }




}

?>

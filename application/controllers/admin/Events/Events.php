<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // $this->load->library('File_processing');
        $this->load->helper('global');
        $this->load->library('upload');
        if (!check_admin()) {
            redirect('admin/login');
        }

    }


    


    ////  View all cls - admin end
    public function myevent(){

        $data = array();
        $data['page_title'] = 'Events';
        $data['tabActive'] = 'Events';
        $data['error'] = '';

        $data['myevent'] = $this->global_model->get('event');

        $this->load->view('admin/header', $data);
        $this->load->view('admin/events/view', $data);
        $this->load->view('admin/footer');

    }

    //// for remove 1 row
    public function delete(){
        $id = $this->uri->segment('5');
        if ($this->global_model->delete('event', array('id' => $id))) {
            $this->session->set_flashdata('success', 'Evnet Deleted successfully!');
            redirect('admin/Events/Events/myevent');
        }

    }


     //// EDIT Admin panel 1 cls
   public function edit()
    {
        $data = array();
        $data['page_title'] = 'Event Edit Form';
        $data['tabActive'] = 'Event';
        $data['error'] = '';
      

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
                ///$save['user_id'] = $loginId;
                $save['event_join'] = '0';
                $save['status'] = '1';

                //// (image upload funtion)
                uploadEvent();
                ///

                //// PHOTO UPLOAD
                if ($this->upload->do_upload('primary_photo')) {
                    $fileInfo = $this->upload->data();
                    $pic1['name'] = $fileInfo['file_name'];
                    $save['primary_photo'] = $pic1['name'];
                }

                if ($this->upload->do_upload('photo_2')) {
                    $fileInfo = $this->upload->data();
                    $pic2['name'] = $fileInfo['file_name'];
                    $save['photo_2'] = $pic2['name'];
                }

                if ($this->upload->do_upload('photo_3')) {
                    $fileInfo = $this->upload->data();
                    $pic3['name'] = $fileInfo['file_name'];
                    $save['photo_3'] = $pic3['name'];
                }
                $id = $this->uri->segment('5');
                if ($this->global_model->update('event', $save, array('id' => $id))){
                    $this->session->set_flashdata('message', 'Save Success');
                    //redirect('profile/profile');
                }
            }
        }

        
        $id = $this->uri->segment('5');
        $data['editevent'] = $this->global_model->get_data('event', array('id' => $id));

        $this->load->view('admin/header', $data);
        $this->load->view('admin/events/edit', $data);
        $this->load->view('admin/footer');
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


}


  



?>
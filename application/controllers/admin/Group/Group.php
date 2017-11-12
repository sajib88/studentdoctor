<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Group extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // $this->load->library('File_processing');
        $this->load->helper('global');
        $this->load->library('upload');
        if (!check_admin()) {
            redirect('admin/login');
        }

    }



  

    public function edit()
    {
        $data = array();
        $data['page_title'] = 'Group';
        $data['tabActive'] = 'Group';
        $data['error'] = '';

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
                $save['status'] = '1';

                //// (image upload funtion)
                uploadGroup();
                ///

                //// PHOTO UPLOAD
                if ($this->upload->do_upload('primary_image')) {
                    $fileInfo = $this->upload->data();
                    $pic1['name'] = $fileInfo['file_name'];
                    $save['primary_image'] = $pic1['name'];
                }


                if ($this->upload->do_upload('image_2')) {
                    $fileInfo = $this->upload->data();
                    $pic2['name'] = $fileInfo['file_name'];
                    $save['image_2'] = $pic2['name'];
                }



                $id = $this->uri->segment('5');
                if ($this->global_model->update('gorupfad', $save, array('id' => $id))){
                    $this->session->set_flashdata('message', 'Group Updated Successfully');
                    redirect('admin/Group/Group/viewall');
                }
            }
        }




        $id = $this->uri->segment('5');
        $data['editgroup'] = $this->global_model->get_data('gorupfad', array('id' => $id));
        $data['main_cat'] = $this->global_model->get('group_main_cat');

        $this->load->view('admin/header', $data);
        $this->load->view('admin/group/edit', $data);
        $this->load->view('admin/footer');
    }





    ////  View my classified only
    public function mygroup(){

        $data = array();
        $data['page_title'] = 'Private Web';
        $data['tabActive'] = 'private';
        $data['error'] = '';

        

        $this->load->view('header', $data);
        $this->load->view('group/myview', $data);
        $this->load->view('footer');


    }
    ////  View all users
    public function viewall(){

        $data = array();
        $data['page_title'] = 'Group';
        $data['tabActive'] = 'Group List';
        $data['error'] = '';


        $data['mygroup'] = $this->global_model->get('gorupfad');

        $this->load->view('admin/header', $data);
        $this->load->view('admin/group/myview', $data);
        $this->load->view('admin/footer');


    }




    //// for remove
    public function delete()
    {
        $id = $this->uri->segment('5');
        if ($this->global_model->delete('gorupfad', array('id' => $id))) {
            $this->session->set_flashdata('message', 'Group Deleted successfully!');
            redirect('admin/Group/Group/viewall');
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

}

?>

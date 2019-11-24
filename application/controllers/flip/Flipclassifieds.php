<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class flipclassifieds extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // $this->load->library('File_processing');
        $this->load->helper('global');
        $this->load->library('upload');
        $this->load->helper('global_helper');


    }

    public function addCat()
    {
        $data = array();
        $data['page_title'] = 'Add New Category';
        $data['tabActive'] = 'Classified Category';
        $data['error'] = '';
        $loginId = $this->session->userdata('login_id');
        $user_type = $this->session->userdata('user_type');

        if ($this->input->post()) {
            $postData = $this->input->post();
            $this->form_validation->set_rules('cat_name', 'cat_name', 'trim');


            if ($this->form_validation->run() == true) {

                $save['name'] = $postData['cat_name'];
                $save['created_by'] = $loginId;
                $save['status'] = '1';

                if ($ref_id = $this->global_model->insert('classified_main_cat', $save)) {

                    $this->session->set_flashdata('message2', 'New Category Create successfully.');
                    redirect(base_url('classifieds/add'));
                }
            }
        }
        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
        $data['login_id'] = $loginId;

    }



    public function add()
    {
        $data = array();
        $data['page_title'] = 'Add New Classified';
        $data['tabActive'] = 'public';
        $data['error'] = '';
        $loginId = $this->session->userdata('login_id');

            if ($this->input->post()) {
                $postData = $this->input->post();
               /// $this->form_validation->set_rules('classified', 'classified', 'trim');
                $this->form_validation->set_rules('title', 'title', 'trim');
                $this->form_validation->set_rules('main_category', 'main category', 'trim');
                $this->form_validation->set_rules('sub_cat', 'main cat', 'trim');
                $this->form_validation->set_rules('description', 'description', 'trim');
                $this->form_validation->set_rules('country', 'country', 'trim');
                $this->form_validation->set_rules('state', 'state', 'trim');
                $this->form_validation->set_rules('city', 'city', 'trim');
                $this->form_validation->set_rules('address_1', 'address_1', 'trim');
                $this->form_validation->set_rules('postal', 'postal', 'trim');
                $this->form_validation->set_rules('website', 'website', 'trim');
                $this->form_validation->set_rules('email', 'email', 'trim');
                $this->form_validation->set_rules('fax', 'fax', 'trim');
                $this->form_validation->set_rules('price', 'price', 'trim');

                if ($this->form_validation->run() == true) {

                   // $save['classifieds_ids'] = implode(',', $postData['classified']);
                    //$save['classifieds_ids'] = '0';
                    $save['title'] = $postData['title'];
                    $save['description'] = $postData['description'];
                    $save['main_cat'] = $postData['main_category'];
                    $save['sub_cat'] = '0';
                    $save['price'] = $postData['price'];
                    $save['country'] = $postData['country'];
                    $save['city'] = $postData['city'];
                    $save['state'] = $postData['state'];
                    $save['postal'] = $postData['postal'];
                    $save['address_1'] = $postData['address_1'];
                    $save['website'] = $postData['website'];
                    $save['name'] = $postData['name'];
                    $save['email'] = $postData['email'];
                    $save['phone'] = $postData['phone'];
                    $save['fax'] = $postData['fax'];
                    $save['price'] = $postData['price'];
                    $save['user_id'] = $loginId;
                    if(!empty($this->input->post('profession_view'))){
                        $sata = array();
                        $sata ['profession_view'] = $this->input->post('profession_view');
                        $save['profession_view'] = (!empty($sata['profession_view']))?implode(',', $sata['profession_view']):'';
                    }else{
                        $save['profession_view'] = 0;
                    }

                    if (isset($_FILES["photo_primary"]["name"]) && $_FILES["photo_primary"]["name"] != '') {
                        $this->PATH = './assets/flip/classified/';
                        $photo_name = time();
                        if (!file_exists($this->PATH)) {
                            mkdir($this->PATH, 0777, true);
                        }
                        $save['photo_primary'] = $this->resizeimg->image_upload('photo_primary', $this->PATH, 'size[500,500]', '', $photo_name);
                    }
                    else {

                    }

                    if (isset($_FILES["photo_2"]["name"]) && $_FILES["photo_2"]["name"] != '') {
                        $this->PATH = './assets/flip/classified/';
                        $photo_name = time();
                        if (!file_exists($this->PATH)) {
                            mkdir($this->PATH, 0777, true);
                        }
                        $save['photo_2'] = $this->resizeimg->image_upload('photo_2', $this->PATH, 'size[500,500]', '', $photo_name);
                    }
                    else {

                    }

                    if (isset($_FILES["photo_3"]["name"]) && $_FILES["photo_3"]["name"] != '') {
                        $this->PATH = './assets/flip/classified/';
                        $photo_name = time();
                        if (!file_exists($this->PATH)) {
                            mkdir($this->PATH, 0777, true);
                        }
                        $save['photo_3'] = $this->resizeimg->image_upload('photo_3', $this->PATH, 'size[500,500]', '', $photo_name);
                    }
                    else {

                    }

                    if (isset($_FILES["photo_4"]["name"]) && $_FILES["photo_4"]["name"] != '') {
                        $this->PATH = './assets/flip/classified/';
                        $photo_name = time();
                        if (!file_exists($this->PATH)) {
                            mkdir($this->PATH, 0777, true);
                        }
                        $save['photo_4'] = $this->resizeimg->image_upload('photo_4', $this->PATH, 'size[500,500]', '', $photo_name);
                    }
                    else {

                    }

                    uploadClassifieds();
                    //// File UPLOAD
                    if ($this->upload->do_upload('primary_file')) {
                        $fileInfo = $this->upload->data();
                        $file1['name'] = $fileInfo['file_name'];
                        $save['primary_file'] = $file1['name'];
                    }

                    //sound upload
                    if ($this->upload->do_upload('primary_sound')) {
                        $fileInfo = $this->upload->data();
                        $sound['name'] = $fileInfo['file_name'];
                        $save['primary_sound'] = $sound['name'];
                    }
                    //video upload
                    if ($this->upload->do_upload('primary_video')) {
                        $fileInfo = $this->upload->data();
                        $video['name'] = $fileInfo['file_name'];
                        $save['primary_video'] = $video['name'];
                    }
                    

                    if ($ref_id = $this->global_model->insert('flip_classified', $save)) {
                        $this->session->set_flashdata('message', 'Save Success');
                       //redirect('profile/profile');
                    }
                }
            }
            $data['user_info'] = $this->global_model->get_data('flip_users', array('uid' => $loginId));
            $data['countries'] = $this->global_model->get('countries');
            $data['profession_by_profession'] = $this->global_model->profession_by_profession();
            $data['main_cat'] = $this->global_model->get('flip_classified_main_cat');
            $data['login_id'] = $loginId;


        $this->load->view('flip/flip_header', $data);
        $this->load->view('flip/classifieds/add', $data);
        $this->load->view('flip/flip_footer', $data);
        }


    public function edit()
    {
        $data = array();
        $data['page_title'] = 'Edit Classified';
        $data['tabActive'] = 'public';
        $data['error'] = '';
        $loginId = $this->session->userdata('login_id');

        if ($this->input->post()) {
            $postData = $this->input->post();
            //$this->form_validation->set_rules('classified', 'classified', 'trim');
            $this->form_validation->set_rules('title', 'title', 'trim');
            $this->form_validation->set_rules('main_category', 'main category', 'trim');
            $this->form_validation->set_rules('sub_cat', 'main cat', 'trim');
            $this->form_validation->set_rules('description', 'description', 'trim');
            $this->form_validation->set_rules('country', 'country', 'trim');
            $this->form_validation->set_rules('state', 'state', 'trim');
            $this->form_validation->set_rules('city', 'city', 'trim');
            $this->form_validation->set_rules('address_1', 'address_1', 'trim');
            $this->form_validation->set_rules('postal', 'postal', 'trim');
            $this->form_validation->set_rules('website', 'website', 'trim');
            $this->form_validation->set_rules('email', 'email', 'trim');
            $this->form_validation->set_rules('fax', 'fax', 'trim');
            $this->form_validation->set_rules('price', 'price', 'trim');

            if ($this->form_validation->run() == true) {

                //$save['classifieds_ids'] = implode(',', $postData['classified']);
                //$save['classifieds_ids'] = '0';
                $save['title'] = $postData['title'];
                $save['description'] = $postData['description'];
                $save['main_cat'] = $postData['main_category'];
                $save['sub_cat'] = '0';
                $save['price'] = $postData['price'];
                $save['country'] = $postData['country'];
                $save['city'] = $postData['city'];
                $save['state'] = $postData['state'];
                $save['postal'] = $postData['postal'];
                $save['address_1'] = $postData['address_1'];
                $save['website'] = $postData['website'];
                $save['name'] = $postData['name'];
                $save['email'] = $postData['email'];
                $save['phone'] = $postData['phone'];
                $save['fax'] = $postData['fax'];
                $save['price'] = $postData['price'];
                if(!empty($this->input->post('profession_view'))){
                    $sata = array();
                    $sata ['profession_view'] = $this->input->post('profession_view');
                    $save['profession_view'] = (!empty($sata['profession_view']))?implode(',', $sata['profession_view']):'';
                }else{
                    $save['profession_view'] = 0;
                }

                if (isset($_FILES["photo_primary"]["name"]) && $_FILES["photo_primary"]["name"] != '') {
                    $this->PATH = './assets/flip/classified/';
                    $photo_name = time();
                    if (!file_exists($this->PATH)) {
                        mkdir($this->PATH, 0777, true);
                    }
                    $save['photo_primary'] = $this->resizeimg->image_upload('photo_primary', $this->PATH, 'size[500,500]', '', $photo_name);
                }
                else {

                }

                if (isset($_FILES["photo_2"]["name"]) && $_FILES["photo_2"]["name"] != '') {
                    $this->PATH = './assets/flip/classified/';
                    $photo_name = time();
                    if (!file_exists($this->PATH)) {
                        mkdir($this->PATH, 0777, true);
                    }
                    $save['photo_2'] = $this->resizeimg->image_upload('photo_2', $this->PATH, 'size[500,500]', '', $photo_name);
                }
                else {

                }

                if (isset($_FILES["photo_3"]["name"]) && $_FILES["photo_3"]["name"] != '') {
                    $this->PATH = './assets/flip/classified/';
                    $photo_name = time();
                    if (!file_exists($this->PATH)) {
                        mkdir($this->PATH, 0777, true);
                    }
                    $save['photo_3'] = $this->resizeimg->image_upload('photo_3', $this->PATH, 'size[500,500]', '', $photo_name);
                }
                else {

                }

                if (isset($_FILES["photo_4"]["name"]) && $_FILES["photo_4"]["name"] != '') {
                    $this->PATH = './assets/flip/classified/';
                    $photo_name = time();
                    if (!file_exists($this->PATH)) {
                        mkdir($this->PATH, 0777, true);
                    }
                    $save['photo_4'] = $this->resizeimg->image_upload('photo_4', $this->PATH, 'size[500,500]', '', $photo_name);
                }
                else {

                }

                uploadClassifieds();
                //// File UPLOAD
                if ($this->upload->do_upload('primary_file')) {
                    $fileInfo = $this->upload->data();
                    $file1['name'] = $fileInfo['file_name'];
                    $save['primary_file'] = $file1['name'];
                }

                //sound upload
                if ($this->upload->do_upload('primary_sound')) {
                    $fileInfo = $this->upload->data();
                    $sound['name'] = $fileInfo['file_name'];
                    $save['primary_sound'] = $sound['name'];
                }
                //video upload
                if ($this->upload->do_upload('primary_video')) {
                    $fileInfo = $this->upload->data();
                    $video['name'] = $fileInfo['file_name'];
                    $save['primary_video'] = $video['name'];
                }
                $id = $this->uri->segment('3');
                if ($this->global_model->update('flip_classified', $save, array('id' => $id))){
                    $this->session->set_flashdata('message', 'Save Success');
                    //redirect('profile/profile');
                }
            }
        }
        $id = $this->uri->segment('3');
        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
        $data['countries'] = $this->global_model->get('countries');
        $data['profession_by_profession'] = $this->global_model->profession_by_profession();
        $data['states'] = $this->global_model->get('states');
        $data['main_cat'] = $this->global_model->get('classified_main_cat');

        $data['login_id'] = $loginId;


        $loginId = $this->session->userdata('login_id');
        $data['user_info'] = $this->global_model->get_data('flip_users', array('uid' => $loginId));
        $data['editclassified'] = $this->global_model->get_data('flip_classified', array('id' => $id));

        $id = $data['editclassified']['id'];

        $data['states'] = classifiedgetStatesByCountry($id);



        $this->load->view('flip/flip_header', $data);
        $this->load->view('flip/classifieds/edit', $data);
        $this->load->view('flip/flip_footer', $data);



    }

    ////  View my classified only
    public function viewmyclassfied(){

        $data = array();
        $data['page_title'] = 'My Classified List';
        $data['tabActive'] = 'classified';
        $data['error'] = '';

        $loginId = $this->session->userdata('login_id');
        $data['user_info'] = $this->global_model->get_data('flip_users', array('uid' => $loginId));

        $data['myclassified'] = $this->global_model->get('flip_classified', array('user_id' => $loginId));



        $this->load->view('flip/flip_header', $data);
        $this->load->view('flip/classifieds/view', $data);
        $this->load->view('flip/flip_footer', $data);


    }
    ////  View all users
    public function viewall(){
        $table = 'classified';
        $data = array();
        $data['page_title'] = 'All Classified List';
        $data['tabActive'] = 'classified';
        $data['error'] = '';



         $page_url = base_url('flip/flipclassifieds/viewall');
         $total_rows = $this->global_model->get('flip_classified');
         $per_page = 3;
         $uri_segment = 4;
         $num_links = 5;

         $data['pagging'] = $this->global_model->get('flip_classified', createPagging($page_url, $total_rows, $per_page, $uri_segment, $num_links));

         $data['pagging'] = createPagging($page_url, $total_rows, $per_page, $uri_segment, $num_links);
         $profession = $this->session->userdata('user_type');
         $data['viewallclassified'] = $this->global_model->getViewByProfession('flip_classified', $profession);



        $loginId = $this->session->userdata('login_id');
        $data['user_info'] = $this->global_model->get_data('flip_users', array('uid' => $loginId));

        $this->load->view('flip/flip_header', $data);
        $this->load->view('flip/classifieds/detailsview', $data);
        $this->load->view('flip/flip_footer', $data);

    }

    //// Detisls View
    public function layoutfull()
    {

        $data = array();

        $data['page_title'] = 'Classified Details';
        $data['tabActive'] = 'classified';
        $data['error'] = '';
        $id = $this->uri->segment('3');

        $loginId = $this->session->userdata('login_id');
        $data['user_info'] = $this->global_model->get_data('flip_users', array('uid' => $loginId));


        $data['layoutfull'] = $this->global_model->get_data('flip_classified', array('id' => $id));
        $data['countries'] = $this->global_model->get('countries');
        $data['main_cat'] = $this->global_model->get('classified_main_cat');




        $this->load->view('flip/flip_header', $data);
        $this->load->view('flip/classifieds/layoutfull', $data);
        $this->load->view('flip/flip_footer', $data);


    }


    //// for remove
    public function delete()
    {
        $id = $this->uri->segment('4');
        $data['layoutfull'] = $this->global_model->get_data('classified', array('id' => $id));

        if ($this->global_model->delete('classified', array('id' => $id))) {

            $files = array($data['layoutfull']['photo_primary'],
                            $data['layoutfull']['photo_2'],
                            $data['layoutfull']['photo_3'],
                            $data['layoutfull']['photo_4'],
                            $data['layoutfull']['primary_file'],
                           // $data['layoutfull']['file_2'],
                            $data['layoutfull']['primary_sound'],
                            //$data['layoutfull']['sound1'],
                            $data['layoutfull']['primary_video']
                            //$data['layoutfull']['video1']
                            );
            foreach ($files as $file) {
                @unlink ( 'assets/file/classifieds/'.$file );
            }
            $this->session->set_flashdata('success', 'Delete successfully');
            redirect(base_url('classifieds/viewmyclassfied'));
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

    public function search(){
        $this->load->helper('global_helper');
        $data = array();
        $data['page_title'] = 'Search';
        $data['error'] = '';
        $loginId = $this->session->userdata('login_id');


        $this->form_validation->set_rules('title');
        $this->form_validation->set_rules('main_cat');
        $this->form_validation->set_rules('price');
        $this->form_validation->set_rules('description');


        if($this->input->post()){
            $postData = $this->input->post();
            $value = array();
            $value['title'] = (!empty($postData['title']))?$postData['title']:'';
            $value['main_cat'] = (!empty($postData['main_cat']))?$postData['main_cat']:'';
            $value['price'] = (!empty($postData['price']))?$postData['price']:'';
            $value['description'] = (!empty($postData['description']))?$postData['description']:'';

            $data['result'] = $this->global_model->get_classified_search_data('flip_classified',$value,FALSE,FALSE);


        }

        $data['page_title'] = 'Classified search';
        $data['tabActive'] = 'Classifie';
        $data['error'] = '';
        $loginId = $this->session->userdata('login_id');
        $data['user_info'] = $this->global_model->get_data('flip_users', array('uid' => $loginId));
        $data['countries'] = $this->global_model->get('countries');
        $data['profession'] = $this->global_model->get('profession');
        $data['main_cat'] = $this->global_model->get('classified_main_cat');


        $this->load->view('flip/flip_header', $data);
        $this->load->view('flip/classifieds/classified_search', $data);
        $this->load->view('flip/flip_footer', $data);


    }

}

?>

<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Privateweb extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // $this->load->library('File_processing');
        $this->load->helper('global');
        $this->load->library('upload');
        if (!check_login()) {
            redirect('home/login');
        }

        if (!check_login()) {
            redirect('home/login');
        }

        $level = check_level_1();
        if($level ['user_level'] == '1')
        {
            redirect('step1');
        }
        else{

        }
    }

    public function index() {

        $data = array();
        $data['page_title'] = 'Private Website';
        $data['tabActive'] = 'public';
        $data['error'] = '';
        $loginId = $this->session->userdata('login_id');

        if ($this->input->post()) {
            $postData = $this->input->post();


            $this->form_validation->set_rules('title', 'title', 'trim');
            $this->form_validation->set_rules('description', 'description', 'trim');
            $this->form_validation->set_rules('first_name', 'first name', 'trim');
            $this->form_validation->set_rules('last_name', 'last name', 'trim');
            $this->form_validation->set_rules('country', 'country', 'trim');
            $this->form_validation->set_rules('state', 'state', 'trim');
            $this->form_validation->set_rules('city', 'city', 'trim');
            $this->form_validation->set_rules('address_1', 'address_1', 'trim');
            $this->form_validation->set_rules('address_2', 'address_2', 'trim');
            $this->form_validation->set_rules('postal', 'postal', 'trim');
            $this->form_validation->set_rules('business_name', 'business name', 'trim');
            $this->form_validation->set_rules('business_website', 'business website', 'trim');
            $this->form_validation->set_rules('business_email', 'business email', 'trim');
            $this->form_validation->set_rules('business_telephone', 'business telephone', 'trim');
            $this->form_validation->set_rules('business_fax', 'business fax', 'trim');
            $this->form_validation->set_rules('specialty', 'specialty', 'trim');
            $this->form_validation->set_rules('special_interest', 'special interest', 'trim');

            if ($this->form_validation->run() == true) {

                $save['user_id'] = $loginId;
                $save['title'] = $postData['title'];
                $save['description'] = $postData['description'];
                $save['first_name'] = $postData['first_name'];
                $save['last_name'] = $postData['last_name'];
                $save['country'] = $postData['country'];
                $save['state'] = $postData['state'];
                $save['city'] = $postData['city'];
                $save['address_1'] = $postData['address_1'];
                $save['address_2'] = $postData['address_2'];
                $save['postal'] = $postData['postal'];
                $save['business_name'] = $postData['business_name'];
                $save['business_website'] = $postData['business_website'];
                $save['business_email'] = $postData['business_email'];
                $save['business_telephone'] = $postData['business_telephone'];
                $save['business_fax'] = $postData['business_fax'];
                $save['specialty'] = $postData['specialty'];
                $save['special_interest'] = $postData['special_interest'];


                uploadprivateweb();
                if ($this->upload->do_upload('photo1')) {
                    $fileInfo = $this->upload->data();
                    $audo_data['ref_id'] = $loginId;
                    $audo_data['ref_name'] = 'private_web';
                    $audo_data['name'] = $fileInfo['file_name'];
                    $this->global_model->insert('photos', $audo_data);
                }

                if ($this->upload->do_upload('photo2')) {
                    $fileInfo = $this->upload->data();
                    $photo1_data['ref_id'] = $loginId;
                    $photo1_data['ref_name'] = 'private_web';
                    $photo1_data['name'] = $fileInfo['file_name'];
                    $this->global_model->insert('photos', $photo1_data);
                }

                if ($this->upload->do_upload('file1')) {
                    $fileInfo = $this->upload->data();
                    $file_data['ref_id'] = $loginId;
                    $file_data['ref_name'] = 'private_web';
                    $file_data['name'] = $fileInfo['file_name'];
                    $this->global_model->insert('files', $file_data);
                }

                if ($this->upload->do_upload('file2')) {
                    $fileInfo = $this->upload->data();
                    $file1_data['ref_id'] = $loginId;
                    $file1_data['ref_name'] = 'private_web';
                    $file1_data['name'] = $fileInfo['file_name'];
                    $this->global_model->insert('files', $file1_data);
                }

                if ($this->upload->do_upload('audio')) {
                    $fileInfo = $this->upload->data();
                    $audio_data['ref_id'] = $loginId;
                    $audio_data['ref_name'] = 'private_web';
                    $audio_data['name'] = $fileInfo['file_name'];
                    $this->global_model->insert('audio', $audio_data);
                }

                if ($this->upload->do_upload('video')) {
                    $fileInfo = $this->upload->data();
                    $vedio_data['created_by'] = $loginId;
                    $vedio_data['ref_name'] = 'private_web';
                    $vedio_data['name'] = $fileInfo['file_name'];
                    $this->global_model->insert('video', $vedio_data);
                }


                if ($insertedId = $this->global_model->insert('private_website', $save)) {


                    $this->session->set_flashdata('message', 'Save Success');
                    //redirect('profile/profile');
                }
            } else {
                $data['error'] = validation_errors();
            }
        }

        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
        $data['countries'] = $this->global_model->get('countries');

        if ($this->global_model->get_data('private_website', array('user_id' => $loginId, 'profile_status' => 'private')))
        {

            $data['message'] = "You have Alredy 1 Posted Private Website !";
            $this->load->view('header', $data);
            $this->load->view('message', $data);
            $this->load->view('footer');
        }
        else
        {
            $this->load->view('header', $data);
            $this->load->view('private_web/index', $data);
            $this->load->view('footer');
        }


    }

    public function view($id = '') {

        $data = array();
        $data['page_title'] = 'Private Website View';
        $data['tabActive'] = 'private';
        $data['error'] = '';



        if(!empty($id)){
            $id =  $loginId = $this->session->userdata('login_id');
        }else{

        }

        $data['photos'] = $this->global_model->get('photos', array('ref_id' => $id, 'ref_name' => 'private_web'));
        $data['files'] = $this->global_model->get('files', array('ref_id' => $id, 'ref_name' => 'private_web'));
        $data['audio'] = $this->global_model->get_data('audio', array('ref_id' => $id, 'ref_name' => 'private_web'));
        $data['video'] = $this->global_model->get_data('video', array('created_by' => $id, 'ref_name' => 'private_web'));

        $data['website_info'] = $this->global_model->get_data('private_website', array('user_id' => $id));
        $data['user_info'] = $user_info = $this->global_model->get_data('users', array('id' => $id));
        $data['profession_type'] = $this->global_model->get_data('profession', array('id' => $user_info['profession']));

        if ($this->global_model->get_data('private_website', array('user_id' => $id, 'profile_status' => 'private')))
        {

            $this->load->view('header', $data);
            $this->load->view('private_web/view', $data);
            $this->load->view('footer');
        }
        else
        {


            $data['message'] = "You Do not Create  Private Website, Please Create Your Private Website";
            $this->load->view('header', $data);
            $this->load->view('message', $data);
            $this->load->view('footer');

        }



    }

    public function delete() {
        $loginId = $this->session->userdata('login_id');
        $this->global_model->delete('private_website', array('user_id' => $loginId, 'profile_status' => 'private'));
        redirect('private_web/Privateweb');
    }

    public function viewForEdit() {
        $data = array();
        $data['page_title'] = 'Private Website Edit';
        $data['tabActive'] = 'public';
        $data['error'] = '';
        $loginId = $this->session->userdata('login_id');
        $data['website_info'] = $this->global_model->get_data('private_website', array('user_id' => $loginId));
        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
        $data['countries'] = $this->global_model->get('countries');

        if ($this->global_model->get_data('private_website', array('user_id' => $loginId, 'profile_status' => 'private')))
        {

            $this->load->view('header', $data);
            $this->load->view('private_web/view_for_edit', $data);
            $this->load->view('footer');
        }
        else
        {


            $data['message'] = "You Do not Create  Private Website !";
            $this->load->view('header', $data);
            $this->load->view('message', $data);
            $this->load->view('footer');

        }


       
    }

    public function edit($id = ''){

        $data = array();
        $data['page_title'] = 'Private Edit Panel';
        $data['tabActive'] = 'public';
        $data['error'] = '';
        $loginId = $this->session->userdata('login_id');
        $this->load->helper('global_helper');
        /// Get login user id

        $data['user_info'] = $user_info = $this->global_model->get_data('users', array('id' => $loginId));
        /// session user id
        $loginId = $this->session->userdata('login_id');
        // Get info from this table
        $data['website_info'] = $private_web = $this->global_model->get_data('private_website', array('user_id' => $loginId));
        $data['files'] = $files = $this->global_model->get('files', array('ref_id' => $loginId, 'ref_name' => 'private_web'));
        $data['photos'] = $photos = $this->global_model->get('photos', array('ref_id' => $loginId, 'ref_name' => 'private_web'));
        $data['video'] = $video = $this->global_model->get('video', array('created_by' => $loginId, 'ref_name' => 'private_web'));
        $data['audio'] = $audio = $this->global_model->get('audio', array('ref_id' => $loginId, 'ref_name' => 'private_web'));
        $data['countries'] = $this->global_model->get('countries');

        $id = $data['website_info']['id'];

        $data['states'] = privategetStatesByCountry($id);


        if ($this->input->post()) {
            $postData = $this->input->post();
            $this->form_validation->set_rules('title', 'title', 'trim');
            $this->form_validation->set_rules('description', 'description', 'trim');
            $this->form_validation->set_rules('address_1', 'address_1', 'trim');
            $this->form_validation->set_rules('address_2', 'address_2', 'trim');
            $this->form_validation->set_rules('postal', 'postal', 'trim');
            $this->form_validation->set_rules('business_name', 'business name', 'trim');
            $this->form_validation->set_rules('business_website', 'business website', 'trim');
            $this->form_validation->set_rules('business_email', 'business email', 'trim');
            $this->form_validation->set_rules('business_telephone', 'business telephone', 'trim');
            $this->form_validation->set_rules('business_fax', 'business fax', 'trim');
            $this->form_validation->set_rules('specialty', 'specialty', 'trim');
            $this->form_validation->set_rules('special_interest', 'special interest', 'trim');

            if ($this->form_validation->run() == true) {
                $save['title'] = $postData['title'];
                $save['description'] = $postData['description'];
                $save['address_1'] = $postData['address_1'];
                $save['address_2'] = $postData['address_2'];
                $save['country'] = $postData['country'];
                $save['state'] = $postData['state'];
                $save['city'] = $postData['city'];
                $save['postal'] = $postData['postal'];
                $save['business_name'] = $postData['business_name'];
                $save['business_website'] = $postData['business_website'];
                $save['business_email'] = $postData['business_email'];
                $save['business_telephone'] = $postData['business_telephone'];
                $save['business_fax'] = $postData['business_fax'];
                $save['specialty'] = $postData['specialty'];
                $save['special_interest'] = $postData['special_interest'];

                if ($this->global_model->update('private_website', $save, array('user_id' => $loginId))) {

                    uploadprivateweb();

                    if ($this->upload->do_upload('photo1')) {
                        $fileInfo = $this->upload->data();
                        $audo_data['ref_id'] = $loginId;
                        $audo_data['ref_name'] = 'private_web';
                        $audo_data['name'] = $fileInfo['file_name'];
                        $this->global_model->insert('photos', $audo_data);
                    }

                    if ($this->upload->do_upload('photo2')) {
                        $fileInfo = $this->upload->data();
                        $photo1_data['ref_id'] = $loginId;
                        $photo1_data['ref_name'] = 'private_web';
                        $photo1_data['name'] = $fileInfo['file_name'];
                        $this->global_model->insert('photos', $photo1_data);
                    }

                    if ($this->upload->do_upload('file1')) {
                        $fileInfo = $this->upload->data();
                        $file_data['ref_id'] = $loginId;
                        $file_data['ref_name'] = 'private_web';
                        $file_data['name'] = $fileInfo['file_name'];
                        $this->global_model->insert('files', $file_data);
                    }

                    if ($this->upload->do_upload('file2')) {
                        $fileInfo = $this->upload->data();
                        $file1_data['ref_id'] = $loginId;
                        $file1_data['ref_name'] = 'private_web';
                        $file1_data['name'] = $fileInfo['file_name'];
                        $this->global_model->insert('files', $file1_data);
                    }

                    if ($this->upload->do_upload('audio')) {
                        $fileInfo = $this->upload->data();
                        $audio_data['ref_id'] = $loginId;
                        $audio_data['ref_name'] = 'private_web';
                        $audio_data['name'] = $fileInfo['file_name'];
                        $this->global_model->insert('audio', $audio_data);
                    }

                    if ($this->upload->do_upload('video')) {
                        $fileInfo = $this->upload->data();
                        $vedio_data['created_by'] = $loginId;
                        $vedio_data['ref_name'] = 'private_web';
                        $vedio_data['name'] = $fileInfo['file_name'];
                        $this->global_model->insert('video', $vedio_data);
                    }
                    $this->session->set_flashdata('message', 'Save Success');
                    redirect('private_web/Privateweb/viewForEdit');
                }
            } else {
                $data['error'] = validation_errors();
            }
        }

        $this->load->view('header', $data);
        $this->load->view('private_web/edit', $data);
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
        $data['page_title'] = 'Private Website Search';
        $data['error'] = '';
        $loginId = $this->session->userdata('login_id');



        if($this->input->post()){
            $postData = $this->input->post();
            /*print '<pre>';
            print_r($this->input->post());
            die;*/
            $value = array();
            $value['country'] = (!empty($postData['country']))?$postData['country']:'';
            $value['state'] = (!empty($postData['country']))?$postData['state']:'';
            $value['postcode'] = (!empty($postData['postcode']))?$postData['postcode']:'';
            $value['profession'] = (!empty($postData['profession']))?$postData['profession']:'';
            $value['business_name'] = (!empty($postData['business_name']))?$postData['business_name']:'';
            $value['business_phone'] = (!empty($postData['business_phone']))?$postData['business_phone']:'';

            $data['result'] = $this->global_model->get_private_website_search_data('private_website',$value,FALSE,FALSE);


        }

        $id = $this->uri->segment('3');
        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
        $data['countries'] = $this->global_model->get('countries');
        $data['profession'] = $this->global_model->get('profession');
        //$data['states'] = $this->global_model->get('states');
        $data['login_id'] = $loginId;

        $this->form_validation->set_rules('country', 'country', 'xss_clean');
        $this->form_validation->set_rules('state', 'state', 'xss_clean');
        $this->form_validation->set_rules('city', 'city', 'xss_clean');
        $this->form_validation->set_rules('interestin', 'interestin', 'xss_clean');
        $this->form_validation->set_rules('maritalstatus', 'maritalstatus', 'xss_clean');
        $this->form_validation->set_rules('lang', 'lang', 'xss_clean');

        $this->load->view('header', $data);
        $this->load->view('private_web/search_view', $data);
        $this->load->view('footer');

    }



}

?>
